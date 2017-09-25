<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 0:56
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostStorageRepository")
 * @ORM\Table(name="post_storage")
 */
class PostStorage
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // Social network name
    /**
     * @ORM\ManyToOne(targetEntity="SocialNetworks")
     * @ORM\JoinColumn(name="social_network", referencedColumnName="id", nullable=false)
     */
    private $social_network;

    // social network link to source of post
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $link;

    // post id in social network
    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $social_post_id;

    // Saved state at the time of adding to favorites
    /**
     * @ORM\Column(type="string")
     */
    private $text;

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
    public function getSocialNetwork()
    {
        return $this->social_network;
    }

    /**
     * @param mixed $social_network
     */
    public function setSocialNetwork($social_network)
    {
        $this->social_network = $social_network;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getSocialPostId()
    {
        return $this->social_post_id;
    }

    /**
     * @param mixed $social_post_id
     */
    public function setSocialPostId($social_post_id)
    {
        $this->social_post_id = $social_post_id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }



}