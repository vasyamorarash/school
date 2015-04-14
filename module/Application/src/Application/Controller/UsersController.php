<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.04.2015
 * Time: 12:27
 */

namespace Application\Controller;



use Application\Entity\Users;
use Application\Form\ForgottenPasswordFilter;
use Application\Form\ForgottenPasswordForm;
use Application\Form\UsersForm;
use Application\Form\UsersInputFilter;
use Zend\Form\Element\Date;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UsersController extends AbstractActionController{
    public function registrationAction()
    {

        $form = new UsersForm();
        $request = $this->getRequest();

        if($request->isPost())
        {
            $form->setInputFilter(new UsersInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if($form->isValid() ){
                {
                    $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
                    $institutions = new Users();
                    $institutions->exchangeArray($form->getData());
                    //die(print_r($institutions->getPassword()));
                    $institutions->setPassword(md5($institutions->getPassword()));
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

    public function forgottenPasswordAction()
    {
        $form = new ForgottenPasswordForm();
        $form->get('submit')->setValue('Send');
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new ForgottenPasswordFilter($this->getServiceLocator()));
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
                $email = $data['email'];
                $entityManager = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
                $user = $entityManager->getRepository('Application\Entity\Users')->findOneBy(array('email' => $email)); //
                $password = $this->generatePassword();
                $passwordHash = $this->encriptPassword($this->getStaticSalt(), $password, $user->getUsrPasswordSalt());
                $this->sendPasswordByEmail($email, $password);
                $this->flashMessenger()->addMessage($email);
                $user->setPassword($passwordHash);
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirect()->toRoute('site/users', array('controller'=>'registration', 'action'=>'password-change-success'));
            }
        }
        return new ViewModel(array('form' => $form));
    }
} 