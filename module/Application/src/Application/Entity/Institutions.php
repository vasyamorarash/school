<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.03.2015
 * Time: 16:45
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Institutions {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="integer") */
    protected $institution_type_id;

    /** @ORM\Column(type="string") */
    protected $address;

    /** @ORM\Column(type="string") */
    protected $subdomain;

    /** @ORM\Column(type="string") */
    protected $phone;

    /** @ORM\Column(type="text") */
    protected $description;


} 