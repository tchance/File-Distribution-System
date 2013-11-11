<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!DOCTYPE html>
	<title>
		Indiana Standards Laboratory | Certification Retrieval
	</title>

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		echo $this->Html->script('modernizr');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<div class="container">
	<!-- top bar -->
	 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner" >
        <div class="container">
        		<a class="brand" href="http://www.indianastandards.com/">&nbsp<img src="http://www.tylerscottchance.com/files/brand.png"></a>
				<ul class="nav">
					<li><a href="http://www.indianastandards.com/">Home</a></li>
					<li><a href="http://http://www.indianastandards.com/?page_id=5">Capabilities</a></li>
					<li><a href="http://www.l-a-b.com/sites/default/files/Indiana%20Standards%20Laboratory%20Certificate%20of%20Accreditation%2011-3-09.pdf">Accreditation</a></li>
					<li><a href="http://www.indianastandards.com/?page_id=9">FAQ/Resources</a></li>
					<li><a href="http://www.indianastandards.com/?page_id=11">Contact</a></li>
        		</div>
       		</div>
	</div>
	<!-- end top bar -->
	
	
		<div class="container" style="margin-top:60px">
			<div class="row" >
				<div class="span16" id="flash">		
				<?php echo $this->Session->flash(); ?>
				<br>
				</div>
			</div>
			
			<div class="row">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<br><br>
		<hr>
	<!-- begin footer -->
		<footer>
			&copy; Indiana Standards Laboratory | 2919 S Shelby Street, Indianapolis, Indiana, 46203-5236 | phone: (317) 787-6578 | fax: (317) 787-6580
		</footer>
	<!-- end footer -->
	<?php if ($admin): ?>
	<br><br><br>
	<h3>SQL RUN FOR THIS PAGE</h3>
	<?php echo $this->element('sql_dump'); ?>
	<?php endif ?>
</div>
</body>
</html>