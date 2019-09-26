<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\MerchantProfile\Business;

use Generated\Shared\Transfer\MerchantProfileTransfer;

interface MerchantProfileFacadeInterface
{
    /**
     * Specification:
     * - Saves merchant profile data provided by MerchantTransfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\MerchantProfileTransfer $merchantProfileTransfer
     *
     * @return \Generated\Shared\Transfer\MerchantProfileTransfer
     */
    public function saveMerchantProfile(MerchantProfileTransfer $merchantProfileTransfer): MerchantProfileTransfer;
}
