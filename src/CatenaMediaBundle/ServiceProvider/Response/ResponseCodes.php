<?php

namespace CatenaMediaBundle\ServiceProvider\Response;

/**
 * Class ResponseCodes
 *
 * @package CatenaMediaBundle\ServiceProvider\Response
 */
class ResponseCodes
{

    public static $CODES = array(
        404 => 'CRITICAL',
        400 => 'MEDIUM',
        300 => 'MINOR',
    );

}
