<?php

class CustomerfilesController extends AppController {

	public $name = 'CustomerFile';
	
	public function beforeFilter(){
	parent::beforeFilter();
	$this->Auth->allow('add');
	$this->Uploader = new Uploader();
	
	}
	
	
	
	private function _getTestNumber() {
	$testNumber = '';
	$filename = $this->request->data['CustomerFile']['filename']['name'];
	$testNumber = explode(".", $filename);
	
	return $testNumber[0];
	
	}
	
	
	
	private function _getMachineNumber(){
	
	$twoTimer = $this->_getTestNumber();
	
	$serialNumber = explode("_", $twoTimer);
	
	if ($serialNumber){
		return $serialNumber[1];
	}
	else {
		return " ";
	}
	}
	
	private function _getBatchTestNumber($thisFile) {
	$testNumber = '';
	$filename = $thisFile;
	$double = explode(".", $filename);
	$testNumber = explode("_", $double[0]);
	return $testNumber[0];
	}
	
	private function _getBatchMachineNumber($thisFile) {
	$machineNumber = '';
	$filename = $thisFile;
	$double = explode(".", $filename);
	$machineNumber = explode("_", $double[0]);
	return $machineNumber[1];
	}
	
	public function upload($id){
	
		if ($this->request->is('post')){
			if ($data = $this->Uploader->upload('filename')) {
				$this->CustomerFile->set('customer_id', $id);
				$this->CustomerFile->set('test_number', $this->_getTestNumber());
				$this->CustomerFile->set('machine_number', $this->_getMachineNumber());
				$this->CustomerFile->set('file_path', 'http://www.tylerscottchance.com/files/uploads/'.$this->request->data['CustomerFile']['filename']['name']);
				$this->CustomerFile->set('filename', $this->request->data['CustomerFile']['filename']['name']);
				$this->Session->setFlash('Holy shit it worked!');
				$this->CustomerFile->save();
				$this->redirect('/customers/view/'.$id);
			}

	
		}
	
	
	}
	
	public function batchUpload($id){
		$this->request->data['id'] = $id;
		if ($this->request->is('post')){
		
				//set variables 
				
				$files = $_FILES['CustomerFile'];
				$counted = sizeof($files);
				$fileNames = $files['name'];
				$fileTypes = $files['type'];
				$fileTmps = $files['tmp_name'];
				$uploadDir = '../../../files/uploads/';
				$finalArray = array();
				
				//rearrange file data into better array
				
				for ($i=0; $i<=$counted; $i++){
				
					array_push($finalArray, array('name'=>$fileNames[$i], 'type'=>$fileTypes[$i], 'tmp_name'=>$fileTmps[$i]));
				
				}
				
				
				for ($i=0; $i<=$counted; $i++){
					//save database information
					$fileName = $finalArray[$i]['name'];
					$filePath = 'http://www.tylerscottchance.com/files/uploads/'.$fileName;
					$uploadPath = $uploadDir.$fileName;
					$testNumber = $this->_getBatchTestNumber($fileName);
					$machineNumber = $this->_getBatchMachineNumber($fileName);
					$this->CustomerFile->query('INSERT INTO customer_files (filename, test_number, machine_number, file_path, customer_id, TIME_CREATED) 
					VALUES ("'.$fileName.'","'.$testNumber.'","'.$machineNumber.'","'.$filePath.'","'.$id.'","'.date('Y-m-d').'")');
					//move uploaded files
					move_uploaded_file($fileTmps[$i], $uploadPath);
					
				}
				
				$this->CustomerFile->save();
				$this->Session->setFlash('IT TOTALLY WORKED!');
		}
	}
	
	public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->CustomerFile->id = $id;
        if (!$this->CustomerFile->exists()) {
            throw new NotFoundException(__('Invalid file'));
        }
        if ($this->CustomerFile->delete()) {
            $delete = unlink($this->CustomerFile->file_path);
            if ($delete):
            $this->redirect(array('controller'=>'customers', 'action'=>'view', $id));
            $this->Session->setFlash(__('File deleted'));
            endif;
            
        }
        $this->Session->setFlash(__('File was not deleted'));
        $this->redirect(array('controller'=>'customers', 'action'=>'view', $id));
    }

}


?>