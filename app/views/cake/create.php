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
							<form class="ui form" method="post" action="/cake/create" enctype="multipart/form-data">
						    	<h4 class="ui dividing header">Cake Details</h4>
							    <div class="two fields">
							    	<div class="field">
							    	  <label>Name</label>
							          <input type="text" name="name" class="form-control" placeholder="Enter Name Cake">
							    	</div>
							    	<div class="field">
								      <label>Category</label>
								      <select class="form-control" name="category">
								      	<?php foreach($categoryList as $category):?>
								      		<option value="<?php echo $category->id?>"><?php echo $category->catName?></option>
								      	<?php endforeach;?>
								      </select>
							    	</div>
							    </div>						 
							    <div class="three fields">
							    	<div class="field">
							    		<label>Flavor</label>
						                <input type="text" name="flavor" class="form-control" placeholder="Enter Cake Flavor">
							    	</div>
							    	<div class="field">
							    		<label>Price</label>
						                <input type="number" name="price" class="form-control" placeholder="Enter Cake Price">
							    	</div>
							    	<div class="field">
							    		<label>Bake Time</label>
						                <input type="text" name="duration" class="form-control" placeholder="3 Hours">
							    	</div>
							    </div>

							    <div class="field">
							    	<label>Description</label>
						            <textarea class="form-control" rows="12" name="desc" style="resize: none;"></textarea>
							    </div>

							    <div class="field">
							    	<label>Picture</label>
							    	<input type="file" name="image">
							    </div>
							   <button type="submit" class="positive ui button">Create</button>
							</form>
					</section>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>