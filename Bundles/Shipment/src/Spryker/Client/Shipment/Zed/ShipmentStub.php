<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Shipment\Zed;

use \ArrayObject;
use Generated\Shared\Transfer\ItemCollectionTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\ZedRequest\ZedRequestClient;

class ShipmentStub implements ShipmentStubInterface
{
    /**
     * @var \Spryker\Client\ZedRequest\ZedRequestClient
     */
    protected $zedStub;

    /**
     * @param \Spryker\Client\ZedRequest\ZedRequestClient $zedStub
     */
    public function __construct(ZedRequestClient $zedStub)
    {
        $this->zedStub = $zedStub;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\ShipmentMethodsTransfer
     */
    public function getAvailableMethods(QuoteTransfer $quoteTransfer)
    {
        /** @var \Generated\Shared\Transfer\ShipmentMethodsTransfer $shipmentMethodTransfer */
        $shipmentMethodTransfer = $this->zedStub->call('/shipment/gateway/get-available-methods', $quoteTransfer);

        return $shipmentMethodTransfer;
    }

    /**
     * @param \ArrayObject|\Generated\Shared\Transfer\ItemCollectionTransfer $itemCollectionTransfer
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\ShipmentGroupTransfer[]
     */
    public function getShipmentGroups(ItemCollectionTransfer $itemCollectionTransfer): ArrayObject
    {
        /** @var \Generated\Shared\Transfer\ShipmentGroupCollectionTransfer $shipmentGroupCollectionTransfer */
        $shipmentGroupCollectionTransfer = $this->zedStub->call('/shipment/gateway/get-shipment-groups', $itemCollectionTransfer);

        return $shipmentGroupCollectionTransfer->getGroups();
    }
}
