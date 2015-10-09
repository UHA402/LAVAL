	<div class="container contcolor ">
		<div id="deco_blanc3"></div>
		<div class="col-sm-4 cadre">
			<div class="entete"></div>
			<div class="panel">
				<div class="panel-heading enteteFlou">
					<h1>LAVAL</h1>
					<div class="cercle">
						<img
							src="<?php echo URL ?>public/img/logo.png"
							alt="logo" height="37px" width="66px"
							style="top: 26px; position: relative; left: 17px" />
					</div>
				</div>
				<div class="panel-body panelCategorie">
					<h1>Description du projet</h1>
					<p>Sed ornare urna sit amet leo sollicitudin mattis. Donec sit amet
						odio a urna blandit volutpat eget a risus. Fusce non dui varius,
						rutrum nisi ultrices, sodales ex. Donec vel lectus enim. Interdum
						et malesuada fames ac ante ipsum primis in faucibus. Nunc tempor
						enim non lacus vulputate, ut viverra metus elementum.</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 cadre">
			<div class="entete"></div>
			<div class="panel">
				<div class="panel-heading enteteFlou">
					<h1>CONTACT</h1>
					<div class="cercle">
						<img
							src="<?php echo URL ?>public/img/support.png"
							alt="logo" height="67px" width="68px"
							style="top: 18px; position: relative; left: 16px" />
					</div>
				</div>
				<div class="panel-body panelCategorie">
					<h1>Contactez-nous</h1>
					<p>Sed ornare urna sit amet leo sollissssscitudin mattis. Donec sit
						amet odio a urna blandit volutpat eget a risus. Fusce non dui
						varius, rutrum nisi ultrices, sodales ex. Donec vel lectus enim.
						Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc
						tempor enim non lacus vulputate, ut viverra metus elementum.</p>
				</div>
			</div>
		</div>
		<div class="col-sm-4 cadre">
			<div class="entete"></div>
			<div class="panel">
				<div class="panel-heading enteteFlou">
					<h1>CONNEXION</h1>
					<div class="cercle">
						<img
							src="<?php echo URL ?>public/img/connexion.png"
							alt="logo" height="63px" width="71px"
							style="top: 18px; position: relative; left: 12px" />
					</div>
				</div>
				<div class="panel-body panelCategorie">
					<h1>Se connecter</h1>
					<form class="form-horizontal formConnexion">
						<fieldset>
							<div class="form-group">
								<input name="user[mail]" type="email" class="form-control" id="inputEmail"
									placeholder="Email">
							</div>
							<div class="form-group">
								<input name="user[password]" type="password" class="form-control" id="inputPassword"
									placeholder="Password"> <a href="#"><span
									class="help-block text-right"><small>Mot de passe oublié.</small></span></a>
							</div>
							<div class="form-group">
								<div class="col-lg-6 creaCompteDiv">
									<button class="btn btn-raised btn-default btn-sm">
										<a class="creaCompte" href="#">Créer un compte</a>
									</button>
								</div>
								<div class="col-lg-6 text-right creaCompteDiv">
									<button type="submit" class="btn btn-sm btn-material-teal-200">Valider</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo URL ?>public/js/bootstrap.min.js"></script>
	<script
		src="<?php echo URL ?>public/bootstrap/js/material.min.js"></script>

	<script type="text/javascript">
$(document).ready(function() {
	$.material.init();
});
</script>

</body>
</html>