<?php
namespace CatenaMediaBundle\ServiceProvider\Response;


/**
 * Class ServiceProviderResponse
 *
 * @package CatenaMediaBundle\ServiceProvider\Response
 */
class ServiceProviderResponse
{

    const
        CODE_OK               = 1,
        CODE_PARTIALLY_OK     = 2,
        CODE_ERROR_VALIDATION = 9,
        CODE_ERROR_FAIL       = 10,
        CODE_ERROR_SERVICE    = 11
    ;

    const
        ERROR_NO_RESULTS = 'no results due to system error'
    ;

    private $response;

    private
        $errors = [],

        $warnings = [],

        $code
    ;


    /**
     * Class constructor
     *
     * @param array $response
     * @param int $code
     */
    public function __construct($response = [], $code = self::CODE_OK)
    {
        $this->response = $response;

        $this->code = $code;
    }

    public function setResponse(array $response = []) {
        $this->response = $response;
    }

    public function getResponse() {
        return $this->response;
    }


    public function hasErrors() {
        return !!count($this->getErrors());
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addError($error, $code = null) {
        $code === null && ($this->errors[] = $error) || ($this->errors[$code] = $error);

        return $this;
    }

    public function hasWarnings() {
        return !!count($this->getWarnings());
    }

    public function getWarnings() {
        return $this->warnings;
    }

    public function addWarning($warning, $code = null) {
        $code === null && ($this->warnings[] = $warning) || ($this->warnings[$code] = $warning);

        return $this;
    }

    public function getStatusCode() {
        if ($this->hasErrors()) {
            return self::CODE_ERROR_SERVICE;
        }

        return $this->code;
    }


    public function parse()
    {
        // Child classes may override this.
    }
}
