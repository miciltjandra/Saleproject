<div class="middle fix">
	<div style="text-align: right">Hi username</div><br>
	<div style="text-align: right">logout</div><br>
</div>
<ul id="tab">
<li><a href="catalog.php" 		<?php if (strpos($_SERVER['PHP_SELF'], 'catalog.php')) echo 'class="active"'; ?> 		>Catalog</a></li>
<li><a href="yourproducts.php" 	<?php if (strpos($_SERVER['PHP_SELF'], 'yourproducts.php')) echo 'class="active"'; ?> 	>Your Products</a></li>
<li><a href="addproduct.php" 	<?php if (strpos($_SERVER['PHP_SELF'], 'addproduct.php')) echo 'class="active"'; ?> 	>Add Product</a></li>
<li><a href="sales.php" 		<?php if (strpos($_SERVER['PHP_SELF'], 'sales.php')) echo 'class="active"'; ?>			>Sales</a></li>
<li><a href="purchases.php" 	<?php if (strpos($_SERVER['PHP_SELF'], 'purchases.php')) echo 'class="active"'; ?>		>Purchases</a></li>
</ul>
<br><br>
