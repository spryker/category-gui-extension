<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductOfferGuiPage\Communication\Table\ProductOfferTable\CriteriaBuilder;

use Generated\Shared\Transfer\PaginationTransfer;
use Generated\Shared\Transfer\ProductOfferTableCriteriaTransfer;
use Spryker\Zed\ProductOfferGuiPage\Dependency\Facade\ProductOfferGuiPageToLocaleFacadeInterface;
use Spryker\Zed\ProductOfferGuiPage\Dependency\Facade\ProductOfferGuiPageToMerchantUserFacadeInterface;

class ProductOfferTableCriteriaBuilder implements ProductOfferTableCriteriaBuilderInterface
{
    /**
     * @var \Spryker\Zed\ProductOfferGuiPage\Dependency\Facade\ProductOfferGuiPageToMerchantUserFacadeInterface
     */
    protected $merchantUserFacade;

    /**
     * @var \Spryker\Zed\ProductOfferGuiPage\Dependency\Facade\ProductOfferGuiPageToLocaleFacadeInterface
     */
    protected $localeFacade;

    /**
     * @var string|null
     */
    protected $searchTerm;

    /**
     * @var array
     */
    protected $sorting;

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $pageSize;

    /**
     * @var array
     */
    protected $filters;

    /**
     * @param \Spryker\Zed\ProductOfferGuiPage\Dependency\Facade\ProductOfferGuiPageToMerchantUserFacadeInterface $merchantUserFacade
     * @param \Spryker\Zed\ProductOfferGuiPage\Dependency\Facade\ProductOfferGuiPageToLocaleFacadeInterface $localeFacade
     */
    public function __construct(
        ProductOfferGuiPageToMerchantUserFacadeInterface $merchantUserFacade,
        ProductOfferGuiPageToLocaleFacadeInterface $localeFacade
    ) {
        $this->merchantUserFacade = $merchantUserFacade;
        $this->localeFacade = $localeFacade;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductOfferTableCriteriaTransfer
     */
    public function build(): ProductOfferTableCriteriaTransfer
    {
        $productOfferTableCriteriaTransfer = $this->buildProductOfferTableCriteriaTransfer();
        $productOfferTableCriteriaTransfer->setSearchTerm($this->searchTerm);
        $productOfferTableCriteriaTransfer->setOrderBy($this->sorting);
        $productOfferTableCriteriaTransfer->setPagination($this->buildPaginationTransfer());

        return $productOfferTableCriteriaTransfer;
    }

    /**
     * @param int $page
     *
     * @return $this
     */
    public function setPage(int $page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param int $pageSize
     *
     * @return $this
     */
    public function setPageSize(int $pageSize)
    {
        $this->pageSize = $pageSize;

        return $this;
    }

    /**
     * @param string|null $searchTerm
     *
     * @return $this
     */
    public function setSearchTerm(?string $searchTerm)
    {
        $this->searchTerm = $searchTerm;

        return $this;
    }

    /**
     * @param string[] $sorting
     *
     * @return $this
     */
    public function setSorting(array $sorting)
    {
        $this->sorting = $sorting;

        return $this;
    }

    /**
     * @param array $filters
     *
     * @return $this
     */
    public function setFilters(array $filters)
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductOfferTableCriteriaTransfer
     */
    protected function buildProductOfferTableCriteriaTransfer(): ProductOfferTableCriteriaTransfer
    {
        $productOfferTableCriteriaTransfer = new ProductOfferTableCriteriaTransfer();
        $productOfferTableCriteriaTransfer->setMerchantUser($this->merchantUserFacade->getCurrentMerchantUser());
        $productOfferTableCriteriaTransfer->setLocale($this->localeFacade->getCurrentLocale());

        return $productOfferTableCriteriaTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\PaginationTransfer
     */
    protected function buildPaginationTransfer(): PaginationTransfer
    {
        return (new PaginationTransfer())
            ->setPage($this->page)
            ->setMaxPerPage($this->pageSize);
    }
}
