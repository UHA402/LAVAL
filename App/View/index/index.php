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
					<h1>Contact us</h1>
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
					<h1>SIGN IN</h1>
					<div class="cercle">
						<img
							src="<?php echo URL ?>public/img/connexion.png"
							alt="logo" height="63px" width="71px"
							style="top: 18px; position: relative; left: 12px" />
					</div>
				</div>
				<div class="panel-body panelCategorie">
					<h1>Login</h1>
					<form method = "post" class="form-horizontal formConnexion" data-toggle="validator" role="form" action="<?php echo URL ?>user/index">
						<fieldset>
							<div class="form-group">
								<input type="email" class="form-control" id="inputEmail"
									placeholder="Email" name="user[mail]" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required maxlength="40">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="inputPassword"
									placeholder="Password" name="user[password]" required maxlength="30"><span
									class="help-block text-right"><a href="user/recovery"><small>forget password ?</small></a></span>
							</div>
							<div class="form-group">
								<div class="col-sm-6 creaCompteDiv">
									<button class="btn btn-raised btn-default btn-sm">
										<a class="creaCompte" href="user/register">Sign Up</a>
									</button>
								</div>
								<div class="col-sm-6 text-right creaCompteDiv">
									<button type="submit" class="btn btn-sm btn-material-teal-200">connect</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
