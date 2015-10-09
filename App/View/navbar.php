	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">LAVAL</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">En savoir plus...</a></li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<?php if (isset($_SESSION['user'])): ?>
						<li><a class="btn" href="/user/logout"><?php if ($_SESSION['user']['role'] == 'admin') echo '[ADMIN] ' ?>Déconnexion</a></li>
					<?php else: ?>
					<li><a class="btn btn-primary" href="/user/login" data-toggle="modal"
						data-target="#login-modal">Login</a></li>
					<li><a class="btn" href="/user/register">Inscription</a></li>
					<?php endif; ?>
				</ul>

			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
	<?php echo $this->getFlash(); ?>