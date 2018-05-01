<?php
/**
 * Created by PhpStorm.
 * User: Seka Herve
 * Date: 28/04/2018
 * Time: 11:04
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="article")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GEneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * @ORM\Column(type="date")
     */
    protected $publicationDate;

}