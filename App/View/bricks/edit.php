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
                        
                        <?php 
                            if(isset($this->currentBrick)){
                                echo "<h1>Edit Brick</h1>";      
                                echo ' <form class="form-horizontal"  enctype="multipart/form-data" data-toggle="validator" method="post" action="'.URL.'brick/UpdateBrick/'.$this->currentBrick['id'].'">';
                            }
                            else {
                                echo "<h1>Add Brick</h1>";
                                echo ' <form class="form-horizontal"  enctype="multipart/form-data" data-toggle="validator" method="post" action="'.URL.'brick/CreateBrick">';
                            }
                        ?> 

                            <fieldset>
                                <!-- Text input-->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="brick[title]" name="brick[title]" type="text"

                                               placeholder="Brick's title" value="<?php if (isset($this->currentBrick)) {
                                                   echo $this->currentBrick['title'];
                                               } ?>"
                                               class="floating-label form-control input-md" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="select" class="col-sm-2 control-label">Type</label>

                                        <div class="col-sm-10">

                                            <select class="form-control" id="brickTypeSelector" name="brick[type]">
                                                <option value="WAVE" <?php if(isset($this->currentBrick['type']) && $this->currentBrick['type']=="WAVE" ) echo "selected='selected'";?>>Stimuli auditif enregistré</option>
                                                <option value="TTS" <?php if(isset($this->currentBrick['type']) && $this->currentBrick['type']=="TTS" ) echo "selected='selected'";?>>Stimuli auditif généré</option>
                                                <option value="TXT" <?php if(isset($this->currentBrick['type']) && $this->currentBrick['type']=="TXT" ) echo "selected='selected'";?>>Stimuli visuel textuel</option>
                                                <option value="IMG" <?php if(isset($this->currentBrick['type']) && $this->currentBrick['type']=="IMG" ) echo "selected='selected'";?>>Stimuli visuel imagé</option>
                                                <option value="RESP" <?php if(isset($this->currentBrick['type']) && $this->currentBrick['type']=="RESP" ) echo "selected='selected'";?>>Record user's voice</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Faire en sorte que le dynamicform n'affiche pas l'uploader de fichier en cas de type text, dès le chargement de la page  -->
                                <div id="dynamicForm">
                                    <div class="rows col-lg-6">
                                        <div class="form-group">
                                            <input id="brick[data]" name="brick[data]" type="text"
                                                                       <?php if (!isset($this->currentBrick) || ($this->currentBrick['type'] == 'IMG' || $this->currentBrick['type'] == 'WAVE')): ?>readonly=""<?php endif; ?> class="form-control floating-label"

                                                                       placeholder="<?php if (isset($this->currentBrick)) {
                                                   echo $this->currentBrick['data'];
                                               } else { echo "Upload File..."; } ?>" value="<?php if (isset($this->currentBrick)) {
                                                   echo $this->currentBrick['data'];
                                               }?>"> 
                                            <?php if (isset($this->currentBrick) && $this->currentBrick['type'] == 'IMG'): ?>
                                               <input type="file" name="inputFile[]" id="inputFile" multiple="" required>
                                            <?php elseif(!isset($this->currentBrick) || $this->currentBrick['type'] == 'WAVE'): ?>
                                               <input type="file" name="inputFile" id="inputFile" required>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" id="brick[save]" 
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
                        <?php foreach ($this->bricks as $brick) :?>
                             <tr>
                                <td><?php echo $brick['id']; ?></td>
                                <td><?php echo $brick['title']; ?></td>
                                <td><?php echo $brick['type']; ?></td>
                                <td><?php echo $brick['data']; ?></td>
                                <td>
                                    <a href="<?php echo URL ?>brick/edit/<?php echo $brick['id']; ?>"><button type="button" class="btn btn-flat btn-info btn-sm btn-td">edit</button></a>
                                    <a href="<?php echo URL ?>brick/delete/<?php echo $brick['id']; ?>"><button type="button" class="btn btn-flat btn-warning btn-sm btn-td">delete</button></a>
                                </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>

                </table>
                <div class="pagingBrick"></div>
            </div>
        </div>
    </div>
</div>