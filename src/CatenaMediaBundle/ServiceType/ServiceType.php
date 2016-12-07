<?php

namespace CatenaMediaBundle\ServiceType;

use CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderException;

/**
 * Class ServiceType
 *
 * @package CatenaMediaBundle\ServiceType
 */
class ServiceType
{
    protected $name;

    const CACHE_PRICE_FEED = 'cachePriceFeed';
    const PRICE_FEED = 'priceFeed';


    public static $TYPES = array(
        self::CACHE_PRICE_FEED    => 1,
        self::PRICE_FEED     => 2
    );

    public function __construct($name)
    {
        if (!isset(static::$TYPES[$name])) {
            throw new ServiceProviderException("No such type name: $name");
        }

        $this->name = $name;
    }

    public static function fromId($id)
    {
        return new static(array_flip(static::$TYPES)[$id]);
    }

    public function __toString()
    {
        return "{$this->getName()}";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return self::$TYPES[$this->name];
    }
}
