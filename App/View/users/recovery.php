<div class="container contcolor continscription">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>RECOVERY</h1>
                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px" />
                </div>
            </div>
            <div class="panel-body panelCategorie">
                <h1>Forget password</h1>
                <form method = "post" class="form-horizontal formConnexion" data-toggle="validator" role="form" action="user/recovery">
                    <fieldset>
                        <div class="form-group">
                            <input type="email" class="form-control" id="inputEmail"
                                   placeholder="Email" name="user[mail]" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required maxlength="40">
                        </div>
                            <div class="text-right creaCompteDiv">
                                <button type="submit" class="btn btn-sm btn-material-teal-200">Valider</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>