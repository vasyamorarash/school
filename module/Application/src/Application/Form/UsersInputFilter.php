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

class UsersInputFilter implements InputFilterAwareInterface{
    protected $inputFilter;

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'login',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));$inputFilter->add($factory->createInput([
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
        ]));
            $inputFilter->add($factory->createInput([
                'name' => 'password',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            ]));

            $inputFilter->add($factory->createInput([
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
            ]));

            $inputFilter->add($factory->createInput(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'last_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));
            $inputFilter->add($factory->createInput(array(
                'name' => 'middle_name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));

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

            $inputFilter->add($factory->createInput(array(
                 'name' => 'phone',
                 'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                  ),
                'validators' => array(
                  ),
            )));
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

            $inputFilter->add($factory->createInput(array(
                'name' => 'description',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                ),
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
} 