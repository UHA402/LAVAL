<div class="container">
	<div class="panel panel-default">
		<div class="panel-body vertical-align">
			<div class="col-md-7 text-center">
				<h1>Connexion</h1>
				<p>Rentre profondément dans mon site</p>
			</div>
			<div class="col-md-4">
				<form method="post" class="form-horizontal" data-toggle="validator" action="/user/login">
					<fieldset>
						<legend class="text-center">Connexion</legend>
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
							<div class="col-lg-10 col-lg-offset-2">
								<button type="reset" class="btn btn-default">Annuler</button>
								<input type="submit" class="btn btn-primary" value="Envoyer"/>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>