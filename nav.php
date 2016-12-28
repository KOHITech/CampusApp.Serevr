
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="img/logo.png" class="ecc" alt="logo_ECC" /></a>
    </div>
    <?php
    	if (!$connected) {
    ?>
		<button type="button" class="b1 btn btn-default" onclick="document.location.href='?method=login';">Connexion</button>
    <?php
    	} else {
    ?>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Dashboard</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>Bureau des élèves</li>
			</ul>
		</div>
    <?php
    	} 
    ?>

  </div>
</nav>