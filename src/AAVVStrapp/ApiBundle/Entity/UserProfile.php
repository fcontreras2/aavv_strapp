<?php
namespace AAVVStrapp\ApiBundle\Entity;

/**
 * Class UserProfile
 *
 * Clase hace referencia a los usuarios del sistema
 * los cuales tiene un conjunto de viajes asociados
 *
 * @package AAVVStrapp\ApiBundle\Entity
 */
class UserProfile extends BaseEntity
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * Nombre del usuario
     *
     * @var string
     */
    protected $full_name;

    /**
     * Cedula de identidad
     *
     * @var string
     */
    protected $identity_card;

    /**
     * Dirección
     *
     * @var string
     */
    protected $address;

    /**
     * Teléfono
     *
     * @var string
     */
    protected $phone;

    /**
     * Ultima actualización
     *
     * @var \DateTime
     */
    protected $last_update;

    /**
     * Fecha de creación
     *
     * @var \DateTime
     */
    protected $created;

    /**
     * Viajes del usuario
     *
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $travels;

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
     * @param \AAVVStrapp\ApiBundle\Entity\Travel $travel
     *
     * @return UserProfile
     */
    public function addTravel(\AAVVStrapp\ApiBundle\Entity\Travel $travel)
    {
        $this->travels[] = $travel;

        return $this;
    }

    /**
     * Remove travel
     *
     * @param \AAVVStrapp\ApiBundle\Entity\Travel $travel
     */
    public function removeTravel(\AAVVStrapp\ApiBundle\Entity\Travel $travel)
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
}
