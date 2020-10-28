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
		</div>
	</header>
	<main>
		<div class="ui container">
			<div class="ui grid">
				<?php require_once THEMEVIEW.DS.'admin/sidebar.php';?>
				<div class="twelve wide column">.
					<?php Flash::show();?>
					<?php $details = $order['details'];?>
					<?php $items   = $order['items'];?>
					<?php if($details->status == 'pending'):?>
					<div class="ui segment">
						<h3 class="ui left floated header">Controls</h3>
						<div class="ui clearing divider"></div>
						<form method="post" action="/order/process" class="ui form" >
							<input type="hidden" name="orderid" value="<?php echo $details->id?>">
							<div class="field">
								<input type="submit" name="accept" value="Accept Order" class="ui teal button">
								<input type="submit" name="decline" value="Decline Order" class="ui negative button">
							</div>
						</form>
					</div>
					<?php endif;?>

					<?php if($details->status == 'accepted'):?>
					<div class="ui segment">
						<h3 class="ui left floated header">Controls</h3>
						<div class="ui clearing divider"></div>
						<form method="post" action="/order/process" class="ui form" >
							<input type="hidden" name="orderid" value="<?php echo $details->id?>">
							<div class="field">
								<input type="submit" name="deliver" value="Deliver Order" class="ui teal button">
							</div>
						</form>
					</div>
					<?php endif;?>

					<?php if($details->status == 'delivered'):?>
					<div class="ui segment">
						<h3 class="ui left floated header">Controls</h3>
						<div class="ui clearing divider"></div>
						<form method="post" action="/order/process" class="ui form" >
							<input type="hidden" name="orderid" value="<?php echo $details->id?>">
							<div class="field">
								<input type="submit" name="sold" value="Sold" class="ui teal button">
							</div>
						</form>
					</div>
					<?php endif;?>
					<div class="ui segment">
					  <h2 class="ui left floated header">Order Invoice</h2>
					  <span class="ui teal label"><?php echo $details->status?></span>
					  <div class="ui clearing divider"></div>
					  <div>Date : <strong><?php echo $details->dateFormat?></strong></div>
					  <div>Customer : <strong><?php echo $details->customerName?></strong></div>
					  <div>Mobile : <strong><?php echo $details->contactNumber?></strong></div>
					  <div>Delivery Address : <strong><?php echo $details->deliverAddress?></strong></div>
					  <div>Customer Notes: <strong><?php echo $details->note?></strong></div>
					</div>

					<div class="ui segment">
						<h3 class="ui left floated header">Particulars</h3>
						<div class="ui clearing divider"></div>
						<?php $total = 0;?>
						<table class="ui very basic table">
							<thead>
								<th>Cake</th>
								<th>Image</th>
								<th>Flavor</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Total</th>
							</thead>
							<tbody>
								<?php foreach($items as $item) :?>
									<?php $total += $item->total;?>
									<tr>
										<td><?php echo $item->name?></td>
										<td>
											<img src="<?php echo URL.DS.'public/assets/'.$item->image?>" 
											style="width: 75px;">
										</td>
										<td><?php echo $item->flavor?></td>
										<td><?php echo $item->quantity?></td>
										<td><?php echo $item->price?></td>
										<td><?php echo $item->total?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
						<h3>Total : <?php echo to_money($total)?></h3>
					</div>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>