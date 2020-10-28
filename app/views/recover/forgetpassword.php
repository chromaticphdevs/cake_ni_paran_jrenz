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

      <div class="ui eigth wide segment">
        <form class="ui form" method ="post" action="/recover/fireForgetPassword">
          <div class="field">
            <label>Email</label>
            <input type="email" name="email" placeholder="firstname" class="form-control" required>
            <small>Enter your email , and we will send you confirmation to reset your password</small>
          </div>
          <button type="submit" class="positive ui button">Send</button>
        </form>
      </div>
      
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>