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
            <table class="ui celled padded table">
              <thead>
                  <tr>
                      <th>Cake Name</th>
                      <th>Picture</th>
                      <th>Cake Category</th>
                      <th>Flavor</th>
                      <th>Duration</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Availability</th>
                      <th>Action</th>
                  </tr>
              </thead>          
              <tbody>
                <?php foreach($cakeList as $cakes) :?>

                  <tr>
                    <td><?php echo $cakes->name ?></td>
                    <td><img src="<?php echo URL.DS.'assets/'.$cakes->image?>" style="width: 90px;"></td>
                    <td><?php echo $cakes->catName ?></td>
                    <td><?php echo $cakes->flavor ?></td>
                    <td><?php echo $cakes->duration ?></td>
                    <td id="desc"><?php echo cropSentence($cakes->cakeDesc, 30) ?></td>
                    <td><?php echo $cakes->price ?></td>
                    <td><?php echo $cakes->availability ?></td>
                    <td><?php anchor('cake/preview/'.$cakes->id , 'Preview' , 'Preview Page' , '.btn btn-link') ?></td>

                  </tr>

                <?php endforeach ?>
              </tbody>
            </table>
          </section>
				</div>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>