<?php

namespace CatenaMediaBundle\ServiceProvider\Log;


use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\Request\Request;
use CatenaMediaBundle\ServiceProvider\RequestType\RequestType;
use CatenaMediaBundle\ServiceProvider\Response\ServiceProviderResponse;



/**
 * Class ServiceProviderLogger
 *
 * @package CatenaMediaBundle\ServiceProvider\Log
 */
class ServiceProviderLogger
{


	static $lastRequestId;

	/**
	 * @param ServiceProvider $provider
	 * @param Request $request
	 * @param RequestType $requestType
	 * @param  $params
	 */
	public static function logRequest(ServiceProvider $provider, Request $request, RequestType $requestType, $params, $clientRequestToken)
    {
       //@todo: save full log request
    }

	/**
	 * @param ServiceProvider $provider
	 * @param ServiceProviderResponse $response
	 * @param RequestType $requestType
	 * @param  $params
	 */
	public static function logResponse(ServiceProvider $provider, ServiceProviderResponse $response, RequestType $requestType,  $params, $clientRequestToken)
    {
        //@todo: save full log response to the same request based on client request token
    }

}
