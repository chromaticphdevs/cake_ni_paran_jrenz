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
					<form method="POST" action="/cakeCategory/create" class="ui form" enctype="multipart/form-data">
			          <div class="col col-sm-6 col-md-6 col-lg-6">
			          	<div class="two fields">
			          		<div class="field">
			          			<label>Category</label>
			          			<input type="text" placeholder="ex.( Birthday , Debut )" class="form-control" name="name">
			          		</div>
			          		<div class="field">
			          			<label>Category Picture</label>
			          			<input type="file" name="image">
			          			<small class="ui red">Optional</small>
			          		</div>
			          	</div>
			          	<div class="field">
			          		<label>Description</label>
			          		<textarea class="form-control" rows="20" style="resize: none;" name="desc"></textarea>
			          	</div>
			          	<button class="ui button positive">Add Category</button>
			          </form>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>