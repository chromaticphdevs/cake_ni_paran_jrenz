<?php require_once THEMEVIEW.DS.'header.php';?>
<style type="text/css">
	table img
	{
		width: 100px;
		height: 100px;
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
					<table class="ui celled padded table">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($cakeCategory as $cat) :?>
                          <tr>
                            <td><?php echo $cat->catName ?></td>
                            <td><img src="<?php echo URL.DS.'assets/'.$cat->image?>"></td>
                            <td><?php echo cropSentence($cat->catDesc, 100) ?></td>
                            <td><?php anchor('cakeCategory/edit/'.$cat->id , 'View' , 'View Category Name'  , '.btn btn-link') ?></td>
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