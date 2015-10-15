<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>BRIQUES</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">

                <div class="formulaire">
                    <form class="form-horizontal" method="post">
                        <fieldset>

                            <div class="col-md-6">
                                <!-- Text input-->
                                <div class="form-group editBricks">
                                    <select id="bricks[type]" name="bricks[type]" class="form-control">
                                        <option value="1">Brique 1</option>
                                        <option value="2">Brique 2</option>
                                        <option value="2">Brique 3</option>
                                        <option value="2">Brique 4</option>
                                        <option value="2">Brique 5</option>
                                    </select>
                                </div>
                                <div class="form-group editBricks"
                                ">
                                <input id="nameInput" name="bricks[name]" type="text" placeholder="Nom de la brique"
                                       class="floating-label form-control input-md">
                            </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group editBricks"
                    ">
                    <input id="nameInput" name="bricks[data]" type="text"
                           placeholder="Text de la brique" class="floating-label form-control input-md">
                </div>
                <div class="form-group editBricks"
                ">
                <input id="filebutton" name="filebutton" class="btn btn-primary btn-sm" type="file">
            </div>
        </div>
        <!-- Button (Double) -->
        <div class="form-group text-center">
            <button type="submit" id="button1id" name="button1id" class="btn btn-info">
                Sauvegarder
            </button>
        </div>

        </fieldset>
        </form>

        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Média</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Brique 1</td>
                <td>MIDI</td>
                <td>fichier.midi</td>
                <td>
                    <button class="btn btn-info btn-sm">Editer</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Brique 2</td>
                <td>TTS</td>
                <td>TEXT TEXT TEXT TEXT</td>
                <td>
                    <button class="btn btn-info btn-sm">Editer</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="text-right">
            <button id="button2id" name="button2id" class="btn btn-success">Valider</button>
        </div>
    </div>
</div>
</div>
</div>
</div>
