<?php

namespace CatenaMediaBundle\Entity;

/**
 * SportType
 */
class SportType
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
    private $lastupdatedate;

    /**
     * @var \DateTime
     */
    private $lastupdatetime;

    /**
     * @var \CatenaMediaBundle\Entity\SportClass
     */
    private $classid;

    /**
     * @param int $id
     *
     * @return SportType
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
     * @return SportType
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
     * @return SportType
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
     * Set lastupdatedate
     *
     * @param \DateTime $lastupdatedate
     *
     * @return SportType
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
     * @return SportType
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
     * Set classid
     *
     * @param \CatenaMediaBundle\Entity\SportClass $classid
     *
     * @return SportType
     */
    public function setClassid(\CatenaMediaBundle\Entity\SportClass $classid = null)
    {
        $this->classid = $classid;

        return $this;
    }

    /**
     * Get classid
     *
     * @return \CatenaMediaBundle\Entity\SportClass
     */
    public function getClassid()
    {
        return $this->classid;
    }
}

