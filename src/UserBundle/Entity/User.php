<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "vendor" = "Vendor", "member" = "Member"})
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="first_name", type="text", nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="text", nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="address_1", type="string", length=100, nullable=true)
     */
    protected $streetAddress;

    /**
     * @ORM\Column(name="address_2", type="string", length=100, nullable=true)
     */
    protected $address2;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $state;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $zipCode;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=14, nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(name="facebook", type="string", length=512, nullable=true)
     */
    protected $facebook;

    /**
     * @ORM\Column(name="twitter", type="string", length=512, nullable=true)
     */
    protected $twitter;

    /**
     * @ORM\Column(name="googleplus", type="string", length=512, nullable=true)
     */
    protected $googleplus;

    /**
     * @ORM\Column(name="instagram", type="string", length=512, nullable=true)
     */
    protected $instagram;

    /**
     * @ORM\Column(name="linkedin", type="string", length=512, nullable=true)
     */
    protected $linkedin;

    /**
     * @ORM\Column(name="pinterest", type="string", length=512, nullable=true)
     */
    protected $pinterest;


    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;

    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;

    /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
    protected $google_id;

    /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
    protected $google_access_token;

    /** @ORM\Column(name="linkedin_id", type="string", length=255, nullable=true) */
    protected $linkedin_id;

    /** @ORM\Column(name="linkedin_access_token", type="string", length=255, nullable=true) */
    protected $linkedin_access_token;

    /** @ORM\Column(name="twitter_id", type="string", length=255, nullable=true) */
    protected $twitter_id;

    /** @ORM\Column(name="twitter_access_token", type="string", length=255, nullable=true) */
    protected $twitter_access_token;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $lastName
     *
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $streetAddress
     *
     * @return $this
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param mixed $address2
     *
     * @return $this
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $zipCode
     *
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return mixed
     */
    public function getGoogleplus()
    {
        return $this->googleplus;
    }

    /**
     * @param mixed $googleplus
     */
    public function setGoogleplus($googleplus)
    {
        $this->googleplus = $googleplus;
    }

    /**
     * @return mixed
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * @param mixed $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @return mixed
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @param mixed $linkedin
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    /**
     * @return mixed
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

    /**
     * @param mixed $pinterest
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;
    }


    /**
     * @return mixed
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param mixed $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }


    /**
     * Set name.
     *
     * @param string $name
     *
     * @return \UserBundle\Entity\User
     */
    public function setName($name)
    {
        $spltName = explode(' ', $name);
        $this->firstName = (isset($spltName[0])) ? array_shift($spltName) : null;
        $this->lastName = (count($spltName) > 0) ? implode(' ', $spltName) : null;

        return $this;
    }

    public function getName()
    {
        return (isset($this->firstName) || isset($this->lastName)) ? "{$this->firstName}  {$this->lastName}" : '';
    }

    public function __toString()
    {
        try {
            return (string)$this->firstName . ' ' . $this->lastName;
        } catch (Exception $exception) {
            return '';
        }
    }


    public function setSocialProfiles($profiles)
    {
        foreach ($profiles as $profile) {
            switch ($profile['typeId']) {
                case 'facebook' :
                    $this->setFacebook($profile['username']);
                    break;
                case 'twitter':
                    $this->setTwitter($profile['username']);
                    break;
                case 'googleplus':
                case 'googleprofile':
                    $this->setGoogleplus($profile['username']);
                    break;
                case 'instagram':
                    $this->setInstagram($profile['username']);
                    break;
                case 'linkedin':
                    $this->setLinkedin($profile['username']);
                    break;
            }
        }
    }

    /**
     * Get fullname.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
