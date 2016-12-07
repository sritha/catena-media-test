<?php

namespace CatenaMediaBundle\ServiceProvider\Response;

/**
 * Class JSONResponse
 *
 * @package CatenaMediaBundle\ServiceProvider\Response
 */
abstract class JsonResponse extends ServiceProviderResponse
{

    /**
     * Stores JSON Response
     *
     * @var $JSONResponse
     */
    protected $JSONResponse;


    /**
     * Init
     *
     * @param mixed $jsonData
     */
    public function __construct($jsonData = null)
    {
        parent::__construct();

        if (!empty($jsonData)) {
            $this->JSONResponse = $jsonData;
        }
    }

    /**
     * Returns response Array
     *
     * @param $responseStr
     * @return mixed
     */
    public function getJSONResponse($responseStr = null)
    {
        if (!empty($responseStr)) {
			if(isset($this->JSONResponse[$responseStr])){
				return $this->JSONResponse[$responseStr];
			}
            return [];
        }
        else{
            return $this->JSONResponse;
        }

    }

     /**
     * Returns Json Encoded String
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->JSONResponse);
    }

    /**
     * Parses a response
     *
     * @return mixed
     */
    public function parse()
    {
        // Child classes must override this.
    }
}
