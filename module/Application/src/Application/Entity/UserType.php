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
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;


}