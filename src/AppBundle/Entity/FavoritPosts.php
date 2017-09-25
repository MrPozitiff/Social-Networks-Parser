<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 021 21.09.17
 * Time: 22:23
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FavoritPostsRepository")
 * @ORM\Table(name="favorites")
 */
class FavoritPosts
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
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $likes;

    /**
     * @ORM\Column(type="integer")
     */
    private $reposts;

    // When it has added to favorites
    /** @ORM\Column(type="datetime", name="added_at") */
    private $added_at;


    //Methods
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
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @return mixed
     */
    public function getReposts()
    {
        return $this->reposts;
    }

    /**
     * @return mixed
     */
    public function getAddedAt()
    {
        return $this->added_at;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @param mixed $reposts
     */
    public function setReposts($reposts)
    {
        $this->reposts = $reposts;
    }

    /**
     * @param mixed $added_at
     */
    public function setAddedAt($added_at)
    {
        $this->added_at = $added_at;
    }


}