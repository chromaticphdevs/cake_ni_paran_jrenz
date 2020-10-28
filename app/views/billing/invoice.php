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
							<div class="twelve wide column">
								<div class="ui segment">
								  <h2 class="ui left floated header">Order Invoice</h2>
								  <span class="ui teal label">Pending</span>

								  <?php $details = $order['details'];?>
								  <?php $items   = $order['items'];?>
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
							<!-- -->
						</div>
					</div>
				</section>
			</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>