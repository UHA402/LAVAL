<<<<<<< HEAD
	<div class="container contcolor">
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
					<form class="form-horizontal formConnexion" data-toggle="validator" role="form" action="user/login">
						<fieldset>
							<div class="form-group">
								<input type="email" class="form-control" id="inputEmail"
									placeholder="Email" name="user[mail]" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required maxlength="40">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="inputPassword"
									placeholder="Password" name="user[password]" required maxlength="30"><span
									class="help-block text-right"><a href="users/forgetpwd"><small>Mot de passe oublié ?</small></a></span>
							</div>
							<div class="form-group">
								<div class="col-sm-6 creaCompteDiv">
									<button class="btn btn-raised btn-default btn-sm">
										<a class="creaCompte" href="users/subscribe">Créer un compte</a>
									</button>
								</div>
								<div class="col-sm-6 text-right creaCompteDiv">
									<button type="submit" class="btn btn-sm btn-material-teal-200">Valider</button>
=======
<div class="container">
		<div class="panel panel-default">
			<div class="panel-body vertical-align">
				<div class="col-md-7 text-center">
					<h1>Projet LAVAL</h1>
					<p>Petit text de présentation du projet...</p>
					<p>
						<a class="btn btn-primary btn-md">En savoir plus...</a>
					</p>
				</div>
				<div class="col-md-4">
					<form method="post" class="form-horizontal" data-toggle="validator" action="user/register">
						<fieldset>
							<legend class="text-center">Inscription</legend>
							<div class="form-group">
								<label for="inputNom" class="col-lg-2 control-label">Nom</label>
								<div class="col-lg-10">
									<input type="text" name="user[lastName]" class="form-control" id="inputNom"
										placeholder="Nom" data-minlength="2"
										aria-describedby="inputNomStatus" required> <span
										class="glyphicon glyphicon-ok form-control-feedback"
										aria-hidden="true"></span> <span id="inputNomStatus"
										class="sr-only">(success)</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPrenom" class="col-lg-2 control-label">Prénom</label>
								<div class="col-lg-10">
									<input type="text" name="user[firstName]" class="form-control" id="inputPrenom"
										placeholder="Prénom" data-minlength="2" required> <span
										class="glyphicon glyphicon-ok form-control-feedback"
										aria-hidden="true"></span> <span id="inputNomStatus"
										class="sr-only">(success)</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-lg-2 control-label">Email</label>
								<div class="col-lg-10">
									<input type="email" name="user[mail]" class="form-control" id="inputEmail"
										placeholder="Email"
										pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
										required> <span
										class="glyphicon glyphicon-ok form-control-feedback"
										aria-hidden="true"></span> <span id="inputNomStatus"
										class="sr-only">(success)</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-lg-2 control-label">Password</label>
								<div class="col-lg-10">
									<input type="password" name="user[password]" class="form-control" id="inputPassword"
										placeholder="Mot de passe" data-minlength="6" required> <span
										class="glyphicon glyphicon-ok form-control-feedback"
										aria-hidden="true"></span> <span id="inputNomStatus"
										class="sr-only">(success)</span>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword2" class="col-lg-2 control-label">Vérification</label>
								<div class="col-lg-10">
									<input type="password" name="user[password2]" class="form-control" id="inputPassword2"
										placeholder="Vérification du mot de passe" data-minlength="6"
										data-match="#inputPassword" required> <span
										class="glyphicon glyphicon-ok form-control-feedback"
										aria-hidden="true"></span> <span id="inputNomStatus"
										class="sr-only">(success)</span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="reset" class="btn btn-default">Annuler</button>
									<input type="submit" class="btn btn-primary" value="Envoyer"/>
>>>>>>> develop
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
<<<<<<< HEAD
	</div>
=======
	</div>
>>>>>>> develop
