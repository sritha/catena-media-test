<?php

namespace CatenaMediaBundle\ServiceType\Params;

use CatenaMediaBundle\ServiceType\ServiceType;


/**
 * Class PriceFeedParams
 */
class PriceFeedParams extends ServiceTypeParams
{



    public function getUniqueId()
    {
        return parent::getUniqueId(ServiceType::PRICE_FEED);
    }


}
