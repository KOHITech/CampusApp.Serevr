
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
			<ul class="nav navbar-nav navbar-left">
                <li <?php if($page=="schedule") echo 'class="active"'; ?>><a href="?page=schedule">Schedule</a></li>
				<li <?php if($page=="dash") echo 'class="active"'; ?>><a href="?page=dash">Dashboard</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>Bureau des élèves</li>
        <li>-<a href="?method=signout">sign out</a>-</li>
			</ul>
		</div>
    <?php
    	} 
    ?>

  </div>
</nav>