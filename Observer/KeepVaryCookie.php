<?php
declare(strict_types=1);

namespace CommerceKings\Core\Observer;

use Magento\Framework\App\Request\Http as Request;
use Magento\Framework\App\Response\Http as Response;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Keep X-Magento-Vary as the last page set it on the listed routes. Magento sets the store and currency context only
 * for controllers extending the deprecated AbstractAction, so ours would rewrite the cookie without them;
 * PageCache\Model\App\Response\HttpPlugin skips responses marked NotCacheable. Modules add their route ids in
 * etc/frontend/di.xml (argument "routes"). Non-cacheable endpoints only: a missing cookie stays missing, so a
 * cacheable page here could be stored under the default store view and currency.
 */
class KeepVaryCookie implements ObserverInterface
{
    /** @param array<string, string> $routes */
    public function __construct(private readonly array $routes = [])
    {
    }

    public function execute(Observer $observer): void
    {
        $request = $observer->getData('request');
        $response = $observer->getData('response');
        if ($request instanceof Request && $response instanceof Response
            && in_array($request->getRouteName(), $this->routes, true)
        ) {
            $response->setMetadata('NotCacheable', true);
        }
    }
}
