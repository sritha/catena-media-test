<?php

namespace CatenaMediaBundle\ServiceProvider\Request;

/**
 * Class RESTRequest
 *
 * @package CatenaMediaBundle\ServiceProvider\Request
 */
class RESTRequest extends Request
{

    /**
     * Stores requestEndpoint
     *
     * @var string
     */
    protected $requestEndPoint;

    /**
     * Stores request params
     *
     * @var array
     */
    private $requestParams = array();

    /**
     * Stores a custom request Url
     *
     * @var string
     */
    protected $requestUrl;

	/**
	 * Request method
	 *
	 * @var string
	 */
	protected $requestMethod = 'get';


    public function init() {}

    public function addParam($mixed, $value = null)
    {
        $this->requestParams[$mixed] = $value;
        return $this;
    }

    public function removeParam($mixed)
    {
        unset($this->requestParams[$mixed]);
        return $this;
    }

    /**
     * Returns Rest Request EndPoint String
     *
     * @return String
     */
    public function getRequestEndPoint()
    {
        return $this->requestEndPoint;
    }

    /**
     * sets the value for request end point
     *
     * @param string $requestEndPoint
     */
    public function setRequestEndPoint($requestEndPoint)
    {
        $this->requestEndPoint = $requestEndPoint;
    }

    /**
     * Returns Rest Request params Array
     *
     * @return array
     */
    public function getRequestParams()
    {
        return $this->requestParams;
    }

    /**
     * Returns a custom Request url
     *
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    /**
     * Sets a custom Request url
     *
     * @param string $requestUrl
     */
    public function setRequestUrl($requestUrl)
    {
        $this->requestUrl = $requestUrl;
        return $this;
    }

	/**
	 * Returns a custom Request Method
	 *
	 * @return string
	 */
	public function getRequestMethod()
	{
		return $this->requestMethod;
	}

	/**
	 * Sets a custom Request Method
	 *
	 * @param string $requestMethod
	 */
	public function setRequestMethod($requestMethod)
	{
		$this->requestMethod = $requestMethod;
		return $this;
	}

    /**
     * Returns Json Encoded String
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->requestParams);
    }

}
