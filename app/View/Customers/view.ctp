<div class="span10">
<a href="<?php echo $this->Html->url(array("controller" => "customers","action" => "index"));?>"><< Back to index</a>
<h2><?php echo $customer['Customer']['company_name'] ?></h2>
<h3><a href="mailto:<?php echo $customer['Customer']['email'] ?>"><?php echo $customer['Customer']['email'] ?></a></h3>

<?php echo $customer['Customer']['address_1'] ?><br>
	<?php if ($customer['Customer']['address_2'])
		{
		echo $customer['Customer']['address_2'].'<br>';
		echo $customer['Customer']['city'].', '.$customer['Customer']['state'].' '.$customer['Customer']['zip'].'<br>';
		}
		else 
		{
		echo $customer['Customer']['city'].', '.$customer['Customer']['state'].' '.$customer['Customer']['zip'].'<br>';
		}
	?>
	
	<?php if ($admin): ?>
	<hr>
	<a href="/cake2/customers/edit/<?php echo $customer['Customer']['id']; ?>">Edit contact information</a>&nbsp&nbsp |  &nbsp&nbsp<?php echo $this->Form->postLink(
                'Delete Customer',
                array('action' => 'delete', $customer['Customer']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
	<?php endif; ?>
	
	<hr>

	<?php if ($admin): ?>
	<a href="<?php echo 'http://www.tylerscottchance.com/cake2/customerfiles/batchupload/'.$customer['Customer']['id'] ?>">Add new records</a><br><br>
	<?php endif; ?>
	<table width="100%">
	<thead>
	<th>Test Number (click to view)</th>
	<th>Machine Number</th>
	<th>Date Created</th>
	<?php if ($admin): ?>
	<th>Delete record</th>
	<?php endif; ?>
	</thead>
<?php foreach ($files as $file): ?>
	
	<tr>
	
	<td>
	<a href="<?php echo $file['CustomerFile']['file_path'] ?>">
		<?php echo $this->Html->image('pdf_icon_small.gif'); ?><?php echo $file['CustomerFile']['test_number']?>
	</a>	
	</td>
	
	
	<td>
	
		<?php echo $file['CustomerFile']['machine_number'] ?>
	</td>
	
	<td>
	
		<?php echo $file['CustomerFile']['TIME_CREATED'] ?>
	</td>
	<?php if ($admin): ?>
	<td>
		<?php echo $this->Form->postLink(
                'Delete File',
                array('controller'=>'customerfiles','action' => 'delete', $file['CustomerFile']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
	</td>
	<?php endif; ?>
	</tr>
	
<?php endforeach; ?>

	</table>
	<br><br>
	<a href="<?php echo $this->Html->url(array("controller" => "customers","action" => "index"));?>"><< Back to index</a>
	<br><br><br>
</div>