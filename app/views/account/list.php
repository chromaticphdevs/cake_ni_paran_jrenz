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
					<table class="ui celled padded table">
					   <thead>
                            <tr>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($accountList as $account) :?>

                            <tr>
                              <td><?php echo $account->username ?></td>
                              <td><?php echo $account->fullname ?></td>
                              <td><?php echo $account->phone ?></td>
                              <td><?php echo $account->email ?></td>
                              <td>
                              	<a href="/account/preview/<?php echo $account->id?>">View</a>
                              </td>

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