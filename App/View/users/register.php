<div class="container contcolor continscription">
	<div id="deco_blanc3"></div>
	<div class="col-sm-12 cadre">
		<div class="entete"></div>
		<div class="panel">

			<div class="panel-heading enteteInscription">
				<h1>INSCRIPTION</h1>
				<div class="cercle">
					<img src="http://localhost/github/LAVAL/public/img/new_membre.png"
						alt="logo" height="63px" width="71px"
						style="top: 18px; position: relative; left: 15px" />
				</div>
			</div>
			<div class="panel-body panelCategorie">
				<form class="form-horizontal formConnexion" data-toggle="validator"
					role="form">
					<fieldset>

						<div class="form-group">
							<input type="text" class="form-control floating-label"
								id="inputName" placeholder="Nom" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control floating-label"
								id="inputFirstName" placeholder="Prénom" required>
						</div>

						<div class="form-group has-error">
							<input type="email" maxlength="40"
								class="form-control floating-label" id="inputEmail"
								pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"
								placeholder="Email" required>
						</div>

						<div class="form-group">
							<input type="password" data-minlength="6" maxlength="40"
								class="form-control floating-label" id="inputPassword"
								placeholder="Mot de passe" required>
						</div>

						<div class="form-group">
							<input type="password" data-match="#inputPassword"
								data-minlength="6" maxlength="40"
								class="form-control floating-label" id="inputPasswordConfirm"
								placeholder="Confirmer mot de passe" required>
						</div>

						<div class="form-group text-right ">
							<button type="submit" class="btn btn-sm btn-material-teal-200">Valider</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>