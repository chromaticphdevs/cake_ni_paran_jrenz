<?php require_once THEMEVIEW.DS.'header.php';?>

<style type="text/css">
	.card .image img 
	{
		width: 100%;
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
			<div class="ui link cards">
				<?php foreach($cakeList as $cake) :?>
				  <div class="card">
				    <div class="image">
				      <a href="/ItemView/<?php echo $cake->id?>">
				      	<img src="<?php echo URL.DS.'assets/'.$cake->image?>">
				      </a>
				    </div>
				    <div class="content">
				      <div class="header"><?php echo $cake->name?> (<?php echo $cake->flavor?>)</div>
				      <div class="meta">
				        <?php echo $cake->catName?>
				      </div>
				      <div class="description">
				        <?php echo cropSentence($cake->cakeDesc , 20)?>
				      </div>
				    </div>
				    <div class="extra content">
				      <span class="right floated">
				        Duration : <?php echo $cake->duration?>
				      </span>
				      <span>
				        <i class="money icon"></i>
				        Price : <?php echo $cake->price?>
				      </span>
				    </div>
				  </div>
				<?php endforeach;?>
			</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>