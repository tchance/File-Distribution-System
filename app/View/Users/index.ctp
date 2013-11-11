<div class="span12">
<h2>Users</h2>
<?php echo $this->Html->link('<< Back to index', array('controller'=>'customers', 'action'=>'index')); ?>
<table width="100%">
<thead>
	<th>Username</th>
	<th>Role</th>
	<th>Delete</th>
</thead>
<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['username'] ?></td>
		<td><?php echo $user['User']['roles'] ?></td>
		<td>
		<?php echo $this->Form->postLink('Delete User', array('action'=>'delete', $user['User']['id']), array('confirm'=>'Are you sure?')); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>