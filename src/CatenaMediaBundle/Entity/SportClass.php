<?php

namespace CatenaMediaBundle\Entity;

/**
 * SportClass
 */
class SportClass
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $provider;

    /**
     * @var \DateTime
     */
    private $maxrepdate;

    /**
     * @var \DateTime
     */
    private $maxreptime;


    /**
     * @param int $id
     *
     * @return SportClass
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return SportClass
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set provider
     *
     * @param string $provider
     *
     * @return SportClass
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * Get provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set maxrepdate
     *
     * @param \DateTime $maxrepdate
     *
     * @return SportClass
     */
    public function setMaxrepdate($maxrepdate)
    {
        $this->maxrepdate = $maxrepdate;

        return $this;
    }

    /**
     * Get maxrepdate
     *
     * @return \DateTime
     */
    public function getMaxrepdate()
    {
        return $this->maxrepdate;
    }

    /**
     * Set maxreptime
     *
     * @param \DateTime $maxreptime
     *
     * @return SportClass
     */
    public function setMaxreptime($maxreptime)
    {
        $this->maxreptime = $maxreptime;

        return $this;
    }

    /**
     * Get maxreptime
     *
     * @return \DateTime
     */
    public function getMaxreptime()
    {
        return $this->maxreptime;
    }
}

