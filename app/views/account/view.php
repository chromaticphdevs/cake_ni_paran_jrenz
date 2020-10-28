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
			<div class="ui main text container">
				<?php Flash::show();?>
			    <h1 class="ui header"><?php echo $user->username;?></h1>
			    <p><?php echo $user->fname . ' '.$user->lname;?></p>
			    <p><?php echo $user->bday;?></p>
			    <p><?php echo $user->gen;?></p>
			    <ul>
			    	<li>Mobile : <strong><?php echo $user->phone;?></strong></li>
			    	<li>Email : <strong><?php echo $user->email;?></strong></li>
			    	<li>Address : <strong><?php echo $user->address;?></strong></li>
			    </ul>

			    <form class="ui form">
			    	<fieldset>
			    		<legend>Change Password</legend>
				    	<div class="field">
				    		<label>Password</label>
				    		<input type="text" name="password" placeholder="Change Password">
				    	</div>

				    	<button class="ui button basic positive">Change Password</button>
			    	</fieldset>
			    </form>
			</div>
		</div>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>