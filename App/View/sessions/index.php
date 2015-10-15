<div>
	<div class="container">
		<header class="page-header">
			<h1 class="text-center">La page des sessions</h1>
		</header>
		<div class="row">
			<div class="col-sm-12">
				<?php
					if (isset($_SESSION["idSession"]))
					{
						if ($_SESSION["idSession"] === null)
							echo '<form method="POST" action="'.Help::getNbDir().'sessions/CreateSession" class="">';
						else
							echo '<form method="POST" action="'.Help::getNbDir().'sessions/UpdateSession/'.$_SESSION["idSession"].'" class="">';
					}
					else
						echo '<form method="POST" action="'.Help::getNbDir().'sessions/CreateSession" class="">';
				?>
					<div class="row">
						<div class="form-group">
							<div class="row">
								<label for="inputNameSession" class="col-sm-2 col-sm-offset-5 text-center">Nom de la Session</label>
							</div>
							<div class="col-sm-4 col-sm-offset-4">
							<?php
								if (isset($_SESSION["titleSession"]))
								{
									if ($_SESSION["titleSession"] != "")
										echo '<input type="text" name="nameSession" class="form-control" value="'.$_SESSION["titleSession"].'">';
									else
										echo '<input type="text" name="nameSession" class="form-control">';
								}
								else
									echo '<input type="text" name="nameSession" class="form-control">';
							?>
							</div>
						</div>
					</div>
						<div class="form-group">
							<div class="col-sm-12">
							<?php
								if (isset($_SESSION["idSession"]))
								{
									if ($_SESSION["idSession"] === null)
										echo '<button type="submit" class="btn btn-default col-sm-2 col-sm-offset-5">Créer la session</button>';
									else
										echo '<button type="submit" class="btn btn-default col-sm-2 col-sm-offset-5">Modifier la session</button>';
								}
								else
									echo '<button type="submit" class="btn btn-default col-sm-2 col-sm-offset-5">Créer la session</button>';

							?>
							</div>
						</div>
					<div class="row">
						<div class="form-group">
							<div class="row">
								<label for="outputLogSession" class="col-sm-2 col-sm-offset-5 text-center">Log</label>
							</div>
							<div class="col-sm-4 col-sm-offset-4">
							<?php
								if (isset($_SESSION["log"]) && $_SESSION["log"] != "")
									echo '<input type="text" name="logSession" class="form-control text-center" value="'.$_SESSION["log"].'">';
								else
									echo '<input type="text" name="logSession" class="form-control text-center">';
							?>
							</div>
						</div>
					</div>
					<div class="row" id="espace"></div>
					<div class="row">
						<div class="form-group">
							<div class="col-sm-12">
							<?php
								if ($this->msg != "")
								{
									if (isset($_SESSION["nbSession"]) && $_SESSION["nbSession"] != "")
									{
										if (gettype($this->msg) === "array")
										{
											foreach ($this->msg as $index=>$value)
											{
												echo '<div class="row">';
													echo '<button type="button" class="btn btn-default col-sm-1 col-sm-offset-2" onclick="window.location.href=\''.Help::getNbDir().'sessions/DeleteSession/'.$index.'\'">X</button>';
													echo '<div class="col-sm-2">';
														echo '<input type="text" name="title" class="form-control text-center" value="'.$value.'">';
													echo '</div>';
													echo '<button type="button" class="btn btn-default col-sm-1" onclick="window.location.href=\''.Help::getNbDir().'sessions/'.$index.'\'">Modifier</button>';
												echo '</div>';

											}
										}
									}
								}
							?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
