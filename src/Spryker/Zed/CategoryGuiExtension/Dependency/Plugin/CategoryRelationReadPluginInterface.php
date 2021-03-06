<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryGuiExtension\Dependency\Plugin;

use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;

/**
 * Implement this plugin interface to expand rendered relations at the category view page.
 */
interface CategoryRelationReadPluginInterface
{
    /**
     * Specification:
     * - Returns a descriptive name for the relations.
     *
     * @api
     *
     * @return string
     */
    public function getRelationName(): string;

    /**
     * Specification:
     * - Finds related entities.
     * - Returns a list of string representations for the entities in the given language.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CategoryTransfer $categoryTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return array<string>
     */
    public function getRelations(CategoryTransfer $categoryTransfer, LocaleTransfer $localeTransfer): array;
}
