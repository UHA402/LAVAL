<div class="container contcolor continscription">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>LOG IN</h1>
                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px" />
                </div>
            </div>
            <div class="panel-body panelCategorie">
                <h1>Log In</h1>
                <form method = "post" class="form-horizontal formConnexion" data-toggle="validator" role="form" action="<?php echo URL ?>user/index">
                    <fieldset>
                        <div class="form-group">
                            <input type="email" class="form-control" id="inputEmail"
                                   placeholder="Email" name="user[mail]" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required maxlength="40">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="inputPassword"
                                   placeholder="Password" name="user[password]" required maxlength="30"> <a href="<?php echo URL ?>user/recovery"><span
                                    class="help-block text-right"><small>Forget password</small></span></a>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 creaCompteDiv">
                                <a class="creaCompte" href="<?php echo URL ?>user/register">
                                    <button type="button" class="btn btn-raised btn-default btn-sm">Sign Up</button>
                                </a>
                            </div>
                            <div class="col-lg-6 text-right creaCompteDiv">
                                <button type="submit" class="btn btn-sm btn-material-teal-200">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>