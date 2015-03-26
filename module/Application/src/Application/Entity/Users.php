<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.03.2015
 * Time: 17:05
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Users {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $login;

    /** @ORM\Column(type="string") */
    protected $email;

    /** @ORM\Column(type="string") */
    protected $password;

    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="string") */
    protected $last_name;

    /** @ORM\Column(type="string") */
    protected $middle_name;

    /** @ORM\Column(type="integer")
     *  @ORM\ManyToOne(targetEntity="Users")
     *  @ORM\JoinColumn(name="user_type_id", referencedColumnName="user_id")
     */
    protected $user_type_id;


    /** @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Institutions", inversedBy="id")
     * @ORM\JoinColumn(name="institution_id", referencedColumnName="user_id")
     */
    protected $institution_id;

    /** @ORM\Column(type="date") */
    protected $birthday;

    /** @ORM\Column(type="integer") */
    protected $sex;


    /** @ORM\Column(type="integer") */
    protected $description;



} 