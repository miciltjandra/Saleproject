<?php $user = $_GET['id_active'];?>
<div class="middle fix">
	<div style="text-align: right">Hi username</div><br>
	<div style="text-align: right">logout</div><br>
</div>
<ul id="tab">
<li><a href="catalog.php?id_active=<?php echo $user;?>" 		<?php if (strpos($_SERVER['PHP_SELF'], 'catalog.php')) echo 'class="active"'; ?> 		>Catalog</a></li>
<li><a href="yourproducts.php?id_active=<?php echo $user;?>" 	<?php if (strpos($_SERVER['PHP_SELF'], 'yourproducts.php')) echo 'class="active"'; ?> 	>Your Products</a></li>
<li><a href="addproduct.php?id_active=<?php echo $user;?>" 	<?php if (strpos($_SERVER['PHP_SELF'], 'addproduct.php')) echo 'class="active"'; ?> 	>Add Product</a></li>
<li><a href="sales.php?id_active=<?php echo $user;?>" 		<?php if (strpos($_SERVER['PHP_SELF'], 'sales.php')) echo 'class="active"'; ?>			>Sales</a></li>
<li><a href="purchases.php?id_active=<?php echo $user;?>" 	<?php if (strpos($_SERVER['PHP_SELF'], 'purchases.php')) echo 'class="active"'; ?>		>Purchases</a></li>
</ul>
<br><br>
