<?php

class CustomersController extends AppController 
{

	public function index(){
		$customers = $this->Customer->find('all', array('order'=>'Customer.company_name'));
		$customer = $this->Customer->find('all', array('conditions' => array('Customer.user_id' => $this->Auth->user('id'))));
		$this->set('customers', $customers);
		$this->set('customer', $customer);
	}
	
	public function view($id){
		$customer = $this->Customer->findById($id);
		$this->set('customer', $customer);
		$files = $this->Customer->CustomerFile->findAllByCustomerId($id);
		$this->set('files', $files);
	}
	
	public function add(){
		if ($this->request->is('post')){
			$this->Customer->set('id', $this->request->data['Customer']['Customer Code']);
			$this->Customer->set('company_name', $this->request->data['Customer']['Customer Name']);
			$this->Customer->set('address_1', $this->request->data['Customer']['Address']);
			$this->Customer->set('address_2', $this->request->data['Customer']['Address 2']);
			$this->Customer->set('city', $this->request->data['Customer']['City']);
			$this->Customer->set('state', $this->request->data['Customer']['State']);
			$this->Customer->set('zip', $this->request->data['Customer']['Zip']);
			$this->Customer->set('phone', $this->request->data['Customer']['Phone Number']);
			$this->Customer->set('email', $this->request->data['Customer']['E-mail']);
			$this->Customer->save();
			$this->redirect('/customers');	
		}
	}
	
	public function edit($id) {
		$this->Customer->id = $id;
		if ($this->request->is('get')){
			$this->request->data = $this->Customer->read();
		}
		else {
			$this->Customer->save($this->request->data);
			$this->redirect('/customers');
		}
	}
	
	public function delete($id) {
    		if ($this->request->is('get')) {
        		throw new MethodNotAllowedException();
    		}
    		if ($this->Customer->delete($id)) {
       			 $this->Session->setFlash('The customer with id: ' . $id . ' has been deleted.');
        		 $this->redirect(array('action' => 'index'));
    		}
	}
	
	public function addUserToCustomer() {
    		$users = $this->Customer->query('SELECT * from users');
    		$customers = $this->Customer->find('all');
    		$this->set('users', $users);
    		$this->set('customers', $customers);
    			
    			if ($this->request->is('post')) {
    				$addUserToCustomer = $this->Customer->query('UPDATE customers SET user_id = '.$_POST['user'].' WHERE id = '.$_POST['customer']);
    				$this->Customer->save();
    				$this->Session->setFlash('User added to customer '.$_POST['customer'].'!');
    			}
   		
    	}

}

?>