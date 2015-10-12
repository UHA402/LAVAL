<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Form Name -->
        <legend>Création d'une session</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Text Input</label>
            <div class="col-md-4">
                <input id="nameInput" name="session[name]" type="text" placeholder="Nom de la session" class="form-control input-md">
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="button1id">Double Button</label>
            <div class="col-md-8">
                <button type="submit" id="button1id" name="button1id" class="btn btn-success">Ajouter</button>
                <button id="button2id" name="button2id" class="btn btn-danger">Annuler</button>
            </div>
        </div>

    </fieldset>
</form>