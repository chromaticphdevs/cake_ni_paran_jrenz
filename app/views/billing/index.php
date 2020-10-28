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
				<?php Flash::show();?>
			</div>
		</div>
	</header>


	<main>
		
		<div class="ui container">
			<div class="ui grid">
				
				<section class="eleven wide column">
					<div class="ui segment">
						<h3>Cart Items</h3>
						<div class="ui unstackable items">
							<!--- -->
							<?php foreach($cartItemList as $item):?>
							<div class="item">
							    <div class="image">
							      <img src="<?php echo URL.DS.'public/assets/'.$item->image;?>">
							    </div>
							    <div class="content">
							      <a class="header"><?php echo $item->name;?></a>
							      <div class="meta">
							        <span><?php echo $item->catName;?></span>
							      </div>
							      <div class="description">
							        <p><?php echo cropSentence($item->cakeDesc, 50);?></p>
							      </div>
							      <div class="extra">
							        <div>Price : <?php echo $item->price;?></div>
							        <div>Bake Time : <?php echo $item->duration;?></div>
							      </div>
							    </div>

							    <div class="form">
							    	<form method="post" action="cart/updateItem">
							    		<input type="hidden" name="itemid" value="<?php echo $item->itemid?>">
							    		<div>
							    			Qty : <input type="text" name="quantity" value="<?php echo $item->quantity;?>">
							    			<div class="ui divider"></div>
							    		</div>
							    		<div>
								    		<button type="submit" name="updateItem" class="mini ui primary button" title="Update Quantity">
								    			<i class="undo icon"></i>
								    		</button>
								    		<button type="submit" name="removeItem" class="mini ui red button" title="Remove Item">
								    			<i class="trash icon"></i>
								    		</button>
							    		</div>
							    	</form>
							    </div>
							 </div>
							<?php endforeach;?>
							<!-- -->
						</div>
					</div>
				</section>

				<section class="five wide column">
					<div class="ui segment">
						<h3>Billing Info</h3>
						<form class="ui form" method="POST" action="/billing/checkout">
							<div class="field">

								<label>Customer Name</label>
								<input type="text" name="customername" placeholder="Customer Name" required 
								value="<?php echo $user->fullname ?? ''?>">
							</div>
							<div class="field">
								<label>Deliver Address</label>
								<input type="text" name="deliverAddress" placeholder="Your address" required 
								value="<?php echo $user->address ?? ''?>">
							</div>
							<div class="field">
								<label>Phone</label>
								<input type="number" name="contactNumber" placeholder="eg. 09xxxxxxxxx" required 
								value="<?php echo $user->phone ?? ''?>">
							</div>
							<div class="field">
								<label>Email</label>
								<input type="email" name="email" required 
								value="<?php echo $user->email ?? ''?>">
							</div>
							<div class="field">
								<label>Note</label>
								<input type="text" name="note" placeholder="Note" required>
							</div>

							<div class="field">
								<label>Total</label>
								<input type="text" name="" value="<?php echo $cartAmountTotal?>" readonly>
							</div>
							<div class="field">
								<label>
									<input type="checkbox" name="" required>
									<small>By Checking here you are confirming your order.</small>
								</label>
							</div>
							<?php if($cartAmountTotal > 0 ) :?>
								<div class="field">
									<input type="submit" name="" class="ui button teal medium" value="Submit Order">
								</div>
							<?php else:?>
								<div class="field">
									<p>Total is 0 you cannot bill out</p>
								</div>
							<?php endif;?>
						</form>
					</div>
				</section>
			</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>