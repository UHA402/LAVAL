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

                        <form class="form-horizontal" method="post">
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input id="brick[name]" name="brick[name]" type="text"
                                               placeholder="Brick's name"
                                               class="floating-label form-control input-md">
                                    </div>
                                    <div class="form-group">
                                        <label for="select" class="col-md-1 control-label">Type</label>

                                        <div class="col-md-5">
                                            <select class="form-control" id="brick[type]">
                                                <option>Stimuli auditif enregistré</option>
                                                <option>Stimuli auditif généré</option>
                                                <option>Stimuli visuel textuel</option>
                                                <option>Stimuli visuel imagé</option>
                                                <option>Record user's voice</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="dynamicForm">

                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" id="session[save]" name="session[save]"
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
