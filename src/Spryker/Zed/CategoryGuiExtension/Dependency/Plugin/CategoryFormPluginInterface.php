<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CategoryGuiExtension\Dependency\Plugin;

use Symfony\Component\Form\FormBuilderInterface;

/**
 * Implement this plugin interface to expand form data, customize the form building and handling processes.
 */
interface CategoryFormPluginInterface
{
    /**
     * Specification:
     * - Adds form parts to the main form builder.
     *
     * @api
     *
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder): void;
}
