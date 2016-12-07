<?php

namespace CatenaMediaBundle\Entity;

/**
 * Participant
 */
class Participant
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
    private $odds;

    /**
     * @var string
     */
    private $oddsdecimal;

    /**
     * @var \DateTime
     */
    private $lastupdatedate;

    /**
     * @var \DateTime
     */
    private $lastupdatetime;

    /**
     * @var string
     */
    private $handicap;

    /**
     * @var \CatenaMediaBundle\Entity\SportMarket
     */
    private $marketid;


    /**
     * @param int $id
     *
     * @return Participant
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
     * @return Participant
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
     * Set odds
     *
     * @param string $odds
     *
     * @return Participant
     */
    public function setOdds($odds)
    {
        $this->odds = $odds;

        return $this;
    }

    /**
     * Get odds
     *
     * @return string
     */
    public function getOdds()
    {
        return $this->odds;
    }

    /**
     * Set oddsdecimal
     *
     * @param string $oddsdecimal
     *
     * @return Participant
     */
    public function setOddsdecimal($oddsdecimal)
    {
        $this->oddsdecimal = $oddsdecimal;

        return $this;
    }

    /**
     * Get oddsdecimal
     *
     * @return string
     */
    public function getOddsdecimal()
    {
        return $this->oddsdecimal;
    }

    /**
     * Set lastupdatedate
     *
     * @param \DateTime $lastupdatedate
     *
     * @return Participant
     */
    public function setLastupdatedate($lastupdatedate)
    {
        $this->lastupdatedate = $lastupdatedate;

        return $this;
    }

    /**
     * Get lastupdatedate
     *
     * @return \DateTime
     */
    public function getLastupdatedate()
    {
        return $this->lastupdatedate;
    }

    /**
     * Set lastupdatetime
     *
     * @param \DateTime $lastupdatetime
     *
     * @return Participant
     */
    public function setLastupdatetime($lastupdatetime)
    {
        $this->lastupdatetime = $lastupdatetime;

        return $this;
    }

    /**
     * Get lastupdatetime
     *
     * @return \DateTime
     */
    public function getLastupdatetime()
    {
        return $this->lastupdatetime;
    }

    /**
     * Set handicap
     *
     * @param string $handicap
     *
     * @return Participant
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;

        return $this;
    }

    /**
     * Get handicap
     *
     * @return string
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * Set marketid
     *
     * @param \CatenaMediaBundle\Entity\SportMarket $marketid
     *
     * @return Participant
     */
    public function setMarketid(\CatenaMediaBundle\Entity\SportMarket $marketid = null)
    {
        $this->marketid = $marketid;

        return $this;
    }

    /**
     * Get marketid
     *
     * @return \CatenaMediaBundle\Entity\SportMarket
     */
    public function getMarketid()
    {
        return $this->marketid;
    }
}

