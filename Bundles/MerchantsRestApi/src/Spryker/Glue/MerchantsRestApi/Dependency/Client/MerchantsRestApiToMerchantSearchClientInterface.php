<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\MerchantsRestApi\Dependency\Client;

use Generated\Shared\Transfer\MerchantSearchRequestTransfer;

interface MerchantsRestApiToMerchantSearchClientInterface
{
    /**
     * @todo
     *
     * @param \Generated\Shared\Transfer\MerchantSearchRequestTransfer $merchantSearchRequestTransfer
     *
     * @return array
     */
    public function searchMerchants(MerchantSearchRequestTransfer $merchantSearchRequestTransfer): array;
}
