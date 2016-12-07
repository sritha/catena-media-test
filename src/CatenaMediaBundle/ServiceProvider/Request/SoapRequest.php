<?php
namespace CatenaMediaBundle\ServiceProvider\Request;

/**
 * Class SoapRequest
 *
 * @package CatenaMediaBundle\ServiceProvider\Request
 */
class SoapRequest extends Request implements \ArrayAccess, \IteratorAggregate {
	private
        $url,

        $operation,

        $params = [],

        $headers = []
    ;

    public function __construct($url, $operation, array $params = [], array $headers = []) {
        $this->url = $url;
        $this->operation = $operation;
        $this->setParams($params);
        $this->setHeaders($headers);
    }

    public function getUrl() {
        return $this->url;
    }

    public function getOperation() {
        return $this->operation;
    }

    public function getParams() {
        return $this->params;
    }
    public function setParams(array $params) {
        $this->params = [];

        foreach ($params as $k => $v)
            $this->addParam($k, $v);
    }
    public function addParam($key, $value) {
        $this->params[$key] = $value;

        return $this;
    }

    public function getHeaders() {
        return $this->headers;
    }
    public function setHeaders(array $headers) {
        $this->headers = [];

        foreach ($headers as $header)
            $this->addHeader($header);
    }
    public function addHeader(\SoapHeader $header) {
        $this->headers[] = $header;

        return $this;
    }

    public function getIterator() {
        return new \ArrayIterator($this->params);
    }

    public function offsetExists($offset) {
        return isset($this->params[$offset]);
    }

    public function &offsetGet($offset) {
        return $this->params[$offset];
    }

    public function offsetSet($offset, $value) {
        return $this->addParam($offset, $value);
    }

    public function offsetUnset($offset) {
        unset($this->params[$offset]);
    }
}
