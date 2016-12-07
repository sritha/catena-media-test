<?php
namespace CatenaMediaBundle\ServiceProvider\Connector;

use GuzzleHttp\Client;
use CatenaMediaBundle\ServiceProvider\Request\Request;


/**
 * Class RESTConnector
 *
 * @package CatenaMediaBundle\ServiceProvider\Connector
 */
class RESTConnector extends Connector
{

    /**
     * Executes a single request
     *
     * @param Request $request
     * @return mixed
     */
    protected function execute(Request $request)
    {
        try {

            $requestUrl = $request->getRequestUrl() ?: $this->config['url'];

            $requestParams = $request->getRequestParams();

            if(isset($requestParams['auth'])){
              //@todo: set request headers with authentication info based on auth type
            }


            if ($request->getRequestMethod() != 'post') {

                $requestBody['query'] = $requestParams;

                $restResponse = (new Client())->get(
                    $requestUrl . $request->getRequestEndPoint(),
                    $requestBody
                );

            } else {
                $requestBody['body'] = $requestParams;
                $restResponse = (new Client())->post(
                    $requestUrl . $request->getRequestEndPoint(),
                    $requestBody
                );
            }

            return $restResponse->getBody()->getContents();
        } catch(\Exception $e) {

            $error = array(
                'error' => array(
                    'code' => $e->getCode(),
                    'message' => 'Feed data Error',
                ),
            );

            return $error;
        }
    }
}
