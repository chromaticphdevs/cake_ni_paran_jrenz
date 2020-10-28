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
				<section>
					<?php Flash::show();?>
					<form class="ui form" method="post" action="/cake/updateGeneral">
			    	<h4 class="ui dividing header">Cake Details</h4>
			    	<input type="hidden" name="cakeid" value="<?php echo $cakeid ?>">
				    <div class="two fields">
				    	<div class="field">
				    	  <label>Name</label>
				          <input type="text" name="name" class="form-control" placeholder="Enter Name Cake" 
				          value="<?php echo $cake->name ?>">
				    	</div>
				    	<div class="field">
					      <label>Category</label>
					      <select class="form-control" name="category">
					      	<?php foreach($categoryList as $category):?>
					      	<?php $select = $category->id == $cake->catid ? 'selected' : '';?>
					        	<option value="<?php echo $category->id?>" <?php echo $select;?>><?php echo $category->catName;?></option>
					    	<?php endforeach;?>
					      </select>
				    	</div>
				    </div>

				    <div class="three fields">
				    	<div class="field">
				    		<label>Flavor</label>
			                <input type="text" name="flavor" class="form-control" placeholder="Enter Cake Flavor" 
			                value="<?php echo $cake->flavor ?>">
				    	</div>
				    	<div class="field">
				    		<label>Duration</label>
			                <input type="text" name="duration" class="form-control" placeholder="Enter Cake Flavor" 
			                value="<?php echo $cake->duration ?>">
				    	</div>
				    	<div class="field">
				    		<label>Price</label>
			                <input type="number" name="price" class="form-control" placeholder="Enter Cake Price" 
			                value="<?php echo $cake->price ?>">
				    	</div>
				    </div>

				    <div class="field">
				    	<label>Description</label>
			            <textarea class="form-control" rows="12" name="cakeDesc" style="resize: none;"><?php echo $cake->cakeDesc ?></textarea>
				    </div>
				   <button type="submit" class="positive ui button">Update general</button>
				</form>

				<h4 class="ui dividing header">Cake Picture Update</h4>
				<div>
					<img src="<?php echo URL.DS.'assets/'.$cake->image?>" style="width: 370px;">
				</div>
				
				<form method="post" action="/cake/updateImage" enctype="multipart/form-data">
					<input type="hidden" name="cakeid" value="<?php echo $cakeid?>">
					<input type="file" name="image">
					<button type="submit" class="positive ui button">Update general</button>
				</form>
				</section>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>