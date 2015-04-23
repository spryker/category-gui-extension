<?php

namespace SprykerFeature\Zed\CategoryExporter\Business\KeyBuilder;

use SprykerFeature\Shared\Category\CategoryResourceSettings;
use \SprykerFeature\Shared\UrlExporter\Code\KeyBuilder\ResourceKeyBuilder as SharedResourceKeyBuilder;

class ResourceKeyBuilder extends SharedResourceKeyBuilder
{
    /**
     * @return string
     */
    protected function getResourceType()
    {
        return CategoryResourceSettings::ITEM_TYPE;
    }
}
