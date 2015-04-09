<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.04.2015
 * Time: 11:58
 */

namespace Application\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class UsersInputFilter extends InputFilter{
    protected $inputFilter;

    public function __construct($sm){


           $this->add(array(
                'name' => 'login',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'		=> 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'object_repository' => $sm->get('doctrine.entitymanager.orm_default')
                                ->getRepository('Application\Entity\Users'),
                            'fields'            => 'login'
                        ),
                    ),
                ),
            ));
            $this->add([
            'name' => 'email',
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array (
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                            'emailAddressInvalidFormat' => 'Email address format is not invalid',
                        )
                    ),
                    array(
                        'name'		=> 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'object_repository' => $sm->get('doctrine.entitymanager.orm_default')
                                                    ->getRepository('Application\Entity\Users'),
                            'fields'            => 'email'
                        ),
                    ),
                ),
                array (
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Email address is required',
                        )
                    ),
                ),
            ),
        ]);
            $this->add([
                'name' => 'password',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ]);

            $this->add([
                'name' => 'password_verify',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'identical',
                        'options' => array(
                            'token' => 'password',
                        ),
                    ),

                ),
            ]);

            $this->add(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ));

            $this->add(array(
                'name' => 'last_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ));
            $this->add(array(
                'name' => 'middle_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ));

//            $inputFilter->add($factory->createInput(array(
//                'name' => 'institution_id',
//                'filters' => array(
//                    array('name' => 'StripTags'),
//                    array('name' => 'StringTrim'),
//                ),
//                'validators' => array(
//                    array (
//                        'name' => 'InArray',
//                        'options' => array(
//                            'haystack' => array(0,1,2)
////                        'messages' => array(,
////            'notInArray' => 'undefined'
////        ),
//                        ),
//                    ),
//
//                ),
//            )));$inputFilter->add($factory->createInput(array(
//                'name' => 'user_type_id',
//                'filters' => array(
//                    array('name' => 'StripTags'),
//                    array('name' => 'StringTrim'),
//                ),
//                'validators' => array(
//                    array (
//                        'name' => 'InArray',
//                        'options' => array(
//                            'haystack' => array(0,1,2)
////                        'messages' => array(,
////            'notInArray' => 'undefined'
////        ),
//                        ),
//                    ),
//
//                ),
//            )));
//
//
//            $inputFilter->add($factory->createInput(array(
//                'name' => 'sex_id',
//                'filters' => array(
//                    array('name' => 'StripTags'),
//                    array('name' => 'StringTrim'),
//                ),
//                'validators' => array(
//                    array (
//                        'name' => 'InArray',
//                        'options' => array(
//                            'haystack' => array(0,1,2)
////                        'messages' => array(,
////            'notInArray' => 'undefined'
////        ),
//                        ),
//                    ),
//
//                ),
//            )));

            $this->add(array(
                 'name' => 'phone',
                 'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                  ),
                'validators' => array(
                  ),
            ));

        /*  $inputFilter->add($factory->createInput(array(
              'name'     => 'birthday',
              'required' => false,
              'filters'  => array(
                  array('name' => 'StripTags'),
              ),
              'validators' => array(
                  array(
                      'name' => 'DateStep',
                      'options' => array(
                          //'step'     => new DateInterval("P2D"),
                          //'baseValue' => new DateTime(),
                          'messages' => array(
                              \Zend\Validator\DateStep::NOT_STEP => 'Must be a day in the future',
                          ),
                      ),
                  ),
              ),
          )));*/
        $this->add(array(
                'name' => 'description',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ));


        }

} 