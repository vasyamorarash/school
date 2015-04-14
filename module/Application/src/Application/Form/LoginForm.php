<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 08.04.2015
 * Time: 14:58
 */

namespace Application\Form;


use Zend\Form\Form;

class LoginForm extends Form
{
    public function __construct($name = null)
    {
// we want to ignore the name passed
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'navbar-form navbar-right');
        $this->setAttribute('style','margin-right: 1px;');

        $this->add(array(
            'name' => 'login', // 'usr_name',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Login',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'password', // 'usr_password',
            'attributes' => array(
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => 'required',
            ),
        ));
        $this->add(array(
            'name' => 'rememberme',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'Remember Me?',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Sign In',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}