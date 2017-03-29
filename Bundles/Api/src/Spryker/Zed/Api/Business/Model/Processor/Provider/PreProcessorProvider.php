<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Api\Business\Model\Processor\Provider;

use Spryker\Zed\Api\ApiConfig;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Action\AddActionPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Action\FindActionPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Action\GetActionPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Action\UpdateActionPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Fields\FieldsByQueryPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\FilterPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Header\PaginationByHeaderFilterPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Query\CriteriaByQueryFilterPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Query\PaginationByQueryFilterPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Query\SortByQueryFilterPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Format\FormatTypeByHeaderPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Format\FormatTypeByPathPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\PaginationPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\PathPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Resource\ResourceActionPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Resource\ResourceParametersPreProcessor;
use Spryker\Zed\Api\Business\Model\Processor\Pre\Resource\ResourcePreProcessor;

class PreProcessorProvider implements PreProcessorProviderInterface
{

    /**
     * @var \Spryker\Zed\Api\ApiConfig
     */
    protected $apiConfig;

    /**
     * @param \Spryker\Zed\Api\ApiConfig $apiConfig
     */
    public function __construct(ApiConfig $apiConfig)
    {
        $this->apiConfig = $apiConfig;
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\FilterPreProcessor
     */
    public function buildFilterPreProcessor()
    {
        return new FilterPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\PaginationPreProcessor
     */
    public function buildPaginationPreProcessor()
    {
        return new PaginationPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\PathPreProcessor
     */
    public function buildPathPreProcessor()
    {
        return new PathPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Action\AddActionPreProcessor
     */
    public function buildAddActionPreProcessor()
    {
        return new AddActionPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Action\FindActionPreProcessor
     */
    public function buildFindActionPreProcessor()
    {
        return new FindActionPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Action\GetActionPreProcessor
     */
    public function buildGetActionPreProcessor()
    {
        return new GetActionPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Action\UpdateActionPreProcessor
     */
    public function buildUpdateActionPreProcessor()
    {
        return new UpdateActionPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Fields\FieldsByQueryPreProcessor
     */
    public function buildFieldsByQueryPreProcessor()
    {
        return new FieldsByQueryPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Header\PaginationByHeaderFilterPreProcessor
     */
    public function buildPaginationByHeaderFilterPreProcessor()
    {
        return new PaginationByHeaderFilterPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Query\CriteriaByQueryFilterPreProcessor
     */
    public function buildCriteriaByQueryFilterPreProcessor()
    {
        return new CriteriaByQueryFilterPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Query\PaginationByQueryFilterPreProcessor
     */
    public function buildPaginationByQueryFilterPreProcessor()
    {
        return new PaginationByQueryFilterPreProcessor(
            $this->apiConfig
        );
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Filter\Query\SortByQueryFilterPreProcessor
     */
    public function buildSortByQueryFilterPreProcessor()
    {
        return new SortByQueryFilterPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Format\FormatTypeByHeaderPreProcessor
     */
    public function buildFormatTypeByHeaderPreProcessor()
    {
        return new FormatTypeByHeaderPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Format\FormatTypeByPathPreProcessor
     */
    public function buildFormatTypeByPathPreProcessor()
    {
        return new FormatTypeByPathPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Resource\ResourceActionPreProcessor
     */
    public function buildResourceActionPreProcessor()
    {
        return new ResourceActionPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Resource\ResourceParametersPreProcessor
     */
    public function buildResourceParamametersPreProcessor()
    {
        return new ResourceParametersPreProcessor();
    }

    /**
     * @return \Spryker\Zed\Api\Business\Model\Processor\Pre\Resource\ResourcePreProcessor
     */
    public function buildResourcePreProcessor()
    {
        return new ResourcePreProcessor();
    }

}
