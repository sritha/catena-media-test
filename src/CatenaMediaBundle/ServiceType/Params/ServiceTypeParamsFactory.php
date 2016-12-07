<?php
namespace CatenaMediaBundle\ServiceType\Params;

use CatenaMediaBundle\ServiceType\ServiceType;

/**
 * Class ServiceRequestParamsFactory
 *
 * @package CatenaMediaBundle\Service\Request\Params
 */
class ServiceTypeParamsFactory
{
    /**
     * Returns a specific Service Request Params object
     *
     * @param string $serviceType
     * @param array $defaultParams
     * @return ServiceTypeParams
     */
    public static function create(ServiceType $serviceType, $defaultParams = array())
    {
        // build a class name and file name
        $class = sprintf(
            '%s\%sParams',
            __NAMESPACE__,
            ucfirst($serviceType)
        );

        return (new $class($defaultParams))->setServiceType($serviceType);
    }

}
