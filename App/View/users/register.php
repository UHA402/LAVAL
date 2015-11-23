<div class="container contcolor continscription">
	<div id="deco_blanc3"></div>
	<div class="col-sm-12 cadre">
		<div class="entete"></div>
		<div class="panel">

			<div class="panel-heading enteteInscription">
				<h1>SIGN UP</h1>
				<div class="cercle">
					<img src="<?php echo URL ?>public/img/new_membre.png" alt="logo" height="63px" width="71px" style="top: 18px; position: relative; left: 15px" />
				</div>
			</div>
			<div class="panel-body panelCategorie">
				<form class="form-horizontal formConnexion" data-toggle="validator" role="form" method="POST">
					<fieldset>



						<div class="form-group">
							<input type="text" name="user[lastName]" class="form-control floating-label" id="inputName" placeholder="Last Name" required>
						</div>
						<div class="form-group">
							<input type="text" name="user[firstName]" class="form-control floating-label" id="inputFirstName" placeholder="First Name" required>
						</div>

						<div class="form-group has-error">
							<input type="email" name="user[mail]" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$" maxlength="40" class="form-control floating-label" id="inputEmail" placeholder="Email" required>
						</div>

						<div class="form-group">
							<input type="password" name="user[password]" data-minlength="6" maxlength="40" class="form-control floating-label" id="inputPassword" placeholder="Password" required>
						</div>

						<div class="form-group">
							<input type="password" name="user[password2]" data-match="#inputPassword" data-minlength="6" maxlength="40" class="form-control floating-label" id="inputPasswordConfirm" placeholder="Comfirm Password" required>
						</div>

						<div class="form-group text-right ">

							<button type="submit" class="btn btn-sm btn-material-teal-200">Submit</button>

						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>