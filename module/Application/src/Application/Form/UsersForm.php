<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.04.2015
 * Time: 11:58
 */

namespace Application\Form;


use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class UsersForm extends Form{
    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
        ));

        $this->add(array(
            'name' => 'login',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Login',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Email',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Password Here...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Password',
            ),
        ));

        $this->add(array(
            'name' => 'password_verify',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Verify Password Here...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Verify Password',
            ),
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Name',
            ),
        ));
        $this->add(array(
            'name' => 'last_name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Last name',
            ),
        ));
        $this->add(array(
            'name' => 'middle_name',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => 'Type something...',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Middle name',
            ),
        ));

        $this->add(array(
            'name' => 'institution_id',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Institution',
                'value_options' => array(
                    '1' => 'School',
                    '2' => 'University',
                ),
            ),
        ));
        $this->add(array(
            'name' => 'user_type_id',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Type',
                'value_options' => array(
                    '1' => 'Student',
                    '2' => 'Teacher',
                ),
            ),
        ));
        $this->add(array(
            'type'    => 'Zend\Form\Element\Date',
            'name'    => 'birthday',
            'attributes' => array(
                'class' => 'form-control',
                'min'  => '1900-01-01',
                'max'  => date('Y-m-d'),
                'step' => '1',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Birthdate',
                'format' => 'Y-m-d'
            )
        ));
        $this->add(array(
            'name' => 'sex_id',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Sex',
                'value_options' => array(
                    '1' => 'woman',
                    '2' => 'man',
                ),
            ),
        ));


        $this->add(array(
            'name' => 'phone',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => '+380*********',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'Phone',
            ),
        ));

        $this->add(array(
            'name' => 'description',
            'type' => 'Zend\Form\Element\Textarea',
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
            ),
            'options' => array(
                'label_attributes'=> array(
                    'class' => 'col-lg-4 control-label',
                ),
                'label' => 'description',

            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Add',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
} 