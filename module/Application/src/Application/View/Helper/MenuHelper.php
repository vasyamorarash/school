<?php
/**
 * Created by PhpStorm.
 * User: Vassya
 * Date: 31.03.2015
 * Time: 14:17
 */
namespace Application\View\Helper;

class MenuHelper extends HelperBase
{
    public function __invoke()
    {
        return $this->getView()->render('application/helpers/menu',[

        ]);
    }
}