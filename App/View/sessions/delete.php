<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>SESSIONS</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">
				<h1>Suppresion de la session</h1>

				<p>Confirmer la suppresion de <strong><?php echo $_SESSION["titleSession"]; ?></strong></p>
				<a href="<?php echo URL ?>session/edit">
					<button class="btn btn-success">Annuler</button>
				</a>
				<a href="<?php echo URL ?>session/delete/<?php echo $_SESSION["idSession"]."/yes"; ?>">
					<button type="button" class="btn btn-danger">Confirmer</button>
				</a>
            </div>
        </div>
    </div>
</div>
