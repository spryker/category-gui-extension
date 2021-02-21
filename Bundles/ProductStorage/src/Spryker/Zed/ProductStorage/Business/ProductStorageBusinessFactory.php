<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductStorage\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ProductStorage\Business\Attribute\AttributeMap;
use Spryker\Zed\ProductStorage\Business\Expander\ProductAbstractStorageExpander;
use Spryker\Zed\ProductStorage\Business\Expander\ProductAbstractStorageExpanderInterface;
use Spryker\Zed\ProductStorage\Business\Filter\SingleValueSuperAttributeFilter;
use Spryker\Zed\ProductStorage\Business\Filter\SingleValueSuperAttributeFilterInterface;
use Spryker\Zed\ProductStorage\Business\Generator\AttributeVariantMapGenerator;
use Spryker\Zed\ProductStorage\Business\Generator\AttributeVariantMapGeneratorInterface;
use Spryker\Zed\ProductStorage\Business\Storage\ProductAbstractStorageWriter;
use Spryker\Zed\ProductStorage\Business\Storage\ProductConcreteStorageWriter;
use Spryker\Zed\ProductStorage\Dependency\Facade\ProductStorageToStoreFacadeInterface;
use Spryker\Zed\ProductStorage\ProductStorageDependencyProvider;

/**
 * @method \Spryker\Zed\ProductStorage\ProductStorageConfig getConfig()
 * @method \Spryker\Zed\ProductStorage\Persistence\ProductStorageQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\ProductStorage\Persistence\ProductStorageRepositoryInterface getRepository()
 */
class ProductStorageBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\ProductStorage\Business\Storage\ProductAbstractStorageWriterInterface
     */
    public function createProductAbstractStorageWriter()
    {
        return new ProductAbstractStorageWriter(
            $this->getProductFacade(),
            $this->createAttributeMap(),
            $this->getQueryContainer(),
            $this->getStoreFacade(),
            $this->getConfig()->isSendingToQueue(),
            $this->getProductAbstractStorageExpanderPlugins()
        );
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Business\Storage\ProductConcreteStorageWriterInterface
     */
    public function createProductConcreteStorageWriter()
    {
        return new ProductConcreteStorageWriter(
            $this->getProductFacade(),
            $this->getQueryContainer(),
            $this->getConfig()->isSendingToQueue()
        );
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Business\Filter\SingleValueSuperAttributeFilterInterface
     */
    public function createSingleValueSuperAttributeFilter(): SingleValueSuperAttributeFilterInterface
    {
        return new SingleValueSuperAttributeFilter();
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Business\Attribute\AttributeMapInterface
     */
    protected function createAttributeMap()
    {
        return new AttributeMap(
            $this->getProductFacade(),
            $this->getQueryContainer(),
            $this->getConfig(),
            $this->createSingleValueSuperAttributeFilter()
        );
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Business\Expander\ProductAbstractStorageExpanderInterface
     */
    public function createProductAbstractStorageExpander(): ProductAbstractStorageExpanderInterface
    {
        return new ProductAbstractStorageExpander(
            $this->getRepository(),
            $this->createAttributeVariantMapGenerator()
        );
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Business\Generator\AttributeVariantMapGeneratorInterface
     */
    public function createAttributeVariantMapGenerator(): AttributeVariantMapGeneratorInterface
    {
        return new AttributeVariantMapGenerator(
            $this->getRepository(),
            $this->getProductFacade()
        );
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Dependency\Facade\ProductStorageToProductInterface
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(ProductStorageDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\ProductStorage\Dependency\Facade\ProductStorageToStoreFacadeInterface
     */
    public function getStoreFacade(): ProductStorageToStoreFacadeInterface
    {
        return $this->getProvidedDependency(ProductStorageDependencyProvider::FACADE_STORE);
    }

    /**
     * @return \Spryker\Zed\ProductStorageExtension\Dependency\Plugin\ProductAbstractStorageExpanderPluginInterface[]
     */
    public function getProductAbstractStorageExpanderPlugins(): array
    {
        return $this->getProvidedDependency(ProductStorageDependencyProvider::PLUGINS_PRODUCT_ABSTRACT_STORAGE_EXPANDER);
    }
}
