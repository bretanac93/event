<?php

namespace Events\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProfileRepository")
 */
class Profile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=255)
     */
    private $information;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="preferences", type="string", length=255)
     */
    private $preferences;

    /**
     * @var string
     *
     * @ORM\Column(name="social_accounts", type="string", length=255)
     */
    private $socialAccounts;

    /**
     * @var string
     *
     * @ORM\Column(name="valuation", type="string", length=255)
     */
    private $valuation;

    /**
     * @var string
     *
     * @ORM\Column(name="valuation_details", type="string", length=255)
     */
    private $valuationDetails;

    /**
     * @var string
     *
     * @ORM\Column(name="certifications", type="string", length=255)
     */
    private $certifications;

    /**
     * @ORM\OneToOne(targetEntity="Events\UserBundle\Entity\User", inversedBy="profile_details")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $
     */
    public function setUser(User $user)
    {
        $this->user = $user;
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
     * Set firstName
     *
     * @param string $firstName
     * @return Profile
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Profile
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return Profile
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set information
     *
     * @param string $information
     * @return Profile
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Profile
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set preferences
     *
     * @param string $preferences
     * @return Profile
     */
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Get preferences
     *
     * @return string
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * Set socialAccounts
     *
     * @param string $socialAccounts
     * @return Profile
     */
    public function setSocialAccounts($socialAccounts)
    {
        $this->socialAccounts = $socialAccounts;

        return $this;
    }

    /**
     * Get socialAccounts
     *
     * @return string
     */
    public function getSocialAccounts()
    {
        return $this->socialAccounts;
    }

    /**
     * Set valuation
     *
     * @param string $valuation
     * @return Profile
     */
    public function setValuation($valuation)
    {
        $this->valuation = $valuation;

        return $this;
    }

    /**
     * Get valuation
     *
     * @return string
     */
    public function getValuation()
    {
        return $this->valuation;
    }

    /**
     * Set valuationDetails
     *
     * @param string $valuationDetails
     * @return Profile
     */
    public function setValuationDetails($valuationDetails)
    {
        $this->valuationDetails = $valuationDetails;

        return $this;
    }

    /**
     * Get valuationDetails
     *
     * @return string
     */
    public function getValuationDetails()
    {
        return $this->valuationDetails;
    }

    /**
     * Set certifications
     *
     * @param string $certifications
     * @return Profile
     */
    public function setCertifications($certifications)
    {
        $this->certifications = $certifications;

        return $this;
    }

    /**
     * Get certifications
     *
     * @return string
     */
    public function getCertifications()
    {
        return $this->certifications;
    }
    //TODO: Check how can I use the X-Maps API
    //TODO: Make an entity to handle the certs, location, valuation_details, and the valuations in general (ManyToOne to all of these.)
}
