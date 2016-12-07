<?php

namespace CatenaMediaBundle\ServiceProvider\Connector;

use CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderException;
use CatenaMediaBundle\ServiceProvider\Connector\Connector;
use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\RequestType\RequestType;
use CatenaMediaBundle\ServiceType\ServiceType;
use Doctrine\ORM\EntityManager;



/**
 * Class ConnectorFactory
 *
 * @package CatenaMediaBundle\ServiceProvider\Connector
 */
class ConnectorFactory
{

    /**
     * Stores a class file path
     *
     * @var string
     */
    private static $classFile;


    /**
     * Creates a specific Service Provider Service Connector object, ie. GtaHotelConnector
     * and fallbacks to Service Provider Connector, ie. GtaConnector in case it has not been found
     *
     * @param ServiceProvider $serviceProvider
     * @param ServiceType $serviceType
     * @param RequestType $requestType
     * @param $params
     * @param EntityManager $em
     * @return Connector
     * @throws \CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderException
     */
    public static function create(ServiceProvider $serviceProvider,ServiceType $serviceType, RequestType $requestType, $params, EntityManager $em)
    {
        $obj = self::createConnector($serviceProvider, $requestType, $params, $serviceType->getName(), $em);

        null === $obj && $obj = self::createConnector($serviceProvider, $requestType, $params,null,$em);

        if (is_null($obj) || !$obj instanceof ConnectorInterface) {
            throw new ServiceProviderException('Class file not found: ' . self::$classFile, 100);
        }

        return $obj;
    }

    /**
     * Creates a Service Provider Connector object
     *
     * @param ServiceProvider $provider
     * @param RequestType $requestType
     * @param  $params
     * @param string $type
     * @return Connector
     * @throws \CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderException
     */
    private static function createConnector(ServiceProvider $provider, RequestType $requestType,  $params, $type = null, EntityManager $em)
    {
        // build a class name and namespace
        $class = sprintf("CatenaMediaBundle\\ServiceProvider\\Provider\\%s\\Connector\\%sConnector",
            ucfirst($provider->getName()),
            ucfirst(($type ?: $provider->getName()))
        );

        /*
        @todo: Check if requested provider and connector exists

        // return if a class file doesn't exist
        if (!file_exists(self::$classFile))
            return null;

        */


        return new $class($provider, $requestType, $params, $em);
    }

}
