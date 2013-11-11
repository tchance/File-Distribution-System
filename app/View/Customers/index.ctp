<div class="span6">
<?php echo $this->Session->flash(); ?>
<h2>Accounts</h2>
<ul>
<?php if ($admin): ?>

	<?php foreach ($customers as $customer): ?>
	
	<li><a href="http://www.tylerscottchance.com/cake2/customers/view/<?php echo $customer['Customer']['id']?>"><?php echo $customer['Customer']['company_name'] ?></a></li>

	<?php endforeach; ?>

<?php else: ?>

	<?php foreach ($customer as $customer): ?>
	
	<li><a href="http://www.tylerscottchance.com/cake2/customers/view/<?php echo $customer['Customer']['id']?>"><?php echo $customer['Customer']['company_name'] ?></a></li>

	<?php endforeach; ?>
	
<?php endif; ?>
</ul>
</div>
<div class="span 6">
<h2>Admin area</h2>
<?php if ($admin) : ?>
	<h5>Users</h5>
	<?php echo $this->Html->link('Add users', array('controller' => 'users', 'action' => 'add')); ?><br>
	<?php echo $this->Html->link('View users', array('controller' => 'users', 'action' => 'index')); ?><br>
	<hr>
	<h5>Customers</h5>
	<?php echo $this->Html->link('Add customer', array('controller' => 'customers', 'action' => 'add')); ?><br>
	<?php echo $this->Html->link('Add user to customer', array('controller' => 'customers', 'action' => 'addusertocustomer')); ?>
	<hr>
	<h5>Logout</h5>
	<?php echo $this->Html->link('Click here to logout', array('controller' => 'users', 'action' => 'logout')); ?>	
<?php elseif ($admin == FALSE && $loggedin == TRUE): ?>
	<?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
<?php else: ?>
	<?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'logout')); ?>
<?php endif; ?>
</div>