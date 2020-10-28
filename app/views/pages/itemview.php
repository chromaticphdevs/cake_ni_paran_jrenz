<?php require_once THEMEVIEW.DS.'header.php';?>
</head>
<body>
	<header>
		<?php require_once THEMEVIEW.DS.'navigation.php';?>
		<div class="ui container">
			<div id="pageBanner" style="width: 100%;">
				<div id="pageTitle">
					<h1><?php echo $title?></h1>
				</div>
			</div>
			<?php Flash::show();?>
		</div>
	</header>


	<main>
		<div class="ui container">
			<div class="ui segment">
			  <div class="ui two column very relaxed grid">
				   <div>
						<div class="content">
						  <div class="ui placeholder">
						    <div class="rectangular">
						    	<img src="<?php echo URL.DS.'assets/'.$product->image?>" style="width: 100%;">
						    </div>
						  </div>
						</div>
				   </div>

				   <div style="margin-left: 100px">
				   		<h3><?php echo $product->name?> (<?php echo $product->flavor?>)</h3>
				   		Category : <label class="ui label"><?php echo $product->catName?></label>
				   		<div>
				   			<ul>
				   				<li>Price : <?php echo $product->price?></li>
				   				<li>Duration : <?php echo $product->duration?></li>
				   			</ul>
				   		</div>

				   		<article>
				   			<p style="width: 500px;"><?php echo $product->cakeDesc?></p>
				   		</article>
				   		<div class="ui divider"></div>
				   		<form method="post" action="/cart/addItem">
							<input type="hidden" name="productid" value="<?php echo $product->id;?>">
				   			<fieldset>
				   				<legend>Add To Cart</legend>
						   			<div class="ui input focus">
									  <input type="number" placeholder="Quantity" name="quantity">
									</div>
						   			<input type="submit" name="" class="ui inverted green button" value="Add Item">
				   			</fieldset>
				   		</form>
				   </div>
			  </div>
			</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>