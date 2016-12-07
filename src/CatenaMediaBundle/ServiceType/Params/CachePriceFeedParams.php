<?php

namespace CatenaMediaBundle\ServiceType\Params;

use CatenaMediaBundle\ServiceType\ServiceType;


/**
 * Class CachePriceFeedParams
 */
class CachePriceFeedParams extends ServiceTypeParams
{



    public function getUniqueId()
    {
        return parent::getUniqueId(ServiceType::CACHE_PRICE_FEED);
    }


}
