<?php

namespace Events\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=true)
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
     * @ORM\ManyToMany(targetEntity="Events\UserBundle\Entity\Preference", inversedBy="users")
     * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="users_preferences",
     *  joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="preference_id", referencedColumnName="id")}
     * )
    */
    private $preferences;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_account", type="string", length=255, nullable=true)
     */
    private $facebookAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_account", type="string", length=255, nullable=true)
     */
    private $twitterAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="google_plus_account", type="string", length=255, nullable=true)
     */
    private $google_plusAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="microsoft_account", type="string", length=255, nullable=true)
     */
    private $microsoftAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="linked_in_account", type="string", length=255, nullable=true)
     */
    private $linkedInAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube_account", type="string", length=255, nullable=true)
     */
    private $youtubeAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram_account", type="string", length=255, nullable=true)
     */
    private $instagramAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="flickr_account", type="string", length=255, nullable=true)
     */
    private $flickrAccount;

    /**
     * @var string
     *
     * @ORM\Column(name="pinterest_account", type="string", length=255, nullable=true)
     */
    private $pinterestAccount;



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

    public function __construct()
    {
        $this->preferences = new ArrayCollection();
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     * @internal param $User $
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
     * Set facebookAccount
     *
     * @param $facebookAccount
     * @return Profile
     * @internal param $facebookAccounts
     */
    public function setFacebookAccount($facebookAccount)
    {
        $this->facebookAccount = $facebookAccount;

        return $this;
    }

    /**
     * Get facebookAccount
     *
     * @return string
     */
    public function getFacebookAccount()
    {
        return $this->facebookAccount;
    }


    /**
     * @param $twitterAccount
     * @return $this
     * @internal param $twitterAccounts
     */
    public function setTwitterAccount($twitterAccount)
    {
        $this->twitterAccount = $twitterAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getTwitterAccount()
    {
        return $this->twitterAccount;
    }


    /**
     * @param $microsoftAccount
     * @return $this
     */
    public function setMicrosoftAccount($microsoftAccount)
    {
        $this->microsoftAccount = $microsoftAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getMicrosoftAccount()
    {
        return $this->microsoftAccount;
    }


    /**
     * @param $googleAccount
     * @return $this
     */
    public function setGooglePlusAccount($googleAccount)
    {
        $this->google_plusAccount = $googleAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getGooglePlusAccount()
    {
        return $this->google_plusAccount;
    }

    /**
     * @param $linkedInAccount
     * @return $this
     */
    public function setLinkedInAccount($linkedInAccount)
    {
        $this->linkedInAccount = $linkedInAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getLinkedInAccount()
    {
        return $this->linkedInAccount;
    }

    /**
     * @param $youtubeAccount
     * @return $this
     */
    public function setYouTubeAccount($youtubeAccount)
    {
        $this->youtubeAccount = $youtubeAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getYouTubeAccount()
    {
        return $this->youtubeAccount;
    }

    /**
     * @param $instagramAccount
     * @return $this
     */
    public function setInstagramAccount($instagramAccount)
    {
        $this->instagramAccount = $instagramAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getInstagramAccount()
    {
        return $this->instagramAccount;
    }

    /**
     * @param $flickrAccount
     * @return $this
     */
    public function setFlickrAccount($flickrAccount)
    {
        $this->flickrAccount = $flickrAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getFlickrAccount()
    {
        return $this->flickrAccount;
    }

    /**
     * @param $pinterestAccount
     * @return $this
     */
    public function setPinterestAccount($pinterestAccount)
    {
        $this->pinterestAccount = $pinterestAccount;

        return $this;
    }


    /**
     * @return string
     */
    public function getPinterestAccount()
    {
        return $this->pinterestAccount;
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

    public function __toString()
    {
        $displayName = null;
        if ($this->middleName == null) {
            $displayName = $this->firstName.' '.$this->lastName;
        }
        else
            $displayName = $this->firstName.' '.$this->middleName.' '.$this->lastName;

        return $displayName;
    }
    //TODO: Check how can I use the X-Maps API
    //TODO: Make an entity to handle the certs, location, valuation_details, and the valuations in general (ManyToOne to all of these.)
}
