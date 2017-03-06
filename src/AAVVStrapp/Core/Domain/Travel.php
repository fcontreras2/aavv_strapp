<?php
namespace AAVVStrapp\Core\Domain;

class Travel
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $travel_code;

    /**
     * @var integer
     */
    private $number_places;

    /**
     * @var string
     */
    private $travel_date;

    /**
     * @var string
     */
    private $additional_information;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \AAVVStrapp\Core\Domain\Location
     */
    private $origin_location;

    /**
     * @var \AAVVStrapp\Core\Domain\Location
     */
    private $destiny_location;

    /**
     * @var \AAVVStrapp\Core\Domain\UserProfile
     */
    private $user_profile;


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
     * @param \AAVVStrapp\Core\Domain\Location $originLocation
     *
     * @return Travel
     */
    public function setOriginLocation(\AAVVStrapp\Core\Domain\Location $originLocation = null)
    {
        $this->origin_location = $originLocation;

        return $this;
    }

    /**
     * Get originLocation
     *
     * @return \AAVVStrapp\Core\Domain\Location
     */
    public function getOriginLocation()
    {
        return $this->origin_location;
    }

    /**
     * Set destinyLocation
     *
     * @param \AAVVStrapp\Core\Domain\Location $destinyLocation
     *
     * @return Travel
     */
    public function setDestinyLocation(\AAVVStrapp\Core\Domain\Location $destinyLocation = null)
    {
        $this->destiny_location = $destinyLocation;

        return $this;
    }

    /**
     * Get destinyLocation
     *
     * @return \AAVVStrapp\Core\Domain\Location
     */
    public function getDestinyLocation()
    {
        return $this->destiny_location;
    }

    /**
     * Set userProfile
     *
     * @param \AAVVStrapp\Core\Domain\UserProfile $userProfile
     *
     * @return Travel
     */
    public function setUserProfile(\AAVVStrapp\Core\Domain\UserProfile $userProfile = null)
    {
        $this->user_profile = $userProfile;

        return $this;
    }

    /**
     * Get userProfile
     *
     * @return \AAVVStrapp\Core\Domain\UserProfile
     */
    public function getUserProfile()
    {
        return $this->user_profile;
    }
}