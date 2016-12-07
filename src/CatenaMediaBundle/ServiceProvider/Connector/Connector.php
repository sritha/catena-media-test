<?php
namespace CatenaMediaBundle\ServiceProvider\Connector;


use CatenaMediaBundle\ServiceProvider\Log\ServiceProviderLogger;
use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\Request\Request;
use CatenaMediaBundle\ServiceProvider\RequestType\RequestType;
use CatenaMediaBundle\ServiceProvider\Response\ServiceProviderResponse;
use Doctrine\ORM\EntityManager;


/**
 * Class Connector
 *
 * @package CatenaMediaBundle\ServiceProvider\Connector
 */
abstract class Connector implements ConnectorInterface
{

    /**
     * Stores a connector config
     *
     * @var array
     */
    protected $config;

    /**
     * Stores a Service Provider
     *
     * @var ServiceProvider
     */
    protected $provider;

    /**
     * Stores a Client Request Token
     *
     * @var $clientRequestToken
     */
    private $clientRequestToken;

    /**
     * Stores a Request Type, ie. search
     *
     * @var RequestType
     */
    private $requestType;

    /** Stores array of params
     *
     * @var $params
     */
    private $params;

    /** Stores Entity Manager
     *
     * @var EntityManager
     */
    private $em;

	/**
     * Class constructor
     *
     * @param array $config
     */
    public function __construct(ServiceProvider $provider, RequestType $requestType,  $params, EntityManager $em)
    {
        $this->provider    = $provider;
        $this->requestType = $requestType;
        $this->params      = $params;
        $this->config      = $provider->getConfig('connector');
        $this->em          = $em;
    }

    /**
     * Returns a Entity Manager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * Returns a Request Type
     *
     * @return RequestType
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * Returns a  Client Request Token
     *
     * @return string
     */
    public function getClientRequestToken()
    {
        return $this->clientRequestToken;
    }

    /**
     * Processes a call to Service Provider
     *
     * @param  $params
     * @return \CatenaMediaBundle\ServiceProvider\Response\ServiceProviderResponse
     */
    public function process($client_request_token = null)
    {
		$this->clientRequestToken = $client_request_token;

        // get and parse a response
        /** @var $response ServiceProviderResponse */
        $response = $this->{"$this->requestType"}($this->params);

        $response->parse();

        // log a response
        ServiceProviderLogger::logResponse($this->provider, $response, $this->requestType, $this->params, $this->clientRequestToken);

        return $response;
    }

    /**
     * Sends a request and returns the response
     * Logs provider RQ, RS
     *
     * @param  Request  $request
     * @return ServiceProviderResponse $response
     */
    protected function send(Request $request)
    {
        // log a request
        ServiceProviderLogger::logRequest($this->provider, $request, $this->requestType, $this->params, $this->clientRequestToken);

        // execute a request and returns a response
        return $this->execute($request);
    }

    /**
     * Executes a request
     *
     * @param Request $request
     * @return mixed
     */
    abstract protected function execute(Request $request);
}
