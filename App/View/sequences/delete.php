<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">

                <h1>SEQUENCES</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">
                <h1>Suppresion de la sequence</h1>

                <p>Confirmer la suppresion de <strong><?php echo $this->sequence['0']['title']; ?></strong></p>
                <a href="<?php echo URL ;?>sequence/edit">
                    <button type="button" class="btn btn-success">Annuler</button>
                </a>
                <a href="<?php echo URL ;?>sequence/delete/<?php echo $this->brick_id.'/'.$this->token; ?>">
                <button type="submit" class="btn btn-danger">Confirmer</button>
                </a>
            </div>
        </div>
    </div>
</div>