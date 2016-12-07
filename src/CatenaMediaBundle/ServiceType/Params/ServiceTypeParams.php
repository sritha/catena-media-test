<?php
namespace CatenaMediaBundle\ServiceType\Params;

use CatenaMediaBundle\ServiceType\ServiceType;
use TC\Application\Config\ApplicationConfig;

/**
 * Class ServiceTypeParams
 *
 * @package CatenaMediaBundle\Service\Request\Params
 */
abstract class ServiceTypeParams extends \ArrayObject {


	protected $generatedToken;


    /** @var ServiceType */
    protected $serviceType;


    public function getServiceType() {
        return $this->serviceType;
    }
    public function setServiceType(ServiceType $serviceType) {
        $this->serviceType = $serviceType;

        return $this;
    }

}
