<?php
declare(strict_types=1);

namespace CommerceKings\Core\Test\Unit;

use Magento\Backend\Block\Template;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Escaper;
use PHPUnit\Framework\TestCase;

class DeveloperFooterTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('unrelatedSections')]
    public function testUnrelatedOrMalformedSectionsRenderNoBranding(mixed $section): void
    {
        $this->assertSame('', $this->render($section));
    }

    public static function unrelatedSections(): array
    {
        return [['general'], ['checkout'], ['payment'], ['commercekings'], ['other_commercekings_consent'],
            [null], [false], [42], [['commercekings_consent']]];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('ownedSections')]
    public function testOwnedSectionsRenderOneSafeCorporateLink(string $section): void
    {
        $html = $this->render($section);
        $this->assertSame(1, substr_count($html, 'class="commercekings-config-footer"'));
        $this->assertSame(1, substr_count($html, 'href="https://commercekings.net"'));
        $this->assertStringContainsString('target="_blank" rel="noopener noreferrer"', $html);
        $this->assertStringContainsString('aria-label="CommerceKings (opens in a new tab)"', $html);
    }

    public static function ownedSections(): array
    {
        return [['commercekings_consent'], ['commercekings_abandoned_cart'], ['commercekings_notification']];
    }

    private function render(mixed $section): string
    {
        $request = $this->createMock(RequestInterface::class);
        $request->expects($this->once())->method('getParam')->with('section')->willReturn($section);
        $block = $this->createStub(Template::class);
        $block->method('getRequest')->willReturn($request);
        $escaper = $this->createStub(Escaper::class);
        foreach (['escapeHtml', 'escapeHtmlAttr'] as $method) {
            $escaper->method($method)->willReturnCallback(static fn ($text) => htmlspecialchars((string)$text, ENT_QUOTES));
        }
        ob_start();
        try {
            include __DIR__ . '/../../view/adminhtml/templates/developer-footer.phtml';
            return ob_get_contents();
        } finally {
            ob_end_clean();
        }
    }
}
