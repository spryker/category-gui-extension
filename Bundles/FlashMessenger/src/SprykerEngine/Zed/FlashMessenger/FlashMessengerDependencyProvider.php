<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace SprykerEngine\Zed\FlashMessenger;

use SprykerEngine\Zed\Kernel\AbstractBundleDependencyProvider;
use SprykerEngine\Zed\Kernel\Container;

class FlashMessengerDependencyProvider extends AbstractBundleDependencyProvider
{

    const SESSION = 'session';
    const FACADE_GLOSSARY = 'glossary facade';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container[self::SESSION] = function (Container $container) {
            return (new \SprykerFeature\Zed\Application\Communication\Plugin\Pimple())->getApplication()['request']->getSession();
        };

        $container[self::FACADE_GLOSSARY] = function (Container $container) {
            return $container->getLocator()->glossary()->facade();
        };

        return $container;
    }

}
