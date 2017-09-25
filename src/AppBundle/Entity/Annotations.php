<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 021 21.09.17
 * Time: 22:24
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnnotationsRepository")
 * @ORM\Table(name="annotations")
 */
class Annotations
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // I'm think that we can make different annotations to every account of every social network
    /**
     * @ORM\ManyToOne(targetEntity="SocialAccounts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $text;

    // Images, watermarks, signatures etc
    /**
     * @ORM\Column(type="string", options={"default":""})
     */
    private $specials;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed Users $username
     */
    public function setUser(Users $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getSpecials()
    {
        return $this->specials;
    }

    /**
     * @param string $specials
     */
    public function setSpecials($specials)
    {
        $this->specials = $specials;
    }

}