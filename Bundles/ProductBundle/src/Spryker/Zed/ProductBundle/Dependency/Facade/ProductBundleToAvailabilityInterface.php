<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductBundle\Dependency\Facade;

use Generated\Shared\Transfer\StoreTransfer;
use Spryker\DecimalObject\Decimal;

interface ProductBundleToAvailabilityInterface
{
    /**
     * @param int $idAvailabilityAbstract
     *
     * @return void
     */
    public function touchAvailabilityAbstract($idAvailabilityAbstract);

    /**
     * @param string $sku
     * @param \Spryker\DecimalObject\Decimal $quantity
     *
     * @return int
     */
    public function saveProductAvailability(string $sku, Decimal $quantity): int;

    /**
     * @param string $sku
     * @param \Spryker\DecimalObject\Decimal $quantity
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     *
     * @return int
     */
    public function saveProductAvailabilityForStore(string $sku, Decimal $quantity, StoreTransfer $storeTransfer): int;

    /**
     * @param string $sku
     * @param \Spryker\DecimalObject\Decimal $quantity
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     *
     * @return bool
     */
    public function isProductSellableForStore(string $sku, Decimal $quantity, StoreTransfer $storeTransfer): bool;

    /**
     * @param string $sku
     * @param \Generated\Shared\Transfer\StoreTransfer $storeTransfer
     *
     * @return \Spryker\DecimalObject\Decimal
     */
    public function calculateAvailabilityForProductWithStore(string $sku, StoreTransfer $storeTransfer): Decimal;
}
