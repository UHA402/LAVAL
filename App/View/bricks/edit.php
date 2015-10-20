<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>BRICKS</h1>

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

                        <h1>Add/Edit Brick</h1>

                        <form class="form-horizontal" method="post" action="brick/edit">
                            <fieldset>
                                <!-- Text input-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="brick[name]" name="brick[name]" type="text"
                                               placeholder="Brick's name"
                                               class="floating-label form-control input-md">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="select" class="col-sm-2 control-label">Type</label>

                                        <div class="col-sm-10">
                                            <select class="form-control" id="brickTypeSelector">
                                                <option value="WAVE">Stimuli auditif enregistré</option>
                                                <option value="TTS">Stimuli auditif généré</option>
                                                <option value="TEXT">Stimuli visuel textuel</option>
                                                <option value="IMG">Stimuli visuel imagé</option>
                                                <option value="RESP">Record user's voice</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="dynamicForm">
                                    <div class="rows col-lg-6">
                                        <div class="form-group"><input id="brick[media]" name="brick[media]" type="text"
                                                                       readonly="" class="form-control floating-label"
                                                                       placeholder="Upload File..."> <input type="file"
                                                                                                            id="inputFile">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" id="brick[save]" name="brick[save]"
                                            class="btn btn-primary">Save
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <h1>Bricks list</h1>
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
                        <td>Session 1</td>
                        <td>WAV</td>
                        <td>fichier.wav</td>
                        <td>
                            <button class="btn btn-flat btn-info btn-sm btn-td">edit</button>
                            <button class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Session 2</td>
                        <td>TTS</td>
                        <td>BLA BLA BLA BLA</td>
                        <td>
                            <button class="btn btn-flat btn-info btn-sm btn-td">edit</button>
                            <button class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                        </td>
                    </tr>
                    </tbody>

                </table>
                <div class="pagingBrick"></div>
            </div>
        </div>
    </div>
</div>
