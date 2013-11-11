<h2>Upload files</h2>

<?php echo $this->Form->create('CustomerFile', array('type' => 'file')); ?>
<?php echo $this->Form->input('filename', array('type' => 'file')); ?>
<?php echo $this->Form->end('Upload'); ?>