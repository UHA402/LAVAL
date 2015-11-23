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
                        <th class="text-center">Sequence's number</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($_SESSION["AllSessions"]) && $_SESSION["AllSessions"] != "")
                        {
                            foreach ($_SESSION["AllSessions"] as $i=>$v)
                            {
                                echo "<tr>";
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$v["title"]."</td>";
                                    echo "<td>".$v["nbLessons"]."</td>";
                                    echo "<td>";
                                        echo "<a href='".URL."player/start/".$i."'>";
                                            echo "<button class='btn btn-flat btn-info btn-sm btn-td'>Start</button>";
                                        echo "</a>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                    </tbody>

                </table>
                <div class="pagingSession"></div>
            </div>

        </div>
    </div>
</div>
