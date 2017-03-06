<?php
namespace AAVVStrapp\ApiBundle\Entity;

class Travel extends BaseEntity
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $travel_code;

    /**
     * @var integer
     */
    protected $number_places;

    /**
     * @var string
     */
    protected $travel_date;

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
     * @var \AAVVStrapp\ApiBundle\Entity\Location
     */
    protected $origin_location;

    /**
     * @var \AAVVStrapp\ApiBundle\Entity\Location
     */
    protected $destiny_location;

    /**
     * @var \AAVVStrapp\ApiBundle\Entity\UserProfile
     */
    protected $user_profile;


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
     * Set travelCode
     *
     * @param string $travelCode
     *
     * @return Travel
     */
    public function setTravelCode($travelCode)
    {
        $this->travel_code = $travelCode;

        return $this;
    }

    /**
     * Get travelCode
     *
     * @return string
     */
    public function getTravelCode()
    {
        return $this->travel_code;
    }

    /**
     * Set numberPlaces
     *
     * @param integer $numberPlaces
     *
     * @return Travel
     */
    public function setNumberPlaces($numberPlaces)
    {
        $this->number_places = $numberPlaces;

        return $this;
    }

    /**
     * Get numberPlaces
     *
     * @return integer
     */
    public function getNumberPlaces()
    {
        return $this->number_places;
    }

    /**
     * Set travelDate
     *
     * @param string $travelDate
     *
     * @return Travel
     */
    public function setTravelDate($travelDate)
    {
        $this->travel_date = $travelDate;

        return $this;
    }

    /**
     * Get travelDate
     *
     * @return string
     */
    public function getTravelDate()
    {
        return $this->travel_date;
    }

    /**
     * Set additionalInformation
     *
     * @param string $additionalInformation
     *
     * @return Travel
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
     * @return Travel
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
     * @return Travel
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
     * Set originLocation
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Location $originLocation
     *
     * @return Travel
     */
    public function setOriginLocation(\AAVVStrapp\ApiBundle\Entity\Location $originLocation = null)
    {
        $this->origin_location = $originLocation;

        return $this;
    }

    /**
     * Get originLocation
     *
     * @return \AAVVStrapp\ApiBundle\Entity\Location
     */
    public function getOriginLocation()
    {
        return $this->origin_location;
    }

    /**
     * Set destinyLocation
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Location $destinyLocation
     *
     * @return Travel
     */
    public function setDestinyLocation(\AAVVStrapp\ApiBundle\Entity\Location $destinyLocation = null)
    {
        $this->destiny_location = $destinyLocation;

        return $this;
    }

    /**
     * Get destinyLocation
     *
     * @return \AAVVStrapp\ApiBundle\Entity\Location
     */
    public function getDestinyLocation()
    {
        return $this->destiny_location;
    }

    /**
     * Set userProfile
     *
     * @param \AAVVStrapp\ApiBundle\Entity\UserProfile $userProfile
     *
     * @return Travel
     */
    public function setUserProfile(\AAVVStrapp\ApiBundle\Entity\UserProfile $userProfile = null)
    {
        $this->user_profile = $userProfile;

        return $this;
    }

    /**
     * Get userProfile
     *
     * @return \AAVVStrapp\ApiBundle\Entity\UserProfile
     */
    public function getUserProfile()
    {
        return $this->user_profile;
    }
}
