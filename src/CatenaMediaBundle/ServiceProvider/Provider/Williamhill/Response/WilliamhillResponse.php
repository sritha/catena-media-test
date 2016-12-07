<?php

namespace CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Response;

use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\Response\XmlResponse;
use CatenaMediaBundle\ServiceType\Params\ServiceTypeParams;


/**
 * Class WilliamhillResponse
 *
 * @package CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Response
 */
abstract class WilliamhillResponse extends XmlResponse
{

    const MSG_SERVICE_UNAVAILABLE = 'SERVICE_UNAVAILABLE';


    /**
     * @var array
     */
    protected $inputParams;

    /**
     * Class constructor
     *
     * @param null $xmlData
     * @param array $inputParams
     */
    public function __construct($xmlData, ServiceTypeParams $inputParams = null)
    {

        // set input params
        $this->inputParams = $inputParams;

        // handle an error in case a connection could not be made to the provider
        $this->validateServiceAvailable($xmlData);

        // load the provider response
        parent::__construct($xmlData);

        $this->jsonResponse = $this->jsonResponse->response;

        // check for errors in the provider response
        $this->processErrors();
    }

    /**
     * Returns errors from parsed XML
     *
     * @return array|mixed
     */
    public function processErrors()
    {
       //Todo: add error handling
    }

    private function validateServiceAvailable($xmlData)
    {
        if (false === $xmlData) {
            $this->addError(self::MSG_SERVICE_UNAVAILABLE, ServiceProvider::WILLIAMHILL);
            return;
        }

        return true;
    }




}
