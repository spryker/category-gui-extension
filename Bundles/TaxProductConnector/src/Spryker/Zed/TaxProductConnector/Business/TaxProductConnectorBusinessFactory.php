<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\TaxProductConnector\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Tax\Business\Model\CalculatorInterface;
use Spryker\Zed\TaxProductConnector\Business\Calculator\ProductItemTaxRateCalculator as ProductItemTaxRateCalculatorWithMultipleShipmentTaxRate;
use Spryker\Zed\TaxProductConnector\Business\Calculator\QuoteDataBCForMultiShipmentAdapter;
use Spryker\Zed\TaxProductConnector\Business\Calculator\QuoteDataBCForMultiShipmentAdapterInterface;
use Spryker\Zed\TaxProductConnector\Business\Model\ProductItemTaxRateCalculator;
use Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxReader;
use Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxReaderInterface;
use Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxSetMapper;
use Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxWriter;
use Spryker\Zed\TaxProductConnector\Business\StrategyResolver\ProductItemTaxRateCalculatorStrategyResolver;
use Spryker\Zed\TaxProductConnector\Business\StrategyResolver\ProductItemTaxRateCalculatorStrategyResolverInterface;
use Spryker\Zed\TaxProductConnector\TaxProductConnectorDependencyProvider;

/**
 * @method \Spryker\Zed\TaxProductConnector\TaxProductConnectorConfig getConfig()
 * @method \Spryker\Zed\TaxProductConnector\Persistence\TaxProductConnectorQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\TaxProductConnector\Persistence\TaxProductConnectorRepositoryInterface getRepository()
 */
class TaxProductConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxWriter
     */
    public function createProductAbstractTaxWriter()
    {
        return new ProductAbstractTaxWriter($this->getQueryContainer());
    }

    /**
     * @return \Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxSetMapper
     */
    public function createProductAbstractTaxSetMapper()
    {
        return new ProductAbstractTaxSetMapper($this->getQueryContainer());
    }

    /**
     * @deprecated Use createProductItemTaxRateCalculatorWithMultipleShipmentTaxRate() instead.
     *
     * @return \Spryker\Zed\Tax\Business\Model\CalculatorInterface
     */
    public function createProductItemTaxRateCalculator()
    {
        return new ProductItemTaxRateCalculator($this->getQueryContainer(), $this->getTaxFacade());
    }

    /**
     * @return \Spryker\Zed\Tax\Business\Model\CalculatorInterface
     */
    public function createProductItemTaxRateCalculatorWithMultipleShipmentTaxRate(): CalculatorInterface
    {
        return new ProductItemTaxRateCalculatorWithMultipleShipmentTaxRate(
            $this->getQueryContainer(),
            $this->getTaxFacade(),
            $this->createQuoteDataBCForMultiShipmentAdapter()
        );
    }

    /**
     * @return \Spryker\Zed\TaxProductConnector\Dependency\Facade\TaxProductConnectorToTaxInterface
     */
    protected function getTaxFacade()
    {
        return $this->getProvidedDependency(TaxProductConnectorDependencyProvider::FACADE_TAX);
    }

    /**
     * @return \Spryker\Zed\TaxProductConnector\Business\Product\ProductAbstractTaxReaderInterface
     */
    public function createProductAbstractTaxReader(): ProductAbstractTaxReaderInterface
    {
        return new ProductAbstractTaxReader($this->getRepository());
    }

    /**
     * @deprecated Exists for Backward Compatibility reasons only.
     *
     * @return \Spryker\Zed\TaxProductConnector\Business\Calculator\QuoteDataBCForMultiShipmentAdapterInterface
     */
    protected function createQuoteDataBCForMultiShipmentAdapter(): QuoteDataBCForMultiShipmentAdapterInterface
    {
        return new QuoteDataBCForMultiShipmentAdapter();
    }

    /**
     * @deprecated Exists for Backward Compatibility reasons only. Use $this->createProductItemTaxRateCalculatorWithMultipleShipmentTaxRate() instead.
     *
     * @return \Spryker\Zed\TaxProductConnector\Business\StrategyResolver\ProductItemTaxRateCalculatorStrategyResolver
     */
    public function createProductItemTaxRateCalculatorStrategyResolver(): ProductItemTaxRateCalculatorStrategyResolverInterface
    {
        $strategyContainer = [];

        $strategyContainer = $this->addStrategyProductItemTaxRateCalculatorWithoutMultipleShipmentTaxRate($strategyContainer);
        $strategyContainer = $this->addStrategyProductItemTaxRateCalculatorWithMultipleShipmentTaxRate($strategyContainer);

        return new ProductItemTaxRateCalculatorStrategyResolver($strategyContainer);
    }

    /**
     * @deprecated Exists for Backward Compatibility reasons only.
     *
     * @param \Spryker\Zed\Tax\Business\Model\CalculatorInterface[]|\Closure[] $strategyContainer
     *
     * @return \Closure[]
     */
    protected function addStrategyProductItemTaxRateCalculatorWithoutMultipleShipmentTaxRate(array $strategyContainer): array
    {
        $strategyContainer[ProductItemTaxRateCalculatorStrategyResolver::STRATEGY_KEY_WITHOUT_MULTI_SHIPMENT] = function () {
            return $this->createProductItemTaxRateCalculator();
        };

        return $strategyContainer;
    }

    /**
     * @deprecated Exists for Backward Compatibility reasons only.
     *
     * @param \Spryker\Zed\Tax\Business\Model\CalculatorInterface[]|\Closure[] $strategyContainer
     *
     * @return \Closure[]
     */
    protected function addStrategyProductItemTaxRateCalculatorWithMultipleShipmentTaxRate(array $strategyContainer): array
    {
        $strategyContainer[ProductItemTaxRateCalculatorStrategyResolver::STRATEGY_KEY_WITH_MULTI_SHIPMENT] = function () {
            return $this->createProductItemTaxRateCalculatorWithMultipleShipmentTaxRate();
        };

        return $strategyContainer;
    }
}
