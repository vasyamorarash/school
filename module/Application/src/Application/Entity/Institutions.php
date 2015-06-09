<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.03.2015
 * Time: 16:45
 */

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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

    /**
     * @ORM\ManyToOne(targetEntity="InstitutionType", inversedBy="institution")
     * @ORM\JoinColumn(name="institution_type_id", referencedColumnName="id")
     **/
    private $institution_type;

    /** @ORM\Column(type="string") */
    protected $address;

    /** @ORM\Column(type="string") */
    protected $subdomain;

    /** @ORM\Column(type="string") */
    protected $phone;

    /** @ORM\Column(type="text") */
    protected $description;

    /**
     * @ORM\OneToMany(targetEntity="Users", mappedBy="institution")
     */
    private $users;


    public function __construct() {
        $this->institution_type = new ArrayCollection();
        $this->users = new ArrayCollection();

    }

    /**
     * @return mixed
     */
    public function getInstitutionType()
    {
        return $this->institution_type;
    }


    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getInstitutionTypeId()
    {
        return $this->institution_type_id;
    }

    /**
     * @param mixed $institution_type_id
     */
    public function setInstitutionTypeId($institution_type_id)
    {
        $this->institution_type_id = $institution_type_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSubdomain()
    {
        return $this->subdomain;
    }

    /**
     * @param mixed $subdomain
     */
    public function setSubdomain($subdomain)
    {
        $this->subdomain = $subdomain;
    }

    public function insert(){

    }

    public function exchangeArray($data)
    {
        //die('dsasda');
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                $this->$key = (!empty($val)) ? $val : null;
            }
        }
    }
    /**
     * Helper function
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

} 