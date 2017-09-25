<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 020 20.09.17
 * Time: 21:48
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsersRepository")
 * @ORM\Table(name="global_users")
 * @UniqueEntity(fields={"email"}, message="Пользователь уже существует")
 */

class Users implements UserInterface
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Поле не должно буть пустым!")
     * @Assert\Email(message="Не похоже на e-mail!:)")
     * @ORM\Column(type="string", unique=true)
     */
    private $email;

    /**
     * @Assert\NotBlank(message="Поле не должно буть пустым!")
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string")
     */
    private $salt;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $join_date;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SocialAccounts", mappedBy="username")
     */
    private $accounts;


    //  Methods ---------------------------
    public function __construct()
    {
        $this->accounts = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|SocialAccounts[]
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @return integer
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
        return $this->email;
    }

    /**
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return  string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @return string
     */
    public function getJoinDate()
    {
        return $this->join_date;
    }

    /**
     * @param  string $join_date
     */
    public function setJoinDate($join_date)
    {
        $this->join_date = $join_date;
    }

    public function getRoles()
    {
        $roles = $this->roles;
        if (!in_array('ROLE_USER', $roles)){
            $roles[] = 'ROLE_USER';
        }
        return $roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles($roles)
    {
        if (!isset($roles)){
            $roles[] = 'ROLE_USER';
        }
        $this->roles = $roles;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}