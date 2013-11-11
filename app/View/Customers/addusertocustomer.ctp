<div class="span12">
<form action="addusertocustomer" method="post">

<h3>Select User (select one)</h3>
	<select name="user">
<?php foreach ($users as $user): ?>
	
	<option value="<?php echo $user['users']['id']; ?>" >&nbsp&nbsp<?php echo $user['users']['username']; ?></option>
	
<?php endforeach; ?>
	</select>
	
<h3>Select Customer(s)</h3>
	<select name="customer">
<?php foreach ($customers as $customer): ?>
	<option value="<?php echo $customer['Customer']['id']; ?>" >&nbsp&nbsp<?php echo $customer['Customer']['company_name']; ?></option>
<?php endforeach; ?>
	</select>
	<input type="submit" value="Add User to Customer"></input>
</form>
</div>