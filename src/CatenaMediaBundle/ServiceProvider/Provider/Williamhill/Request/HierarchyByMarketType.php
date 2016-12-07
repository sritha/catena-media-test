<?php

namespace CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Request;

use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Request\WilliamhillRequest;

/**
 * Class HierarchyByMarketType
 *
 * @package CatenaMediaBundle\ServiceProvider\Williamhill\Request
 */

class HierarchyByMarketType extends WilliamhillRequest
{

	/**
	 * Request end point
	 *
	 * @var string
	 */
	protected $requestEndPoint = '';


	/**
	 * Prepares a request from input params
	 */
	public function prepare()
	{

        // get all default values from config
	    $action = isset($this->inputParams['action'])?$this->inputParams['action']:'template';
        $template = isset($this->inputParams['template'])?$this->inputParams['template']:'getHierarchyByMarketType';
        $classId = isset($this->inputParams['classId'])?$this->inputParams['classId']:'1';
        $marketSort = isset($this->inputParams['marketSort'])?$this->inputParams['marketSort']:'HF';
        $filterBIR = isset($this->inputParams['filterBIR'])?$this->inputParams['filterBIR']:'N';

        $this->setInputParam('action', $action);
        $this->setInputParam('template', $template);
        $this->setInputParam('classId', $classId);
        $this->setInputParam('marketSort', $marketSort);
        $this->setInputParam('filterBIR', $filterBIR);


	}


}