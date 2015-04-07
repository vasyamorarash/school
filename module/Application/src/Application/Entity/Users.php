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
use Zend\Db\TableGateway\TableGateway;
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

     */
    protected $user_type_id;


    /** @ORM\Column(type="integer")
     */
    protected $institution_id;

    /** @ORM\Column(type="string") */
    protected $birthday;

    /** @ORM\Column(type="integer") */
    protected $sex_id;

    /** @ORM\Column(type="integer") */
    protected $phone;


    /** @ORM\Column(type="integer") */
    protected $description;

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