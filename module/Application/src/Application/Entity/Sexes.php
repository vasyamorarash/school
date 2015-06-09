<?php
/**
 * Created by PhpStorm.
 * User: Serhiy
 * Date: 02.04.2015
 * Time: 12:08
 */
namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */

class Sexes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="User", mappedBy="sex_id")
     * @ORM\JoinColumn(name="sex_id", referencedColumnName="id")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $type;

    /**
     * @ORM\OneToMany(targetEntity="Users", mappedBy="sex")
     */
    private $users;

    public function __construct() {
        $this->users = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

}