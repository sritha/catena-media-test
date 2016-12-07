<?php
namespace CatenaMediaBundle\ServiceProvider\Connector;

use CatenaMediaBundle\ServiceProvider\Response\ServiceProviderResponse;

class MockConnector implements ConnectorInterface {
    public function process() {
        return new ServiceProviderResponse;
    }
}