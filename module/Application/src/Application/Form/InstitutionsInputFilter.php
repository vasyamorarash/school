<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 31.03.2015
 * Time: 1:47
 */

namespace Application\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class InstitutionsInputFilter implements InputFilterAwareInterface
{
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
                'name' => 'institution_type_id',
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array (
                        'name' => 'InArray',
                        'options' => array(
                            'haystack' => array(0,1)
//                        'messages' => array(,
//            'notInArray' => 'undefined'
//        ),
                    ),
                ),

            ),
            )));

        $inputFilter->add($factory->createInput(array(
            'name' => 'address',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
            ),
        )));

        $inputFilter->add($factory->createInput(array(
            'name' => 'subdomain',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
            ),
        )))
        ;$inputFilter->add($factory->createInput(array(
            'name' => 'phone',
            'required' => true,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
            ),
        )));

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