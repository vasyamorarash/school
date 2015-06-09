<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Form\LoginForm;
use Application\Form\LoginInputFilter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\ViewEvent;




class IndexController extends AbstractActionController
{
    public function indexAction() {
//       $objectManager = $this
//            ->getServiceLocator()
//            ->get('Doctrine\ORM\EntityManager');
////
//        $institution_type = new \Application\Entity\InstitutionType();
////        $institution_type->setName('school');
////
//        $objectManager->persist($institution_type);
////        $objectManager->flush();
//
//        die(var_dump($institution_type->getId()).'name: '.$institution_type->getName()); // yes, I'm lazy

    }

    public function editAction()
    {
        exit('edit');
    }
    public function loginAction()
    {
        $form = new LoginForm();
        $messages = null;
        $request = $this->getRequest();

        if ($request->isPost()) {

            // TODO fix the filters
            $form->setInputFilter(new LoginInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {

                $data = $form->getData();
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($data['login']);
                $adapter->setCredentialValue(md5($data['password']));
                //var_dump(get_class_methods($authService));

                $authResult = $authService->authenticate();
                //var_dump(md5('qwerty'));
                if ($authResult->isValid()) {

                    $identity = $authResult->getIdentity();
                    $authService->getStorage()->write($identity);
                    $time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days

                    if ($data['rememberme']) {
                        $sessionManager = new \Zend\Session\SessionManager();
                        $sessionManager->rememberMe($time);
                    }
                return $this->redirect()->toRoute('site/home');
                }
                foreach ($authResult->getMessages() as $message) {
                    $messages = "Incorect data!!!!";
                }
            }
        }

        return new ViewModel(array(
            'form'	=> $form,
            'messages' => $messages,
        ));
    }

    public function logoutAction()
    {
        $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
        }
        $auth->clearIdentity();
        $sessionManager = new \Zend\Session\SessionManager();
        $sessionManager->forgetMe();
        $this->redirect()->toRoute('site/home', array('controller' => 'index', 'action' => 'login'));

    }
}
