<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 0:08
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContentTypeRepository")
 * @ORM\Table(name="content_type")
 */
class ContentType
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    // Type of content: image, video, document etc
    /**
     * @ORM\Column(type="string")
     */
    private $type;

}