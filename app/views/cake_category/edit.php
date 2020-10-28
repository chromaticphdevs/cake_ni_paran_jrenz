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
					<section>
						<?php Flash::show();?>
						<form method="POST" action="/cakeCategory/update" class="ui form">
				          <div class="col col-sm-6 col-md-6 col-lg-6">
				            <input type="hidden" value="<?php echo $category->id ?>" name="categoryid">
				            <div class="field">
				            	<label>Cake Category Name</label>
				            	<input type="text" placeholder="ex.( Birthday , Debut )" class="form-control" 
				            	name="name" value="<?php echo $category->catName ?>">
				            </div>

				            <div class="field">
				            	<label>Cake Description</label>
				            	<textarea class="form-control" rows="20" style="resize: none;" name="desc"><?php echo $category->catDesc ?></textarea>
				            </div>

				            <input type="submit" class="ui button blue" value="Update">
				          </div>
				        </form>

			        	<div class="ui divider"></div>

			        	<div style="width: 350px;">
			        		<img src="<?php echo URL.DS.'assets/'.$category->image?>" style="width:100%;">
			        	</div>
			        	<form method="post" action="/cakeCategory/updateImage" enctype="multipart/form-data">
			        		<legend>Change Image</legend>
			        		<input type="hidden" value="<?php echo $category->id ?>" name="categoryid">
			        		<input type="file" name="image">
			        		<input type="submit" name="" class="ui button blue" value="Update">
			        	</form>
					</section>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>