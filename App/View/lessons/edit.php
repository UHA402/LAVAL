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
                <div class="panel panel-default">
                    <div class="panel-body containerEditForm">

                        <h1>Add/Edit Sequence</h1>
                        <form class="form-horizontal" method="post">
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input id="sequence[name]" name="sequence[name]" type="text" placeholder="Sequence's name"
                                               class="floating-label form-control input-md">
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <div class="togglebutton togglebutton-material-green">
                                            <label class="text-left">
                                                <input id="sequence[publish] name="sequence[publish]" type="checkbox" checked="">Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <select id="sequence[bricklist]" name="sequence[bricklist]" class="form-control" multiple>
                                            <option value="1">Liste des briques disponibles</option>
                                        </select>

                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" id="sequence[addbrick]" name="sequence[addbrick]" class="btn btn-flat btn-info btn-sm">add
                                        </button>
                                    </div>
                                </div>

                                <table id="brickTable" class="table table-striped table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Media</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Brick 1</td>
                                        <td>WAV</td>
                                        <td>fichier.wav</td>
                                        <td>
                                            <button class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Brick 2</td>
                                        <td>TTS</td>
                                        <td>BLA BLA BLA BLA</td>
                                        <td>
                                            <button class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="pagingBrick"></div>
                                <div class="form-group text-right">
                                    <button type="submit" id="sequence[save]" name="sequence[save]" class="btn btn-success">Save
                                    </button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <h1>Sequence list</h1>
                <table id="lessonTable" class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Bricks</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sequence 1</td>
                        <td>34</td>
                        <td>
                            <button class="btn btn-flat btn-info btn-sm btn-td">edit</button>
                            <button class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sequence 2</td>
                        <td>55</td>
                        <td>
                            <button class="btn btn-flat btn-info btn-sm btn-td">edit</button>
                            <button class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="pagingLesson"></div>
            </div>

        </div>
    </div>
</div>