<?php
namespace AAVVStrapp\ApiBundle\Entity;

class Location extends BaseEntity
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $location_code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $additional_information;

    /**
     * @var \DateTime
     */
    protected $last_update;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $origins_travel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $destinies_travel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->origins_travel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->destinies_travel = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set locationCode
     *
     * @param string $locationCode
     *
     * @return Location
     */
    public function setLocationCode($locationCode)
    {
        $this->location_code = $locationCode;

        return $this;
    }

    /**
     * Get locationCode
     *
     * @return string
     */
    public function getLocationCode()
    {
        return $this->location_code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Location
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
     * Set additionalInformation
     *
     * @param string $additionalInformation
     *
     * @return Location
     */
    public function setAdditionalInformation($additionalInformation)
    {
        $this->additional_information = $additionalInformation;

        return $this;
    }

    /**
     * Get additionalInformation
     *
     * @return string
     */
    public function getAdditionalInformation()
    {
        return $this->additional_information;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Location
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->last_update = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Location
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Add originsTravel
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Travel $originsTravel
     *
     * @return Location
     */
    public function addOriginsTravel(\AAVVStrapp\ApiBundle\Entity\Travel $originsTravel)
    {
        $this->origins_travel[] = $originsTravel;

        return $this;
    }

    /**
     * Remove originsTravel
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Travel $originsTravel
     */
    public function removeOriginsTravel(\AAVVStrapp\ApiBundle\Entity\Travel $originsTravel)
    {
        $this->origins_travel->removeElement($originsTravel);
    }

    /**
     * Get originsTravel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOriginsTravel()
    {
        return $this->origins_travel;
    }

    /**
     * Add destiniesTravel
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Travel $destiniesTravel
     *
     * @return Location
     */
    public function addDestiniesTravel(\AAVVStrapp\ApiBundle\Entity\Travel $destiniesTravel)
    {
        $this->destinies_travel[] = $destiniesTravel;

        return $this;
    }

    /**
     * Remove destiniesTravel
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Travel $destiniesTravel
     */
    public function removeDestiniesTravel(\AAVVStrapp\ApiBundle\Entity\Travel $destiniesTravel)
    {
        $this->destinies_travel->removeElement($destiniesTravel);
    }

    /**
     * Get destiniesTravel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDestiniesTravel()
    {
        return $this->destinies_travel;
    }
}
