<?php

namespace CatenaMediaBundle\ServiceProvider\Response;


/**
 * Class XMLResponse
 *
 * @package CatenaMediaBundle\ServiceProvider\Response
 */
abstract class XmlResponse extends ServiceProviderResponse
{

    /**
     * Stores XML String
     *
     * @var $xmlData
     */
    protected $xmlData;

    /**
     * Stores Json Object
     *
     * @var $jsonResponse
     */
    public $jsonResponse;

    /**
     * Init
     *
     * @param mixed $xmlData
     */
    public function __construct($xmlData = null)
    {
        parent::__construct();

        if (!empty($xmlData)) {
            $this->xmlData = $xmlData;
            $simpleXml = simplexml_load_string($xmlData);
            $json = json_encode($simpleXml);
            $this->jsonResponse = json_decode($json);
        }

    }

    /**
     * Returns  XML String
     *
     * @return string
     */
    public function __toString()
    {
        return $this->xmlData;
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
