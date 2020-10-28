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
				<div class="twelve wide column">
					<div class="ui segment">
						<h4>Filter</h4>
						<div class="ui menu">
							<a href="/order/list" class="item">All</a>
							<a href="/order/list?status=pending" class="item">Pending</a> 
							<a href="/order/list?status=accepted" class="item">Accepted</a>
							<a href="/order/list?status=sold" class="item">Sold</a>
							<a href="/order/list?status=cancelled" class="item">Canceled</a>
							<a href="/order/list?status=delivered" class="item">Declined</a>
						</div>
					</div>
					<table class="ui celled padded table">
					   <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($orderList as $order) :?>

                            <tr>
                              <td><?php echo $order->customerName ?></td>
                              <td><?php echo $order->contactNumber ?></td>
                              <td><?php echo $order->dateFormat ?></td>
                              <td><?php echo $order->status ?></td>
                              <td><?php anchor('order/preview/'.$order->id , 'Preview' , 'Preview Page' , '.btn btn-link') ?></td>

                            </tr>

                          <?php endforeach ?>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>