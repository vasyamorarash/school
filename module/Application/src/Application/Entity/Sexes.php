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

class Sex
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
}