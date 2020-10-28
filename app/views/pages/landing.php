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
			<div class="ui divided items">
				<?php foreach($categoryList as $cat) :?>
					<div class="item">
					    <div class="image">
					      <img src="<?php echo URL.DS.'assets/'.$cat->image?>">
					    </div>
					    <div class="content">
					      <a class="header"><?php echo $cat->catName?></a>
					      <div class="meta">
					        <span class="cinema">Union Square 14</span>
					      </div>
					      <div class="description">
					        <p><?php echo $cat->catDesc?></p>
					      </div>
					      <div class="extra">
					      	<a href="/pages/catalog/?category=<?php echo $cat->catName?>"><label class="ui label">View</label></a>
					      </div>
					    </div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>