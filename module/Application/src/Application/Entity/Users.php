<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 24.03.2015
 * Time: 17:05
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Db\Sql\Select;
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

    /** @ORM\Column(type="integer") */
    protected $user_type_id;

    /**
     * @ORM\ManyToOne(targetEntity="UserType", inversedBy="users")
     * @ORM\JoinColumn(name="user_type_id", referencedColumnName="id")
     */
    private $user_type;

    /** @ORM\Column(type="integer")
     */
    protected $institution_id;

    /**
     * @ORM\ManyToOne(targetEntity="Institutions", inversedBy="users")
     * @ORM\JoinColumn(name="institution_id", referencedColumnName="id")
     */
    private $institution;

    /** @ORM\Column(type="string") */
    protected $birthday;

    /** @ORM\Column(type="integer") */
    protected $sex_id;
    /**
     * @ORM\ManyToOne(targetEntity="Sexes", inversedBy="users")
     * @ORM\JoinColumn(name="sex_id", referencedColumnName="id")
     */
    private $sex;
    /** @ORM\Column(type="integer") */
    protected $phone;

    /** @ORM\Column(type="string") */
    protected $description;

    /**
     * @return mixed
     */
    public function getInstitution()
    {
        return $this->institution;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getInstitutionId()
    {
        return $this->institution_id;
    }

    /**
     * @param mixed $institution_id
     */
    public function setInstitutionId($institution_id)
    {
        $this->institution_id = $institution_id;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * @param mixed $middle_name
     */
    public function setMiddleName($middle_name)
    {
        $this->middle_name = $middle_name;
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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getSexId()
    {
        return $this->sex_id;
    }

    /**
     * @param mixed $sex_id
     */
    public function setSexId($sex_id)
    {
        $this->sex_id = $sex_id;
    }

    /**
     * @return mixed
     */
    public function getUserTypeId()
    {
        return $this->user_type_id;
    }

    /**
     * @param mixed $user_type_id
     */
    public function setUserTypeId($user_type_id)
    {
        $this->user_type_id = $user_type_id;
    }


    public function selectUsers(){

        $select = new Select();
        $resultSet  = $select->from('school.users');
        //$resultSet = $this->tableGateway->selectWith($select);
       // DIE(print_r($resultSet));
        return $resultSet;

    }

    public function exchangeArray($data)
    {
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