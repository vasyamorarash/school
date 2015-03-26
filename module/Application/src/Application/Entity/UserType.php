<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.03.2015
 * Time: 17:01
 */

namespace Application\Entity;


use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */

class UserType {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="User", mappedBy="user_type_id")

     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;


}