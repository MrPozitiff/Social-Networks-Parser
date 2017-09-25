<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 021 21.09.17
 * Time: 22:25
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SocialAccountsRepository")
 * @ORM\Table(name="accounts")
 */
// Social Networks settings
class SocialAccounts
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // We can hold many accounts with one logged user so it will been useful in a future
    /**
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="accounts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $username;

    // id of social network: Vk, Fb etc
    /**
     * @ORM\ManyToOne(targetEntity="SocialNetworks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $soc_net_name;

    // username or user_id in some social network
    /**
     * @ORM\Column(type="string")
     */
    private $soc_net_user_id;

    // Ich account can be named by different names or it is different peoples
    /**
     * @ORM\Column(type="string")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string")
     */
    private $last_name;

    // For the future we can add user photo to site profile
    /**
     * @ORM\Column(type="string")
     */
    private $image;

    // Last successful user token if expired - refresh it
    /**
     * @ORM\Column(type="string")
     */
    private $token;

    // for every user we can hold some extra information from social network
    /**
     * @ORM\Column(type="string")
     */
    private $rules;

    // When it has added to current user
    /** @ORM\Column(type="datetime", name="added_at") */
    private $added_at;



    // Methods
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getSocNetName()
    {
        return $this->soc_net_name;
    }

    /**
     * @return string
     */
    public function getSocNetUserId()
    {
        return $this->soc_net_user_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @return mixed
     */
    public function getAddedAt()
    {
        return $this->added_at;
    }

    /**
     * @param mixed $username
     */
    public function setUsername(Users $username)
    {
        $this->username = $username;
    }

    /**
     * @param mixed $soc_net_name
     */
    public function setSocNetName(SocialNetworks $soc_net_name)
    {
        $this->soc_net_name = $soc_net_name;
    }

    /**
     * @param mixed $soc_net_user_id
     */
    public function setSocNetUserId($soc_net_user_id)
    {
        $this->soc_net_user_id = $soc_net_user_id;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @param mixed $rules
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param mixed $added_at
     */
    public function setAddedAt($added_at)
    {
        $this->added_at = $added_at;
    }

}