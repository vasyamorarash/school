<?php
/**
 * Created by PhpStorm.
 * User: Vassya
 * Date: 31.03.2015
 * Time: 14:17
 */
namespace Application\View\Helper;


use Application\Form\LoginForm;

class MenuHelper extends HelperBase
{
    public function __invoke()
    {
        $form = new LoginForm();

        return $this->getView()->render('application/helpers/menu',[
            'form'	=> $form,
        ]);
    }
}