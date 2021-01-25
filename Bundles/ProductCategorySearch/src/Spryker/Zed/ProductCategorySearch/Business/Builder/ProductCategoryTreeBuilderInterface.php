<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductCategorySearch\Business\Builder;

use Generated\Shared\Transfer\LocaleTransfer;

interface ProductCategoryTreeBuilderInterface
{
    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return int[][]
     */
    public function buildProductCategoryTree(LocaleTransfer $localeTransfer): array;

    /**
     * @param int[] $categoryIds
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return string[][]
     */
    public function buildProductCategoryTreeNames(array $categoryIds, LocaleTransfer $localeTransfer): array;
}
