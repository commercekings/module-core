<?php
declare(strict_types=1);

namespace CommerceKings\Core\Test\Unit\Observer;

use CommerceKings\Core\Observer\KeepVaryCookie;
use Magento\Framework\App\Request\Http as Request;
use Magento\Framework\App\Response\Http as Response;
use Magento\Framework\Event\Observer;
use PHPUnit\Framework\TestCase;

class KeepVaryCookieTest extends TestCase
{
    /** @return array<string, array{array<string, string>, ?string, bool}> */
    public static function routes(): array
    {
        $listed = ['consent' => 'ckconsent', 'restore' => 'cartreminder'];
        return [
            'listed route' => [$listed, 'cartreminder', true],
            'other listed route' => [$listed, 'ckconsent', true],
            'unlisted route' => [$listed, 'cms', false],
            'missing request' => [$listed, null, false],
            'no routes added' => [[], 'ckconsent', false],
        ];
    }

    /** @param array<string, string> $listed */
    #[\PHPUnit\Framework\Attributes\DataProvider('routes')]
    public function testOnlyListedRoutesSkipTheVaryCookie(array $listed, ?string $route, bool $skipped): void
    {
        $request = $route === null ? null : $this->createStub(Request::class);
        $request?->method('getRouteName')->willReturn($route);
        $response = $this->createMock(Response::class);
        $response->expects($skipped ? $this->once() : $this->never())
            ->method('setMetadata')->with('NotCacheable', true);

        (new KeepVaryCookie($listed))->execute(new Observer(['request' => $request, 'response' => $response]));
    }
}
