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
     * @ORM\OneToMany(targetEntity="Users", mappedBy="institution_id")

     */
    protected $id;


    /** @ORM\Column(type="string") */
    protected $name;

    /** @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="InstitutionType", inversedBy="id")
     * @ORM\JoinColumn(name="institution_type_id", referencedColumnName="institution_id")
     */
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