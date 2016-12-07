<?php

namespace CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Request;

use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\Request\RESTRequest;

/**
 * Class WilliamhillRequest
 *
 * @package CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Request
 */
abstract class WilliamhillRequest extends RESTRequest
{

	/**
	 * Stores Application Config
	 *
	 * @var $config
	 */
	protected $config;

	/**
	 * @var ServiceProvider
	 */
	protected $provider;

    /**
     * Class init
     */
    public function init()
    {
		$this->provider = new ServiceProvider(ServiceProvider::WILLIAMHILL);
		$this->config   = $this->provider->getConfig('request'); //@todo: get string from constant

		$this->prepare();
    }


    /**
     * Prepares a single request
     */
    abstract protected function prepare();
}
