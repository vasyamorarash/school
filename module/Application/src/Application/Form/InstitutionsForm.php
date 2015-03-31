<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 31.03.2015
 * Time: 1:47
 */

namespace Application\Form;


use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class InstitutionsForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'type' => 'Zend\Form\Element\Hidden',
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
            'name' => 'institution_type_id',
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
                    '0' => 'School',
                    '1' => 'University',
                ),
            ),
        ));

        $this->add(array(
            'name' => 'address',
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
                'label' => 'Address',
            ),
        ));

        $this->add(array(
            'name' => 'subdomain',
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
                'label' => 'Subdomain',
            ),
        ));
        $this->add(array(
            'name' => 'phone',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'class' => 'form-control',
                'placeholder' => '0156165',
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
        $this->add(array(
            'name' => 'csrf',
            'type' => 'Zend\Form\Element\Csrf',
        ));
    }
}