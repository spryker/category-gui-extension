<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\CartsRestApi\Processor\Quote;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Client\CartsRestApi\CartsRestApiClientInterface;

class QuoteCollectionReader implements QuoteCollectionReaderInterface
{
    /**
     * @var \Spryker\Client\CartsRestApi\CartsRestApiClientInterface
     */
    protected $cartsRestApiClient;

    /**
     * @param \Spryker\Client\CartsRestApi\CartsRestApiClientInterface $cartsRestApiClient
     */
    public function __construct(CartsRestApiClientInterface $cartsRestApiClient)
    {
        $this->cartsRestApiClient = $cartsRestApiClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getQuoteCollectionByCriteria(QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer): QuoteCollectionTransfer
    {
        $quoteCollectionResponseTransfer = $this->cartsRestApiClient->getQuoteCollectionByCustomerReference(
            (new CustomerTransfer())->setCustomerReference($quoteCriteriaFilterTransfer->getCustomerReference())
        );

        $quoteCollectionTransfer = $quoteCollectionResponseTransfer->getQuoteCollection();
        if (!$quoteCollectionTransfer) {
            return new QuoteCollectionTransfer();
        }

        return $quoteCollectionTransfer;
    }
}
