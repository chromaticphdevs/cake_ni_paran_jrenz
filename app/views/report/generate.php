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
			<div class="ui grid">
				<form class="ui form eight wide column segment" method="post" action="/report/generate">
				  <div class="two fields">
				    <div class="field">
				      <label>Start Date</label>
				      <input type="date" name="start" placeholder="Read Only" type="text">
				    </div>
				    <div class="field">
				      <label>End Date</label>
				      <input type="date" name="end" placeholder="Read Only" type="text">
				    </div>
				  </div>

				  <div class="field">
				  	<button type="submit" class="ui basic button positive">Generate</button>
				  </div>
				</form>
			</div>
			
		</div>
	</main>
<?php require_once THEMEVIEW.DS.'footer.php';?>