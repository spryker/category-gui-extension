<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Acl\Communication\Plugin;

use Spryker\Zed\Installer\Dependency\Plugin\InstallerPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Spryker\Zed\Acl\Business\AclFacadeInterface getFacade()
 * @method \Spryker\Zed\Acl\Communication\AclCommunicationFactory getFactory()
 * @method \Spryker\Zed\Acl\AclConfig getConfig()
 * @method \Spryker\Zed\Acl\Persistence\AclQueryContainerInterface getQueryContainer()
 */
class AclInstallerPlugin extends AbstractPlugin implements InstallerPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return void
     */
    public function install()
    {
        $this->getFacade()->install();
    }
}
