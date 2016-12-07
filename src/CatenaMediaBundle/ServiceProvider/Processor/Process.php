<?php
namespace CatenaMediaBundle\ServiceProvider\Processor;

use CatenaMediaBundle\ServiceProvider\Processor\ProcessInterface;

abstract class Process implements ProcessInterface {
    /** @var Request */
    protected $request;

    public function setRequest($request) {
        $this->request = $request;
    }

    public function getRequest() {
        return $this->request;
    }
}