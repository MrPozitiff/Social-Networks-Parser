<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 021 21.09.17
 * Time: 22:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlannedPostsRepository")
 * @ORM\Table(name="planned_posts")
 */
class PlannedPosts
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // For global user
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SocialAccounts")
     */
    private $user;

    // id of the group what will been posted
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserHandlingGroups")
     */
    private $group;

    // id of the post what will been pushing, for memory saving one post can handle many users
    /**
     * @ORM\ManyToOne(targetEntity="PostStorage")
     */
    private $post;

    // When it will been pushed to social network group
    /** @ORM\Column(type="datetime", name="added_at") */
    private $pushing_date;

    // social network link after pushing
    /**
     * @ORM\Column(type="string")
     */
    private $pushed_link;

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
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return mixed
     */
    public function getPushingDate()
    {
        return $this->pushing_date;
    }

    /**
     * @return mixed
     */
    public function getPushedLink()
    {
        return $this->pushed_link;
    }

    /**
     * @param mixed SocialAccounts $user
     */
    public function setUser(SocialAccounts $user)
    {
        $this->user = $user;
    }

    /**
     * @param mixed UserHandlingGroups $group
     */
    public function setGroup(UserHandlingGroups $group)
    {
        $this->group = $group;
    }

    /**
     * @param mixed PostStorage $post
     */
    public function setPost(PostStorage $post)
    {
        $this->post = $post;
    }

    /**
     * @param mixed $pushing_date
     */
    public function setPushingDate($pushing_date)
    {
        $this->pushing_date = $pushing_date;
    }

    /**
     * @param mixed $pushed_link
     */
    public function setPushedLink($pushed_link)
    {
        $this->pushed_link = $pushed_link;
    }



}