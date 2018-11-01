<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Storage;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;
use Spryker\Client\Storage\Dependency\Client\StorageToStoreClientBridge;
use Spryker\Shared\Kernel\Store;

class StorageDependencyProvider extends AbstractDependencyProvider
{
    const STORE = 'store';
    public const STORAGE_CLIENT = 'storage client';

    /**
     * @param \Spryker\Client\Kernel\Container $container
     *
     * @return \Spryker\Client\Kernel\Container
     */
    public function provideServiceLayerDependencies(Container $container)
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container[static::STORAGE_CLIENT] = function (Container $container) {
            return $container->getLocator()->storage()->client();
        };

        $container[static::STORE] = function () {
            return new StorageToStoreClientBridge(Store::getInstance());
        };

        return $container;
    }
}
