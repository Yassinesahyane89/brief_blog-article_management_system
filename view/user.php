<?php
    include_once 'headerdashboard.php';
    include_once('../controlers/userControler.php');
    $UserController = new UsersController();
    $users = $UserController->getUsers();
    echo $UserController->deleteUser();

?>
    <div class="" style="padding-top: 8rem;min-width: 731px">
        <div class="card">
            <div class="card-header border-bottom" style="background-color: white;margin-bottom: 1rem;">
                <div class=" d-flex justify-content-between">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" >All Users</h5>
                    </div>
                </div>
            </div>
            <table id="users-table" class="col-12">
                <thead>
                <tr>
                    <th style="width: 10%">id</th>
                    <th style="width: 40%">Name</th>
                    <th style="width: 40%">Email</th>
                    <th style="width: 10%">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr id="User<?=$user['id']; ?>">
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a onclick="DeleteUser(<?=$user['id']; ?>)" class="btn btn-sm btn-danger"><i class="uil uil-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="add-update-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="users-fields">
                    <form>
                        <div class="form-group">
                            <label for="name-input">Name</label>
                            <input type="text" class="form-control" id="name-input" name="name[]">
                        </div>
                        <div class="form-group">
                            <label for="email-input">Email</label>
                            <input type="email" class="form-control" id="email-input" name="email[]">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-user-btn"> + User</button>
                    <button type="button" class="btn btn-primary" id="save-btn">Save</button>
                    <button type="button" class="btn btn-primary" id="update-btn">Update</button>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'footerDashboard.php'
?>