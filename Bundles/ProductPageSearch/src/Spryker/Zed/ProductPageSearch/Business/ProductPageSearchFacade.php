<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductPageSearch\Business;

use Generated\Shared\Transfer\FilterTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Spryker\Zed\ProductPageSearch\Business\ProductPageSearchBusinessFactory getFactory()
 * @method \Spryker\Zed\ProductPageSearch\Persistence\ProductPageSearchEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\ProductPageSearch\Persistence\ProductPageSearchRepositoryInterface getRepository()
 */
class ProductPageSearchFacade extends AbstractFacade implements ProductPageSearchFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array $productAbstractIds
     *
     * @return void
     */
    public function publish(array $productAbstractIds)
    {
        $this->getFactory()
            ->createProductAbstractPagePublisher()
            ->publish($productAbstractIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array $productAbstractIds
     * @param array $pageDataExpanderPluginNames
     *
     * @return void
     */
    public function refresh(array $productAbstractIds, $pageDataExpanderPluginNames = [])
    {
        $this->getFactory()
            ->createProductAbstractPagePublisher()
            ->refresh($productAbstractIds, $pageDataExpanderPluginNames);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array $productAbstractIds
     *
     * @return void
     */
    public function unpublish(array $productAbstractIds)
    {
        $this->getFactory()
            ->createProductAbstractPagePublisher()
            ->unpublish($productAbstractIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int[] $productIds
     *
     * @return void
     */
    public function publishProductConcretes(array $productIds): void
    {
        $this->getFactory()
            ->createProductConcretePageSearchPublisher()
            ->publish($productIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int[] $productIds
     *
     * @return void
     */
    public function unpublishProductConcretes(array $productIds): void
    {
        $this->getFactory()
            ->createProductConcretePageSearchPublisher()
            ->unpublish($productIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array $productAbstractStoreMap Keys are product abstract IDs, values are store IDs.
     *
     * @return void
     */
    public function unpublishProductConcretePageSearches(array $productAbstractStoreMap): void
    {
        $this->getFactory()
            ->createProductConcretePageSearchUnpublisher()
            ->unpublishByAbstractProductsAndStores($productAbstractStoreMap);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @deprecated Use getProductConcretePageSearchCollectionByFilter instead.
     *
     * @param int[] $productIds
     *
     * @return \Generated\Shared\Transfer\ProductConcretePageSearchTransfer[]
     */
    public function getProductConcretePageSearchTransfersByProductIds(array $productIds): array
    {
        return $this->getFactory()
            ->createProductConcretePageSearchReader()
            ->getProductConcretePageSearchTransfersByProductIds($productIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int[] $productAbstractIds
     *
     * @return void
     */
    public function publishProductConcretePageSearchesByProductAbstractIds(array $productAbstractIds): void
    {
        $this->getFactory()
            ->createProductConcretePageSearchPublisher()
            ->publishProductConcretePageSearchesByProductAbstractIds($productAbstractIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FilterTransfer $filterTransfer
     *
     * @return \Generated\Shared\Transfer\SpyProductEntityTransfer[]
     */
    public function getProductCollectionByFilter(FilterTransfer $filterTransfer): array
    {
        return $this->getRepository()->getProductCollectionByFilter($filterTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FilterTransfer $filterTransfer
     * @param int[] $productIds
     *
     * @return \Generated\Shared\Transfer\ProductConcretePageSearchTransfer[]
     */
    public function getProductConcretePageSearchCollectionByFilter(FilterTransfer $filterTransfer, array $productIds): array
    {
        return $this->getFactory()
            ->createProductConcretePageSearchReader()
            ->getProductConcretePageSearchCollectionByFilter($filterTransfer, $productIds);
    }
}
