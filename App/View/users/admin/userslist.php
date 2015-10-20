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
                            <td>Administrator</td>
                            <td><button class="btn btn-flat btn-warning btn-sm btn-td">delete</button></td>
                        </tr>
                        <tr>
                            <td>Smith</td>
                            <td>John</td>
                            <td><a href="mailto:john.smith@gmail.com">john.smith@gmail.com</a></td>
                            <td>20/08/2015</td>
                            <td>user</td>
                            <td><button class="btn btn-flat btn-warning btn-sm btn-td">delete</button></td>
                        </tr>
                        <tr>
                            <td>Dupont</td>
                            <td>Pierrette</td>
                            <td><a href="mailto:dupontpierrette@gmail.com">dupontpierrette@gmail.com</a></td>
                            <td>20/10/2014</td>
                            <td>Administrator</td>
                            <td><button class="btn btn-flat btn-warning btn-sm btn-td">delete</button></td>
                        </tr>
                        <tr>
                            <td>Martin</td>
                            <td>Charlie</td>
                            <td><a href="mailto:charlie@gmail.com">charlie@gmail.com</a></td>
                            <td>20/10/2014</td>
                            <td>user</td>
                            <td><button class="btn btn-flat btn-warning btn-sm btn-td">delete</button></td>
                        </tr>
                        <tr>
                            <td>Froute</td>
                            <td>Pierre</td>
                            <td><a href="mailto:froupierre@gmail.com">froupierre@gmail.com</a></td>
                            <td>20/10/2014</td>
                            <td>user</td>
                            <td><button class="btn btn-flat btn-warning btn-sm btn-td">delete</button></td>
                        </tr>
                        <tr>
                            <td>Matt</td>
                            <td>Marc</td>
                            <td><a href="mailto:matt@gmail.com">matt@gmail.com</a></td>
                            <td>20/10/2014</td>
                            <td>user</td>
                            <td><button class="btn btn-flat btn-warning btn-sm btn-td">delete</button></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="pagingUsers"></div>
                </div>
            </div>
        </div>
    </div>
</div>
