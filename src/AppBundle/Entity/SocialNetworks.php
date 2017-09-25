<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 021 21.09.17
 * Time: 23:52
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SocialNetworksRepository")
 * @ORM\Table(name="social_networks")
 */
class SocialNetworks
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // Social network shortcode
    /**
     * @ORM\Column(type="string")
     */
    private $soc_net_name;

    // Link
    /**
     * @ORM\Column(type="string")
     */
    private $link;

    /**
     * @ORM\Column(type="string")
     */
    private $auth_url_path;

    /**
     * @ORM\Column(type="string")
     */
    private $api_url;

    /**
     * @ORM\Column(type="string")
     */
    private $token_url_path;

    /**
     * @ORM\Column(type="integer")
     */
    private $application_id;

    /**
     * @ORM\Column(type="string")
     */
    private $application_secret;

    // Is available feature?
    /**
     * @ORM\Column(type="boolean")
     */
    private $is_available;

    // Methods
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSocnetName()
    {
        return $this->soc_net_name;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getAuthUrlPath()
    {
        return $this->auth_url_path;
    }

    /**
     * @return mixed
     */
    public function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * @return mixed
     */
    public function getTokenUrlPath()
    {
        return $this->token_url_path;
    }

    /**
     * @return mixed
     */
    public function getApplicationId()
    {
        return $this->application_id;
    }

    /**
     * @return mixed
     */
    public function getApplicationSecret()
    {
        return $this->application_secret;
    }


    /**
     * @return boolean
     */
    public function getisAvailable()
    {
        return $this->is_available;
    }

    /**
     * @param mixed $soc_net_name
     */
    public function setSocnetName($soc_net_name)
    {
        $this->soc_net_name = $soc_net_name;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param mixed $auth_url_path
     */
    public function setAuthUrlPath($auth_url_path)
    {
        $this->auth_url_path = $auth_url_path;
    }

    /**
     * @param mixed $api_url
     */
    public function setApiUrl($api_url)
    {
        $this->api_url = $api_url;
    }

    /**
     * @param mixed $token_url_path
     */
    public function setTokenUrlPath($token_url_path)
    {
        $this->token_url_path = $token_url_path;
    }

    /**
     * @param mixed $application_id
     */
    public function setApplicationId($application_id)
    {
        $this->application_id = $application_id;
    }

    /**
     * @param mixed $application_secret
     */
    public function setApplicationSecret($application_secret)
    {
        $this->application_secret = $application_secret;
    }

    /**
     * @param mixed $is_available
     */
    public function setIsAvailable($is_available)
    {
        $this->is_available = $is_available;
    }
}