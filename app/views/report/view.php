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
				<section id="reportView" class="ui nine wide column segment">
					<section>
						<h3 class="ui left floated header">Report</h3>
						<div class="ui clearing divider"></div>
					</section>

					<section id="particulars">
						<div>Report Date :
							<strong><?php echo $report['detail']['start'] . ' to ' . $report['detail']['end']?></strong>
						</div>
						<div>Income :
							<strong><?php echo to_money($report['totalAmount'])?></strong>
						</div>
						<h4 class="ui left floated header">Particulars</h4>
						<div class="ui clearing divider"></div>
						<table class="ui celled padded table">
							<thead>
								<th>Product</th>
								<th>Quantity</th>
								<th>Price</th>
							</thead>
							<tbody>
								<?php foreach($report['particulars'] as $item) :?>
									<tr>
										<td><?php echo $item->name?></td>
										<td><?php echo $item->total_quantity?></td>
										<td><?php echo $item->total_price?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</section>
				</section>
					<section>
						<h3 class="ui header">Extracting Report</h3>
						<p>
							Use your computer program tools.
						</p>
						<ol style="width: 300px;">
							<li><strong>Windows</strong></li>
							<li>Go to search Apps type "Snipping Tool"</li>
							<li>"Paint"
								<ol>
									<li>On your key board click the screenshot button , usually on the top right corner of your keyboard</li>
									<li>Go to paint press cntrl + v and then you will see the screen shot</li>
								</ol>
							</li>
						</ol>
					</section>
			</div>
			
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>