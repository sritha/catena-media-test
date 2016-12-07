<?php
namespace CatenaMediaBundle\ServiceProvider\Processor;

use CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderInvalidInputException;

use CatenaMediaBundle\ServiceProvider\Processor;

use CatenaMediaBundle\ServiceProvider\Connector\Connector;
use CatenaMediaBundle\ServiceProvider\Connector\ConnectorFactory;
use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\RequestType\RequestType;
use CatenaMediaBundle\ServiceProvider\Response\ServiceProviderResponse;
use CatenaMediaBundle\ServiceType\Params\ServiceTypeParams;
use CatenaMediaBundle\ServiceType\ServiceType;
use CatenaMediaBundle\ServiceType\ServiceTypeInterface;
use Doctrine\ORM\EntityManager;

class ServiceProviderProcess extends Process implements ServiceTypeInterface
{
    const EXCEPTION_ERROR_CODE = 'UNCAUGHT_ERROR';

    protected
        $provider,
        $serviceType,
        $requestType,
        $params,
        $em,
        $serviceProviderConnector;

    /**
     * Class constructor
     *
     * @param ServiceTypeParams $params
     * @param ServiceProvider $provider
     * @param RequestType $requestType
     * @param EntityManager $em
     * @throws \CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderInvalidInputException
     */
    public function __construct(ServiceTypeParams $params, ServiceProvider $provider, RequestType $requestType, EntityManager $em)
    {
        $this->serviceProviderConnector = $connector = ConnectorFactory::create(
            $this->provider = $provider,
            $this->serviceType = $params->getServiceType(),
            $this->requestType = $requestType,
            $this->params = $params,
            $this->em = $em
        );

    }

    /**
     * @return ServiceProvider
     */
    public function getProvider() {
        return $this->provider;
    }

    /**
     * @return ServiceType
     */
    public function getServiceType() {
        return $this->serviceType;
    }

    /**
     * @return RequestType
     */
    public function getRequestType() {
        return $this->requestType;
    }

    /**
     * @return ServiceTypeParams
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @return Connector
     */
    public function getConnector() {
        return $this->serviceProviderConnector;
    }

    /**
     * @return ServiceProviderResponse
     */
    public function execute() {
        try {
			$client_request_token = $this->getGUID(); //unique ID for each request to trace and save request and response
            $response = $this->serviceProviderConnector->process($client_request_token);
           // $responseData = $response->getResponse();

        }
        catch (\Exception $e) {

            return (new ServiceProviderResponse)->addError(get_class($e), self::EXCEPTION_ERROR_CODE);
        }

        return $response;
    }

    private function getGUID(){

            mt_srand((double)microtime()*10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
    }
}
