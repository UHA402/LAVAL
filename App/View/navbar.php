<body>
<?= $this->getFlash(); ?>
	<div class="navbar navbar-default">
		<div id="deco_blanc"></div>
		<div id="deco_blanc2"></div>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a href="<?php echo URL ?>" class="navbar-brand">LAVAL</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo URL ?>">Home</a></li>
					<li><a href="<?php echo URL ?>user/register">Sign up</a></li>
					<?php if(isset($_SESSION['user'])): ?>
						<?php if($_SESSION['user']['role'] == 'admin'): ?>
							<li><a href="<?php echo URL ?>sequence/edit">Sequences</a></li>
							<li><a href="<?php echo URL ?>brick/edit">Bricks</a></li>
							<li><a href="<?php echo URL ?>user/admin_index">Admin</a></li>
						<?php endif; ?>
							<li><a href="<?php echo URL ?>user/index"><i class="glyphicon glyphicon-user" ></i> <?php echo $_SESSION['user']['firstName']; ?></a></li>
							<li><a href="<?php echo URL ?>user/logout"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
				</div>
			</div>
		</div>
	</div>
