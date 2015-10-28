<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>USER DASHBOARD</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">
                <div class="jumbotron">
                    <h1>Hello : Welcome <?= $this->username ?>  !</h1>
                    <p><a class="btn btn-primary">Start Session !</a></p>
                </div>
                <h1>Sessions list</h1>
                <table id="sessionTable" class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Session 1</td>
                        <td>20min</td>
                        <td>
                            <button class="btn btn-flat btn-primary btn-sm btn-td">Start</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Session 2</td>
                        <td>25min</td>
                        <td>
                            <button class="btn btn-flat btn-primary btn-sm btn-td">Start</button>
                        </td>
                    </tr>
                    </tbody>

                </table>
                <div class="pagingSession"></div>
            </div>

        </div>
    </div>
</div>
