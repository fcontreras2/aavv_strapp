<?php
namespace AAVVStrapp\Core\Domain;

class UserProfile
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $full_name;

    /**
     * @var string
     */
    private $identity_card;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var \DateTime
     */
    private $last_update;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $travels;

    /**
     * @var \AAVVStrapp\Core\Domain\UserProfile
     */
    private $user_profile;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->travels = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set fullName
     *
     * @param string $fullName
     *
     * @return UserProfile
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * Set identityCard
     *
     * @param string $identityCard
     *
     * @return UserProfile
     */
    public function setIdentityCard($identityCard)
    {
        $this->identity_card = $identityCard;

        return $this;
    }

    /**
     * Get identityCard
     *
     * @return string
     */
    public function getIdentityCard()
    {
        return $this->identity_card;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return UserProfile
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return UserProfile
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return UserProfile
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
     * @return UserProfile
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
     * Add travel
     *
     * @param \AAVVStrap\Core\Domain\Travel $travel
     *
     * @return UserProfile
     */
    public function addTravel(\AAVVStrap\Core\Domain\Travel $travel)
    {
        $this->travels[] = $travel;

        return $this;
    }

    /**
     * Remove travel
     *
     * @param \AAVVStrap\Core\Domain\Travel $travel
     */
    public function removeTravel(\AAVVStrap\Core\Domain\Travel $travel)
    {
        $this->travels->removeElement($travel);
    }

    /**
     * Get travels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTravels()
    {
        return $this->travels;
    }

    /**
     * Set userProfile
     *
     * @param \AAVVStrapp\Core\Domain\UserProfile $userProfile
     *
     * @return UserProfile
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
