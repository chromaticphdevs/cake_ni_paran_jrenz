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
      <h4 class="ui dividing header">Registration form</h4>
      <form class="ui form" action="/user/register" method="post">
        <?php Flash::show();?>
        <div class="field">
          <label>Name</label>
          <div class="two fields">
            <div class="field">
              <input type="text" name="fname" placeholder="firstname" class="ui input" required>
            </div>
            <div class="field">
              <input type="text" name="lname" placeholder="lastname" class="ui input">
            </div>
          </div>
        </div>
        <div class="field">
          <label>Contact</label>
          <div class="three fields">
            <div class="field">
               <input type="text" name="email" placeholder="email" class="ui input" required>
            </div>
             <div class="field">
               <input type="text" name="phone" placeholder="phone" class="ui input">
            </div>
            <div class="field">
              <input type="text" name="address" placeholder="address" class="ui input">
            </div>
          </div>
        </div>

        <div class="field">
          <label>Login</label>
          <div class="two fields">
            <div class="field">
              <input type="text" name="username" placeholder="username" class="ui input" required>
              <small>minimum of 5 characters required</small>
            </div>
            <div class="field">
              <input type="password" name="userpass" placeholder="userpass" class="ui input" required>
              <small>minimum of 4 characters required</small>
            </div>
          </div>
        </div>

        <button type="submit" class="positive ui button">Register</button>
      </form>
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>