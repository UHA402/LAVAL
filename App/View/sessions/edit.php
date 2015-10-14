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
                        style="top: 18px; position: relative; left: 12px" />
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">


                <form class="form-horizontal" method="post">
    <fieldset>

        <!-- Text input-->
        <div class="form-group">
                <input id="nameInput" name="session[name]" type="text" placeholder="Nom de la session" class="floating-label form-control input-md">
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
                <button type="submit" id="button1id" name="button1id" class="btn btn-info">Sauvegarder</button>
        </div>

    </fieldset>
</form>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Session 1</td>
                        <td>
                            <button class="btn btn-info btn-sm">Editer</button>
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Session 2</td>
                        <td>
                            <button class="btn btn-info btn-sm">Editer</button>
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                <div class="text-right">
                    <button id="button2id" name="button2id" class="btn btn-success">Valider</button>
                </div>
                </div>

            </div>
        </div>
    </div>