<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 09.04.2015
 * Time: 15:34
 */

namespace Application\Form;

use Zend\Form\Form;


class ForgottenPasswordForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('registration');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'email',
                'class' => 'form-control',
                'placeholder' => 'Email...',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'E-mail',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}