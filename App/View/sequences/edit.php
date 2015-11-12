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

                        <form class="form-horizontal"
                              data-toggle="validator"
                              method="post"
                              action="/sequence/edit<?php if (isset($this->sequence)): echo "/".$this->sequence['id'];?><?php endif; ?>">
                            <fieldset>
                                <span class="text-right">
                                        <div class="togglebutton togglebutton-material-green">
                                            <label class="text-left">
                                                <input id="sequence[publish]" name="sequence[publish]"
                                                       type="checkbox" checked="">Publish
                                            </label>
                                        </div>
                                </span>

                                <!-- Text input-->
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <input id="sequence[name]" name="sequence[title]" type="text"
                                               placeholder="Sequence's name"
                                               class="floating-label form-control input-md"
                                               value="<?php if (isset($this->sequence)) {
                                                   echo $this->sequence['title'];
                                               } ?>"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 text-right">Duration :</label>

                                        <div class="col-md-2">
                                            <input id="sequence[duration]" name="sequence[duration]" type="time"
                                                   placeholder="Duration"
                                                   class="form-control input-md"
                                                   value="<?php if (isset($this->sequence)) {
                                                       echo $this->sequence['duration'];
                                                   } ?>"
                                                   required>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                    <!-- </form>
                                    <form class="form-horizontal"
                                          data-toggle="validator"
                                          method="post"
                                          action="/sequence/addbricks"> -->
                                        <h1>Select one brick or more, to add in the sequence</h1>

                                        <div id="add-list">
                                            <table id="bricktable" class="table table-striped table-hover text-center">
                                                <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 20%">check</th>
                                                    <th class="text-center">Title</th>
                                                    <th class="text-center" style="width: 20%">check</th>
                                                    <th class="text-center">Title</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- <select id="sequence[bricklist]" name="sequence[bricklist]" class="form-control" multiple> -->
                                                <?php foreach ($this->bricks as $key => $brick): ?>
                                                    <?php $key+=1; ?>
                                                    <?php if (($key%2) == 1): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="checkbox list-add-cbx">
                                                                    <label>
                                                                         <input type="checkbox"
                                                                               value="<?php echo $brick['id']; ?>"
                                                                               name="sequence_bricks_id[<?php echo $key; ?>]"<?php if (isset($this->sequence_bricks)): ?><?php if (in_array($brick['id'], $this->sequence_bricks)): ?> checked<?php endif ?><?php endif ?>>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo $brick['title']; ?>
                                                            </td>
                                                    <?php endif; ?>
                                                    <?php if (($key%2) == 0): ?>
                                                        <td>
                                                            <div class="checkbox list-add-cbx">
                                                                <label>
                                                                    <input type="checkbox"
                                                                               value="<?php echo $brick['id']; ?>"
                                                                               name="sequence_bricks_id[<?php echo $key; ?>]"<?php if (isset($this->sequence_bricks)): ?><?php if (in_array($brick['id'], $this->sequence_bricks)): ?> checked<?php endif ?><?php endif ?>>

                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php echo $brick['title']; ?>
                                                        </td>

                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" id="sequence[save]" class="btn btn-primary">Save
                                            </button>
                                        </div>
                                        <!-- <div class="form-group text-center">
                                            <button type="submit" id="sequence[save]" class="btn btn-sm btn-info">Add
                                            </button>
                                        </div> -->
                                    </div>


                                </div>
                                <?php if (isset($this->sequence_bricks)): ?>
                                <h1>Brick in the sequence</h1>
                                <table id="sort" class="table table-striped table-hover text-center">
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
                                    <?php foreach ($this->bricks as $key => $brick): ?>
                                    <?php if (in_array($brick['id'], $this->sequence_bricks)): ?>
                                        <tr id="id_<?= $brick['id'] ?>">
                                            <?php //if (in_array($brick['id'], $_SESSION['sequence_bricks_id'])): ?>
                                            <td><?php echo $brick['id'] ?></td>
                                            <td><?php echo $brick['title'] ?></td>
                                            <td><?php echo $brick['type'] ?></td>
                                            <td><?php echo $brick['data'] ?></td>
                                            <td>
                                                <a href="<?php echo URL ?>sequence/delete/<?php echo $brick['id']; ?>">
                                                    <button type="button"
                                                            class="btn btn-flat btn-warning btn-sm btn-td">delete
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                      <?php endif; ?>
                                    <?php endforeach; ?>
                                  <?php else: ?>
                                      <em class="alert alert-info"><i class="glyphicon glyphicon-info-sign"></i> Add some bricks to your sequence with the Add button above and sort them here!</em>
                                  <?php endif; ?>
                                    </tbody>
                                </table>
                                <div class="pagingBrick"></div>
                                <input id="sequence[BrickPos]" value=""/>


                            </fieldset>
                        </form>
                    </div>
                </div>
                <h1>Sequence list</h1>
                <table id="lessonTable" class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($this->sequences as $key => $sequence): ?>
                        <tr>
                            <td><?php echo $sequence['id'] ?></td>
                            <td><?php echo $sequence['title'] ?></td>
                            <td>
                                <a href="<?php echo URL ?>sequence/edit/<?php echo $sequence['id']; ?>">
                                    <button type="button" class="btn btn-flat btn-info btn-sm btn-td">Edit</button>
                                </a>
                                <a href="<?php echo URL ?>sequence/delete/<?php echo $sequence['id']; ?>">
                                    <button type="button" class="btn btn-flat btn-warning btn-sm btn-td">Delete</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <div class="pagingLesson"></div>
            </div>

        </div>
    </div>
</div>
