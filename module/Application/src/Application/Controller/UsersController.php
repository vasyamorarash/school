<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.04.2015
 * Time: 12:27
 */

namespace Application\Controller;



use Application\Entity\Users;
use Application\Form\UsersForm;
use Application\Form\UsersInputFilter;
use Zend\Form\Element\Date;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UsersController extends AbstractActionController{
    public function addAction()
    {

        $form = new UsersForm();
        $request = $this->getRequest();

        if($request->isPost())
        {

            $formValidator = new UsersInputFilter();
            {
                $form->setInputFilter($formValidator->getInputFilter());

                $form->setData($request->getPost());
            }

            if($form->isValid() ){
                {
                    die('alacatraz');
                    $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $institutions = new Users();
                    $institutions->exchangeArray($form->getData());
                    $objectManager->persist($institutions);
                    $objectManager->flush();

                    $message = 'Institutions succesfully saved!';
                    $this->flashMessenger()->addMessage($message);

                    return $this->redirect()->toRoute('site/users');
                }
            }else{
                $message = 'Error while saving blogpost';
                $this->flashMessenger()->addErrorMessage($message);
            }

        }

        return ['form' => $form];
    }
} 