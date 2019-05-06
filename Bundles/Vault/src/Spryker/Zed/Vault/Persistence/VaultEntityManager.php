<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Vault\Persistence;

use Generated\Shared\Transfer\VaultTransfer;
use Orm\Zed\Vault\Persistence\SpyVault;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \Spryker\Zed\Vault\Persistence\VaultPersistenceFactory getFactory()
 */
class VaultEntityManager extends AbstractEntityManager implements VaultEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\VaultTransfer $vaultTransfer
     *
     * @return bool
     */
    public function createVault(VaultTransfer $vaultTransfer): bool
    {
        $vaultEntity = $this->getFactory()
            ->createVaultMapper()
            ->mapVaultTransferToEntity(
                $vaultTransfer,
                new SpyVault()
            );

        return (bool)$vaultEntity->save();
    }

    /**
     * @param \Generated\Shared\Transfer\VaultTransfer $vaultTransfer
     *
     * @return bool
     */
    public function updateVault(VaultTransfer $vaultTransfer): bool
    {
        $vaultEntity = $this->getFactory()
            ->createVaultPropelQuery()
            ->filterByDataType($vaultTransfer->getDataType())
            ->filterByDataKey($vaultTransfer->getDataKey())
            ->findOne();

        if (!$vaultEntity) {
            return false;
        }

        $vaultEntity = $this->getFactory()
            ->createVaultMapper()
            ->mapVaultTransferToEntity(
                $vaultTransfer,
                new SpyVault()
            );

        return (bool)$vaultEntity->save();
    }
}
