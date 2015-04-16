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
use Zend\Mail\Transport\Sendmail;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Mail\Message;

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
    function passwordChangeSuccessAction()
    {
        $email = null;
        $flashMessenger = $this->flashMessenger();
        if ($flashMessenger->hasMessages()) {
            foreach ($flashMessenger->getMessages() as $key => $value) {
                $email .= $value;
            }
        }
        return new ViewModel(array(
            'email' => $email
        ));
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
                $passwordHash = $this->encriptPassword($password);
                $this->sendPasswordByEmail($email, $password);
                //die();
                $this->flashMessenger()->addMessage($email);
                $user->setPassword($passwordHash);
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirect()->toRoute('site/users', array('controller'=>'registration', 'action'=>'password-change-success'));
            }
        }
        return new ViewModel(array('form' => $form));
    }
    public function sendPasswordByEmail($usr_email, $password)
    {
        $message = new Message();
        $message->addTo($usr_email)
            ->addFrom('praktiki@coolcsn.com')
            ->setSubject('Your password has been changed!')
            ->setBody("Your password at  " .
                $this->getRequest()->getServer('HTTP_ORIGIN') .
                ' has been changed. Your new password is: ' .
                $password
            );

        $transport = new Sendmail();
        $transport->send($message);

    }
    public function encriptPassword($password)
    {
        return $password = md5($password );
    }
    public function generatePassword($l = 8, $c = 0, $n = 0, $s = 0) {
        // get count of all required minimum special chars
        $count = $c + $n + $s;
        $out = '';
        // sanitize inputs; should be self-explanatory
        if(!is_int($l) || !is_int($c) || !is_int($n) || !is_int($s)) {
            trigger_error('Argument(s) not an integer', E_USER_WARNING);
            return false;
        }
        elseif($l < 0 || $l > 20 || $c < 0 || $n < 0 || $s < 0) {
            trigger_error('Argument(s) out of range', E_USER_WARNING);
            return false;
        }
        elseif($c > $l) {
            trigger_error('Number of password capitals required exceeds password length', E_USER_WARNING);
            return false;
        }
        elseif($n > $l) {
            trigger_error('Number of password numerals exceeds password length', E_USER_WARNING);
            return false;
        }
        elseif($s > $l) {
            trigger_error('Number of password capitals exceeds password length', E_USER_WARNING);
            return false;
        }
        elseif($count > $l) {
            trigger_error('Number of password special characters exceeds specified password length', E_USER_WARNING);
            return false;
        }

        // all inputs clean, proceed to build password

        // change these strings if you want to include or exclude possible password characters
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $caps = strtoupper($chars);
        $nums = "0123456789";
        $syms = "!@#$%^&*()-+?";

        // build the base password of all lower-case letters
        for($i = 0; $i < $l; $i++) {
            $out .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }

        // create arrays if special character(s) required
        if($count) {
            // split base password to array; create special chars array
            $tmp1 = str_split($out);
            $tmp2 = array();

            // add required special character(s) to second array
            for($i = 0; $i < $c; $i++) {
                array_push($tmp2, substr($caps, mt_rand(0, strlen($caps) - 1), 1));
            }
            for($i = 0; $i < $n; $i++) {
                array_push($tmp2, substr($nums, mt_rand(0, strlen($nums) - 1), 1));
            }
            for($i = 0; $i < $s; $i++) {
                array_push($tmp2, substr($syms, mt_rand(0, strlen($syms) - 1), 1));
            }

            // hack off a chunk of the base password array that's as big as the special chars array
            $tmp1 = array_slice($tmp1, 0, $l - $count);
            // merge special character(s) array with base password array
            $tmp1 = array_merge($tmp1, $tmp2);
            // mix the characters up
            shuffle($tmp1);
            // convert to string for output
            $out = implode('', $tmp1);
        }

        return $out;
    }
} 