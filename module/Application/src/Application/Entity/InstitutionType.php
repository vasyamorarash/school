<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.03.2015
 * Time: 16:43
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class InstitutionType {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @ORM\OneToMany(targetEntity="Institutions", mappedBy="institution_type_id")
     * @ORM\JoinColumn(name="institution_type_id", referencedColumnName="id")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;

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