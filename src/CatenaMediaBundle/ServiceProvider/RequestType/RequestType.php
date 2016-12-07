<?php

namespace CatenaMediaBundle\ServiceProvider\RequestType;

use CatenaMediaBundle\ServiceProvider\Exception\ServiceProviderException;

/**
 * Class RequestType
 *
 * @package CatenaMediaBundle\ServiceProvider\RequestType
 */
class RequestType
{

    /**
     * Stores a Request Type name
     *
     * @var string
     */
    protected $name;

    /**
     * Request Types constants
     */
    const
        HIERARCHY_BY_MARKET_TYPE  = 'getHierarchyByMarketType',
        EXAMPLE_OP1               = 'example1'
    ;

    /**
     * Request Types list
     *
     * @var array
     */
    protected static $TYPES = [
        self::HIERARCHY_BY_MARKET_TYPE  => 1,
        self::EXAMPLE_OP1               => 2
    ];

    /**
     * Class constructor
     *
     * @param string $name
     */
    public function __construct($name)
    {
        if (!isset(static::$TYPES[$name])) {
            throw new ServiceProviderException("Invalid or no Request Type found: $name");
        }

        $this->name = $name;
    }

    /**
     * Returns a Request Type name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns a Request Type id
     *
     * @return int
     */
    public function getId()
    {
        return self::$TYPES[$this->name];
    }

    /**
     * Returns a Request Types list
     *
     * @return array
     */
    public static function getTypes()
    {
        return static::$TYPES;
    }

    public function __toString()
    {
        return "{$this->getName()}";
    }

}
