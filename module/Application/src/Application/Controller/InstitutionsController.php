<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 31.03.2015
 * Time: 2:05
 */

namespace Application\Controller;


use Application\Entity\Institutions;
use Application\Form\InstitutionsForm;
use Application\Form\InstitutionsInputFilter;
use Doctrine\ORM\Query\ResultSetMapping;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class InstitutionsController extends AbstractActionController{

    public function indexAction(){
        $em = $this->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');
        $config = $em->getRepository("\Application\Entity\Institutions")->findAll();

        return new ViewModel(array(
            'data' => $config,
        ));
    }
    public function addAction()
    {

        $form = new InstitutionsForm();
        $request = $this->getRequest();

        if($request->isPost())
        {
            $formValidator = new InstitutionsInputFilter();
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }
           // die(print_r($form->isValid());
            if($form->isValid() )
            {
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                $institutions = new Institutions();
                $institutions->exchangeArray($form->getData());
                $objectManager->persist($institutions);
                $objectManager->flush();

                    $message = 'Institutions succesfully saved!';
                    $this->flashMessenger()->addMessage($message);

                return $this->redirect()->toRoute('site/home');
            }else{
                $message = 'Error while saving blogpost';
                $this->flashMessenger()->addErrorMessage($message);
            }


        }
        return ['form' => $form];
    }

    public function editAction(){

    }

}