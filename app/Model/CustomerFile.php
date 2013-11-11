<?php

class CustomerFile extends AppModel {

	public $name = 'CustomerFile';
	
	public $belongsTo = 'Customer';
	
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'filename' => array(
				'dbColumn' => 'file_path',
				'overwrite' => true,
				'allowEmpty' => false,
		
			)
		
		)
	);
	
	
}

?>