<div class="span12">

<h2> Add Customer </h2>
<?php echo $this->Form->create('Customer'); ?>
<?php echo $this->Form->input('Customer Code'); ?>
<?php echo $this->Form->input('Customer Name'); ?>
<?php echo $this->Form->input('E-mail'); ?>
<?php echo $this->Form->input('Phone Number'); ?>
<?php echo $this->Form->input('Address'); ?>
<?php echo $this->Form->input('Address 2'); ?>
<?php echo $this->Form->input('City'); ?>
<?php echo $this->Form->input('State'); ?>
<?php echo $this->Form->input('Zip'); ?>
<?php echo $this->Form->end('Add Customer'); ?>


</div>