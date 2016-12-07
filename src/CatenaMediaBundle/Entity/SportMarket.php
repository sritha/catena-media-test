<?php

namespace CatenaMediaBundle\Entity;

/**
 * SportMarket
 */
class SportMarket
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
    private $url;

    /**
     * @var \DateTime
     */
    private $eventdate;

    /**
     * @var \DateTime
     */
    private $eventtime;

    /**
     * @var \DateTime
     */
    private $bettilldate;

    /**
     * @var \DateTime
     */
    private $bettilltime;

    /**
     * @var \DateTime
     */
    private $lastupdatedate;

    /**
     * @var \DateTime
     */
    private $lastupdatetime;

    /**
     * @var boolean
     */
    private $placeavailable = '0';

    /**
     * @var boolean
     */
    private $forcastavailable = '0';

    /**
     * @var boolean
     */
    private $tricastavailable = '0';

    /**
     * @var boolean
     */
    private $eachwayavailable = '0';

    /**
     * @var boolean
     */
    private $cashoutavailable = '0';

    /**
     * @var boolean
     */
    private $startingpriceavailable;

    /**
     * @var boolean
     */
    private $livepriceavailable;

    /**
     * @var boolean
     */
    private $guarenteedpriceavailable;

    /**
     * @var boolean
     */
    private $firstpriceavailable;

    /**
     * @var \CatenaMediaBundle\Entity\SportType
     */
    private $typeid;


    /**
     * @param int $id
     *
     * @return SportMarket
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
     * @return SportMarket
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
     * Set url
     *
     * @param string $url
     *
     * @return SportMarket
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set eventdate
     *
     * @param \DateTime $eventdate
     *
     * @return SportMarket
     */
    public function setEventdate($eventdate)
    {
        $this->eventdate = $eventdate;

        return $this;
    }

    /**
     * Get eventdate
     *
     * @return \DateTime
     */
    public function getEventdate()
    {
        return $this->eventdate;
    }

    /**
     * Set eventtime
     *
     * @param \DateTime $eventtime
     *
     * @return SportMarket
     */
    public function setEventtime($eventtime)
    {
        $this->eventtime = $eventtime;

        return $this;
    }

    /**
     * Get eventtime
     *
     * @return \DateTime
     */
    public function getEventtime()
    {
        return $this->eventtime;
    }

    /**
     * Set bettilldate
     *
     * @param \DateTime $bettilldate
     *
     * @return SportMarket
     */
    public function setBettilldate($bettilldate)
    {
        $this->bettilldate = $bettilldate;

        return $this;
    }

    /**
     * Get bettilldate
     *
     * @return \DateTime
     */
    public function getBettilldate()
    {
        return $this->bettilldate;
    }

    /**
     * Set bettilltime
     *
     * @param \DateTime $bettilltime
     *
     * @return SportMarket
     */
    public function setBettilltime($bettilltime)
    {
        $this->bettilltime = $bettilltime;

        return $this;
    }

    /**
     * Get bettilltime
     *
     * @return \DateTime
     */
    public function getBettilltime()
    {
        return $this->bettilltime;
    }

    /**
     * Set lastupdatedate
     *
     * @param \DateTime $lastupdatedate
     *
     * @return SportMarket
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
     * @return SportMarket
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
     * Set placeavailable
     *
     * @param boolean $placeavailable
     *
     * @return SportMarket
     */
    public function setPlaceavailable($placeavailable)
    {
        $this->placeavailable = $placeavailable;

        return $this;
    }

    /**
     * Get placeavailable
     *
     * @return boolean
     */
    public function getPlaceavailable()
    {
        return $this->placeavailable;
    }

    /**
     * Set forcastavailable
     *
     * @param boolean $forcastavailable
     *
     * @return SportMarket
     */
    public function setForcastavailable($forcastavailable)
    {
        $this->forcastavailable = $forcastavailable;

        return $this;
    }

    /**
     * Get forcastavailable
     *
     * @return boolean
     */
    public function getForcastavailable()
    {
        return $this->forcastavailable;
    }

    /**
     * Set tricastavailable
     *
     * @param boolean $tricastavailable
     *
     * @return SportMarket
     */
    public function setTricastavailable($tricastavailable)
    {
        $this->tricastavailable = $tricastavailable;

        return $this;
    }

    /**
     * Get tricastavailable
     *
     * @return boolean
     */
    public function getTricastavailable()
    {
        return $this->tricastavailable;
    }

    /**
     * Set eachwayavailable
     *
     * @param boolean $eachwayavailable
     *
     * @return SportMarket
     */
    public function setEachwayavailable($eachwayavailable)
    {
        $this->eachwayavailable = $eachwayavailable;

        return $this;
    }

    /**
     * Get eachwayavailable
     *
     * @return boolean
     */
    public function getEachwayavailable()
    {
        return $this->eachwayavailable;
    }

    /**
     * Set cashoutavailable
     *
     * @param boolean $cashoutavailable
     *
     * @return SportMarket
     */
    public function setCashoutavailable($cashoutavailable)
    {
        $this->cashoutavailable = $cashoutavailable;

        return $this;
    }

    /**
     * Get cashoutavailable
     *
     * @return boolean
     */
    public function getCashoutavailable()
    {
        return $this->cashoutavailable;
    }

    /**
     * Set startingpriceavailable
     *
     * @param boolean $startingpriceavailable
     *
     * @return SportMarket
     */
    public function setStartingpriceavailable($startingpriceavailable)
    {
        $this->startingpriceavailable = $startingpriceavailable;

        return $this;
    }

    /**
     * Get startingpriceavailable
     *
     * @return boolean
     */
    public function getStartingpriceavailable()
    {
        return $this->startingpriceavailable;
    }

    /**
     * Set livepriceavailable
     *
     * @param boolean $livepriceavailable
     *
     * @return SportMarket
     */
    public function setLivepriceavailable($livepriceavailable)
    {
        $this->livepriceavailable = $livepriceavailable;

        return $this;
    }

    /**
     * Get livepriceavailable
     *
     * @return boolean
     */
    public function getLivepriceavailable()
    {
        return $this->livepriceavailable;
    }

    /**
     * Set guarenteedpriceavailable
     *
     * @param boolean $guarenteedpriceavailable
     *
     * @return SportMarket
     */
    public function setGuarenteedpriceavailable($guarenteedpriceavailable)
    {
        $this->guarenteedpriceavailable = $guarenteedpriceavailable;

        return $this;
    }

    /**
     * Get guarenteedpriceavailable
     *
     * @return boolean
     */
    public function getGuarenteedpriceavailable()
    {
        return $this->guarenteedpriceavailable;
    }

    /**
     * Set firstpriceavailable
     *
     * @param boolean $firstpriceavailable
     *
     * @return SportMarket
     */
    public function setFirstpriceavailable($firstpriceavailable)
    {
        $this->firstpriceavailable = $firstpriceavailable;

        return $this;
    }

    /**
     * Get firstpriceavailable
     *
     * @return boolean
     */
    public function getFirstpriceavailable()
    {
        return $this->firstpriceavailable;
    }

    /**
     * Set typeid
     *
     * @param \CatenaMediaBundle\Entity\SportType $typeid
     *
     * @return SportMarket
     */
    public function setTypeid(\CatenaMediaBundle\Entity\SportType $typeid = null)
    {
        $this->typeid = $typeid;

        return $this;
    }

    /**
     * Get typeid
     *
     * @return \CatenaMediaBundle\Entity\SportType
     */
    public function getTypeid()
    {
        return $this->typeid;
    }
}

