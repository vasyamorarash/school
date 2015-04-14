<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 08.04.2015
 * Time: 14:59
 */

namespace Application\Form;


use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class LoginInputFilter extends InputFilter
{
    public function __construct($sm)
    {
        $this->add(array(
            'name' => 'login', // 'usr_name'
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ),
                ),
//                array(
//                    'name'	=> 'DoctrineModule\Validator\ObjectExists',
//                    'options' => array(
//                        'object_repository' => $sm->get('doctrine.entitymanager.orm_default')
//                            ->getRepository('Application\Entity\Users'),
//                        'fields' => 'login',
//                        'messages' => array(
//                            'noObjectFound' => 'User dosen\'t exist !'
//                        ),
//                    ),
//                ),
            ),
        ));
        $this->add(array(
            'name' => 'password', // usr_password
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 34,
                    ),
                ),
            ),
        ));
    }
} 