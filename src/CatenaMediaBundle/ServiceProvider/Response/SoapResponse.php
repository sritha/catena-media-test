<?php
namespace CatenaMediaBundle\ServiceProvider\Response;

/**
 * Class XMLResponse
 *
 * @package CatenaMediaBundle\ServiceProvider\Response
 */
abstract class SoapResponse extends ServiceProviderResponse {
	public function __construct(\stdClass $soapObject) {
        parent::__construct((array)$soapObject);
	}

    public function getResponseRootElement() {
        $response = $this->getResponse();

        return reset($response);
    }

	public function __toString() {
		return json_encode($this->getResponse());
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
