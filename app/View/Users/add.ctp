<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('Register new user'); ?>

<br>

<?php echo $this->Html->link('<< Back to index', array('controller' => 'customers', 'action' => 'index'));