<?php
    include_once 'headerdashboard.php';
    include_once('../controlers/categorieControler.php');
    $categoriesController = new categoriesController();
    $categories = $categoriesController->getCategories();
    $categoriesController->deleteCategories();
    $categoriesController->addCategories();
    $categoriesController->updateCategorie();

?>

    <div class="" style="padding-top: 8rem;min-width: 731px">
        <div class="card">
            <div class="card-header border-bottom" style="background-color: white;margin-bottom: 1rem;">
                <div class=" d-flex justify-content-between">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" >All Categories</h5>
                    </div>
                    <div class="justify-content-end">
                        <button class="btn  add-btn rounded-pill btn-success px-lg-3" id="add-btn"><i class="uil-plus mr-2"></i>Add Categories</button>
                    </div>
                </div>
            </div>
            <table id="Categorie-table" class="display">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>NameCategorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="background-color: white;">
                    <?php foreach ($categories as $category): ?>
                        <tr id="User<?=$category['id']; ?>">
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td class="text-center">
                                <button class="edit-btn btn btn-sm btn-success"  data-id="<?=$category['id']; ?>"><i class="uil uil-edit"></i></button>
                                <a href="#" onclick=" deletecategories('<?= $category['id']; ?>') " class="btn btn-sm btn-danger" data-id="<?=$category['id']; ?>"><i class="uil uil-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>

    <div class="modal fade" id="add-update-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="form-categorie">
                    <div class="modal-header">
                        <h5 id="modal-title">Add Categorie</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                    <div class="validation-input-categorie">
                        <div>
                            <i class="bx bx-error-circle"></i>
                        </div>
                        <div class="message-content">
                            <h4>vous pouvez pas ajouter a category</h4>
                            <p>Veuillez remplir les champs ci-dessous.</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <!-- This Input Allows Storing Task Index  -->
                        <input type="hidden" id="categorie-id" name="categorie_id">
                        <div class="mb-3">
                            <label class="form-label">Categorie Name</label>
                            <input type="text" value="" class="form-control" name="namecategorie" id="modal-categorie-name"/>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                        <button  type="submit" onclick="validateFormCategorieSave()" name="saveCategorie" class="btn btn-primary task-action-btn" id="categorie-save-btn">Save</button>
                        <button  type="submit" onclick="validateFormCategorieUpdate()" name="UpdateCategorie" class="btn btn-primary task-action-btn" id="categorie-update-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include_once 'footerDashboard.php'
?>