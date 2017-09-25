<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 0:19
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserContentSourceGroupsRepository")
 * @ORM\Table(name="user_content_source")
 */
class UserContentSourceGroups
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // For global user
    /**
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private $user;

    // Social network name
    /**
     * @ORM\ManyToOne(targetEntity="SocialNetworks")
     * @ORM\JoinColumn(name="social_network", referencedColumnName="id", nullable=false)
     */
    private $social_network;

    // social network link to source of post
    /**
     * @ORM\Column(type="string")
     */
    private $link;

    // social network id for group
    /**
     * @ORM\Column(type="string")
     */
    private $social_id;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getSocialNetwork()
    {
        return $this->social_network;
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
    public function getSocialId()
    {
        return $this->social_id;
    }

    /**
     * @param mixed SocialAccounts $user
     */
    public function setUser(SocialAccounts $user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed SocialNetworks $social_network
     */
    public function setSocialNetwork(SocialNetworks $social_network)
    {
        $this->social_network = $social_network;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param mixed $social_id
     */
    public function setSocialId($social_id)
    {
        $this->social_id = $social_id;
    }


}