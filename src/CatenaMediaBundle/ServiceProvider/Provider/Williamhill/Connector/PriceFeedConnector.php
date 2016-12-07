<?php

namespace CatenaMediaBundle\ServiceProvider\Provider\Expedia\Connector;

use CatenaMediaBundle\ServiceProvider\Connector\RESTConnector;
use CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Request;
use CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Response;
use CatenaMediaBundle\ServiceType\Params\PriceFeedParams;


/**
 * Class PriceFeedConnector
 *
 * @package CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Connector
 */
class PriceFeedConnector extends RESTConnector
{

    /**
     * Provides a getHierarchyByMarketType template from price feed
     *
     * @param PriceFeedParams $priceFeedParams
     * @return Response\HierarchyByMarketType
     */
    public function getHierarchyByMarketType(PriceFeedParams $priceFeedParams)
    {
        $request = new Request\HierarchyByMarketType($priceFeedParams);
		$response = $this->send($request);

		return new Response\HierarchyByMarketType($response, $request->getInputParams());
    }




}
