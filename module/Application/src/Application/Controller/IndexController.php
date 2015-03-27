<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\ViewEvent;

class IndexController extends AbstractActionController
{
    public function indexAction() {
  /*     $objectManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

        $institution_type = new \Application\Entity\InstitutionType();
        $institution_type->setName('school');

        $objectManager->persist($institution_type);
        $objectManager->flush();*/

     //   die(var_dump($institution_type->getId()).'name: '.$institution_type->getName()); // yes, I'm lazy*/

    }

    public function editAction()
    {
        exit('edit');
    }
}
