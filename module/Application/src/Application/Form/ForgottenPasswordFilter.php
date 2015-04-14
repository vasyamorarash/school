<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 09.04.2015
 * Time: 15:32
 */

namespace Application\Form;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class ForgottenPasswordFilter extends InputFilter{

    public function __construct($sm)
    {
        $this->add(array(
            'name'       => 'email',
            'required'   => true,
            'validators' => array(
                array(
                    'name' => 'EmailAddress'
                ),
                array(
                    'name'		=> 'DoctrineModule\Validator\ObjectExists',
                    'options' => array(
                        'object_repository' => $sm->get('doctrine.entitymanager.orm_default')
                            ->getRepository('Application\Entity\Users'),
                        'fields'            => 'email'
                    ),
                ),
            ),
        ));
    }

} 