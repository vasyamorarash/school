<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.04.2015
 * Time: 11:36
 */

namespace Application\Controller;


use Application\Entity\InstitutionType;
use Application\Form\InstitutionTypeForm;
use Application\Form\InstitutionTypeInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class InstitutionTypeController extends AbstractActionController{

    public function addAction()
    {

        $form = new InstitutionTypeForm();
        $request = $this->getRequest();

        if($request->isPost())
        {

            $formValidator = new InstitutionTypeInputFilter();
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }
            if($form->isValid() ){
                {

                    // die('alacatraz');
                    $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $institutions = new InstitutionType();
                    $institutions->exchangeArray($form->getData());
                    $objectManager->persist($institutions);
                    $objectManager->flush();

                    $message = 'Institutions succesfully saved!';
                    $this->flashMessenger()->addMessage($message);

                    return $this->redirect()->toRoute('site/institution-type');
                }
            }else{
                $message = 'Error while saving blogpost';
                $this->flashMessenger()->addErrorMessage($message);
            }

        }

        return ['form' => $form];
    }
} 