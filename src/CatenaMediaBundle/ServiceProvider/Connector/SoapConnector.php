<?php
namespace CatenaMediaBundle\ServiceProvider\Connector;

use CatenaMediaBundle\ServiceProvider\Request\Request;
use CatenaMediaBundle\ServiceProvider\Request\SoapRequest;

/**
 * Class SoapConnector
 *
 * @package CatenaMediaBundle\ServiceProvider\Connector
 */
class SoapConnector extends Connector
{
    /** @var \SoapClient */
    private $soap;

    /**
     * Executes a single request
     *
     * @param SoapRequest $request
     * @return mixed
     */
    protected function execute(Request $request)
    {
        //Download WSDL.
        $this->soap = new \SoapClient(
            $request->getUrl(),
            [
                'trace' => true
            ]
        );

        //Add headers.
        $this->soap->__setSoapHeaders($request->getHeaders());

        //Call SOAP operation.
        $result =  $this->soap->__soapCall($request->getOperation(), [$request->getParams()]);
        return $result;
    }
}
