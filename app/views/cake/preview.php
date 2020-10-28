<?php require_once THEMEVIEW.DS.'header.php';?>
<style type="text/css">
	.list-unstyled 
	{
		margin: 0px;
		padding: 0px;
	}
	.list-unstyled li
	{
		list-style: none;
	}
</style>
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
					  <div>
					  	<img src="<?php echo URL.DS.'assets/'.$cake->image?>" style="width: 370px;">
					  </div>

					   <div>
					   		<h3><?php echo $cake->name?> (<?php echo $cake->flavor?>)</h3>
					   		Category : <label class="ui label"><?php echo $cake->catName?></label>
					   		<div>
					   			<ul class="list-unstyled">
					   				<li>Price : <?php echo $cake->price?></li>
					   				<li>Duration : <?php echo $cake->duration?></li>
					   				<li><a href="/cake/edit/<?php echo $cake->id?>" class="ui button">Edit</a></li>
					   			</ul>
					   		</div>

					   		<article>
					   			<p><?php echo $cake->cakeDesc?></p>
					   		</article>
					   </div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>