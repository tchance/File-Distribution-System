<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	
   public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'customers', 'action' => 'index', 'loggedin'),
            'logoutRedirect' => array('controller' => 'customers', 'action' => 'index')
        )
    );
    
    

    function beforeFilter() {
        $this->Auth->authError = 'Authentication error.';
        $this->Auth->loginError = 'Username or password is invalid.';
        $this->Auth->loginRedirect = array('contoller' => 'customers', 'action' => 'index');
        $this->Auth->logoutRedirect = array('controller' => 'customers', 'action' => 'index');
        $this->set('admin', $this->_isAdmin());
        $this->set('loggedin', $this->_isLoggedIn());
    }
    
    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect(array('controller' => 'customers', 'action' => 'index')));
            $this->Session->setFlash(__('User logged in!'));
        } else {
            $this->Session->setFlash(__('Please enter username and password.'));
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    
    public function loggedout(){
        //do nothing
    }
    
    function _isAdmin() {
    $admin = FALSE;
    if ($this->Auth->user('roles')=='admin'){
    	$admin = TRUE;
    	}
    return $admin;
    }
    
    function _isLoggedIn() {
    $loggedin = FALSE;
    if ($this->Auth->loggedIn() == TRUE) {
    	$loggedin = TRUE;
    }
    return $loggedin;
    }
    

}