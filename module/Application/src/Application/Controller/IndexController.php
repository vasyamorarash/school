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

        $form->get('submit')->setValue('Login');
        $messages = null;
        $request = $this->getRequest();

        if ($request->isPost()) {

            //- $authFormFilters = new User(); // we use the Entity for the filters
            // TODO fix the filters
            //- $form->setInputFilter($authFormFilters->getInputFilter());
            // Filters have been fixed

            $form->setInputFilter(new LoginInputFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {

                $data = $form->getData();
                // $data = $this->getRequest()->getPost();
                // If you used another name for the authentication service, change it here
                // it simply returns the Doctrine Auth.
                //This is all it does. lets first create the connection to the DB and the Entity
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                // Do the same you did for the ordinar Zend AuthService
                $adapter = $authService->getAdapter();
                $adapter->setIdentityValue($data['login']);
                $adapter->setCredentialValue($data['password']);

                $authResult = $authService->authenticate();

                if ($authResult->isValid()) {

                    $identity = $authResult->getIdentity();
                    $authService->getStorage()->write($identity);
                    $time = 1209600; // 14 days 1209600/3600 = 336 hours => 336/24 = 14 days
                    //- if ($data['rememberme']) $authService->getStorage()->session->getManager()->rememberMe($time); // no way to get the session
                    if ($data['rememberme']) {
                        $sessionManager = new \Zend\Session\SessionManager();
                        $sessionManager->rememberMe($time);
                    }
                //- return $this->redirect()->toRoute('home');
                }
                foreach ($authResult->getMessages() as $message) {
                    $messages .= "$message\n";
                }
            }
        }

        return new ViewModel(array(
            'error' => 'Your authentication credentials are not valid',
            'form'	=> $form,
            'messages' => $messages,
        ));
    }

    public function logoutAction()
    {
        // in the controller
        // $auth = new AuthenticationService();
        $auth = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        // @todo Set up the auth adapter, $authAdapter
        if ($auth->hasIdentity()) {
            // Identity exists; get it
            $identity = $auth->getIdentity();
//-			echo '<pre>';
//-			print_r($identity);
//-			echo '</pre>';
        }
        $auth->clearIdentity();
//-		$auth->getStorage()->session->getManager()->forgetMe(); // no way to get to the sessionManager from the storage
        $sessionManager = new \Zend\Session\SessionManager();
        $sessionManager->forgetMe();

        // $view = new ViewModel(array(
        //    'message' => 'Hello world',
        // ));
        // $view->setTemplate('foo/baz-bat/do-something-crazy');
        // return $view;

        // return $this->redirect()->toRoute('home');
        return $this->redirect()->toRoute('site/home', array('controller' => 'index', 'action' => 'login'));

    }
}
