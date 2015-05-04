<?php

namespace SprykerFeature\Zed\Calculation\Communication\Plugin;

use SprykerFeature\Shared\Calculation\Dependency\Transfer\CalculableContainerInterface;
use SprykerFeature\Zed\Calculation\Communication\CalculationDependencyContainer;
use SprykerFeature\Zed\Calculation\Dependency\Plugin\CalculatorPluginInterface;
use SprykerEngine\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method CalculationDependencyContainer getDependencyContainer()
 */
class OptionPriceToPayCalculatorPlugin extends AbstractPlugin implements CalculatorPluginInterface
{

    /**
     * @param CalculableContainerInterface $calculableContainer
     */
    public function recalculate(CalculableContainerInterface $calculableContainer)
    {
        $this->getDependencyContainer()->getCalculationFacade()->recalculateOptionPriceToPay($calculableContainer);
    }
}
