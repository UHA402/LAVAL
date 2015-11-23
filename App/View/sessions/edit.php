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
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">
                <div class="panel panel-default">
                    <div class="panel-body containerEditForm">
                        <?php
                        if (isset($_SESSION["idSession"]))
                            echo '<h1 id="title">Edit Session</h1>';
                        else
                            echo '<h1 id="title">Add Session</h1>';
                        ?>
                        <form class="form-horizontal" method="post">
                            <fieldset>

                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <?php
                                            if (isset($_SESSION["titleSession"]) && $_SESSION["titleSession"] != "")
                                            {
                                                echo '<input id="name" name="session[name]" type="text"
                                                    placeholder="Session&apos;s name"
                                                    class="floating-label form-control input-md" value="'.$_SESSION["titleSession"].'">';
                                            }
                                            else
                                            {
                                                echo '<input id="name" name="session[name]" type="text"
                                                    placeholder="Session&apos;s name"
                                                    class="floating-label form-control input-md">';
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <div class="togglebutton togglebutton-material-green">
                                            <label class="text-left">
                                                <input id="publish" name="session[publish]" type="checkbox"
                                                       checked="">Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <select id="lessonlist" name="session[lessonlist]" class="form-control" multiple>
                                        <?php
                                            if (isset($_SESSION["allLessons"]))
                                            {
                                                foreach($_SESSION["allLessons"] as $i=>$v)
                                                    echo '<option value="'.$v['id'].'">'.$v["title"].'</option>';
                                            }
                                        ?>
                                        </select>

                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" id="addLesson" name="session[addLesson]"
                                                class="btn btn-flat btn-info btn-sm">add
                                        </button>
                                    </div>
                                </div>

                                <table id="lessonSessionTable" class="table table-striped table-hover text-center">
                                    <thead>
                                    <tr>
                                        <!-- <th class="text-center">#</th> -->
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Number Bricks</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($_SESSION["lessonsSession"]) && $_SESSION["lessonsSession"] != "")
                                        {
                                            foreach ($_SESSION["lessonsSession"] as $i=>$v)
                                            {
                                                echo "<tr>";
                                                    echo "<td>".$v["id"]."</td>";
                                                    echo "<td>".$v["title"]."</td>";
                                                    echo "<td>".$v["nbBrick"]."</td>";
                                                    echo "<td><button type='button' class='btn btn-flat btn-warning btn-sm btn-td'>delete</button></td>";
                                                echo "</tr>";
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <div class="pagingLesson"></div>
                                <div class="form-group text-right">
                                    <button type="button" id="save" name="session[save]" class="btn btn-primary">
                                        <?php
                                            if (isset($_SESSION["idSession"]))
                                                echo 'EDIT';
                                            else
                                                echo 'CREATE';
                                        ?>
                                    </button>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <h1>Session list</h1>
                <table id="sessionTable" class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <!-- <th class="text-center">#</th> -->
                        <th class="text-center">Name</th>
                        <th class="text-center">Number Sequences</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (isset($this->msg) && $this->msg != "")
                            {
                                foreach ($this->msg as $i=>$v)
                                {
                                    echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$v["title"]."</td>";
                                        echo "<td>".$v["nbLessons"]."</td>";
                                        echo "<td>";
                                            echo "<a href='".URL."session/edit/".$i."'>";
                                                echo "<button class='btn btn-flat btn-info btn-sm btn-td'>edit</button>";
                                            echo "</a>";
                                            echo "<a href='".URL."session/delete/".$i."'>";
                                                echo "<button class='btn btn-flat btn-warning btn-sm btn-td'>delete</button>";
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
<script src="<?php echo URL ?>public/js/ajax.js"></script>
<script type="text/javascript">
    var idEdit = <?php echo (isset($_SESSION['idSession']) ? $_SESSION['idSession'] : 'null'); ?>;
    var path = "<?php echo URL; ?>";

    function phpAddSequence()
    {
        addSequence(path);
    }

    function phpAddSession()
    {
        addSession(path);
    }

    function phpEditSession()
    {
        editSession(path);
    }

    function saveSession()
    {
        if (idEdit != null)
            editSession(path);
        else
            addSession(path);
    }
</script>