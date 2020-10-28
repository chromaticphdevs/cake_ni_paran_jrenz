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
      <?php Flash::show();?>
      <form class="ui form" method ="post" action="/user/login">
        <div class="field">
          <label>Username</label>
          <input type="text" name="username" placeholder="firstname" class="form-control" required>
        </div>
        <div class="field">
          <label>Password</label>
          <input type="password" name="password" placeholder="lastname" class="form-control">
        </div>

        <div class="field">
        	<a href="/recover/forgetpassword">Forgot Password</a>
        </div>
        <button type="submit" class="positive ui button">Login</button>
      </form>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>