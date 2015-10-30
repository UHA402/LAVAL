<div class="container contcolor">
    <div id="deco_blanc3"></div>
    <div class="col-sm-12 cadre">
        <div class="entete"></div>
        <div class="panel">
            <div class="panel-heading enteteFlou">
                <h1>USERS</h1>

                <div class="cercle">
                    <img
                        src="<?php echo URL ?>public/img/connexion.png"
                        alt="logo" height="63px" width="71px"
                        style="top: 18px; position: relative; left: 12px"/>
                </div>
            </div>
            <div class="panel-body panelCategorie panelSession">

                <h1>List of all users</h1>

                <div class="row">
                    <table id="usersList" class="table table-striped table-hover text-center">
                        <thead>
                        <tr>
                            <th class="text-center">Lastname</th>
                            <th class="text-center">Firstname</th>
                            <th class="text-center">Mail</th>
                            <th class="text-center">Registration date</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Dupont</td>
                            <td>Pierre</td>
                            <td><a href="mailto:dupontpierre@gmail.com">dupontpierre@gmail.com</a></td>
                            <td>20/10/2014</td>
                            <td><select class="form-control" id="select">
                                    <option>Administrateur</option>
                                    <option>Membre</option>
                                </select></td>
                            <td><a href="#">
                                    <button type="button" class="btn btn-flat btn-warning btn-sm btn-td">delete</button>
                                </a></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pagingUsers"></div>
                </div>
            </div>
        </div>
    </div>
</div>
