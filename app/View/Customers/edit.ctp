<div class="span12">

<h2> Add Customer </h2>
<?php echo $this->Form->create('Customer'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('company_name'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('phone'); ?>
<?php echo $this->Form->input('address_1'); ?>
<?php echo $this->Form->input('address_2'); ?>
<?php echo $this->Form->input('city'); ?>
<?php echo $this->Form->input('state'); ?>
<?php echo $this->Form->input('zip'); ?>
<?php echo $this->Form->end('Edit Customer'); ?>

<?php echo $this->Html->link('Back to customer index', array('controller'=>'customers', 'action'=>'index')); ?>
</div>