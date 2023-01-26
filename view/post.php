<?php
include_once 'headerdashboard.php';
include_once('../controlers/postControler.php');
include_once('../controlers/categorieControler.php');
$categoriesController = new categoriesController();
$categories = $categoriesController->getCategories();
$postsController = new postsController();
$Posts = $postsController->getPosts($id_user);
$postsController->addPosts();
$postsController->deletePosts();
$postsController->updatePosts();

?>

    <div class="" style="padding-top: 8rem;min-width: 731px">
        <div class="card">
            <div class="card-header border-bottom" style="background-color: white;margin-bottom: 1rem;">
                <div class=" d-flex justify-content-between">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" >All Posts</h5>
                    </div>
                    <div class="justify-content-end">
                        <button class="btn  add-btn rounded-pill btn-success px-lg-3" id="add-Post-btn"><i class="uil-plus mr-2"></i>Add Posts</button>
                    </div>
                </div>
            </div>
            <!-- <input type="text" id="search-input" placeholder="Search"> -->
            <table id="Post-table" class="display">
                <thead>
                <tr>
                    <th>id</th>
                    <th>image</th>
                    <th>title</th>
                    <th>content</th>
                    <th>categorie</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody style="background-color: white;">
                <?php foreach ($Posts as $Post): ?>
                    <tr id="User<?=$Post['id']; ?>">
                        <td><?= $Post['id'] ?></td>
                        <td><div class="post_image"><img src="<?=$Post['image']?>" alt=""></div></td>
                        <td><?= $Post['title'] ?></td>
                        <td><?= $Post['content'] ?></td>
                        <td id="categorie_selected" data_id="<?=$Post['category_id'] ?>"><?= $Post['name'] ?></td>
                        <td class="text-center">
                            <button class="edit-btn btn btn-sm btn-success" data-id="<?=$Post['id']; ?>"><i class="uil uil-edit"></i></button>
                            <a href="#" onclick=" deletePost('<?= $Post['id']; ?>') " class="btn btn-sm btn-danger" data-id="<?=$Post['id']; ?>"><i class="uil uil-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>

    <div class="modal fade" id="add-update-post-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="form-Post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 id="modal-title">Add Post</h5>
                        <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                    </div>
                     <div class="validation-input-Post">
                        <div>
                            <i class="bx bx-error-circle"></i>
                        </div>
                        <div class="message-content">
                            <h4>vous pouvez pas ajouter a post</h4>
                            <p>Veuillez remplir les champs ci-dessous.</p>
                        </div>
                    </div>
                    <div id="postList">
                        <div id="modal-body-Post" class="modal-body">
                            <!-- This Input Allows Storing Task Index  -->
                            <input type="hidden" id="modal-post-id" value="<?= $id_user ?>" name="User_id">
                            <div class="mb-3">
                                <label class="form-label">Image product</label>
                                <input type="file" value="" class="form-control" id="pictureInput" name="picture[]"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">title</label>
                                <input type="text" value="" class="form-control" name="postTitle[]" id="modal-post-title"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <input type="text" value="" class="form-control" name="postContent[]" id="modal-post-content"/>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">categorie</label>
                                <select id="modal-post-categorie" class="form-control" name="categorie[]">
                                    <option value="">Please select</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                         <button type="button" class="btn btn-primary" id="add-post-btn"> + Post</button>
                        <button  type="submit" name="savePost" class="btn btn-primary task-action-btn" id="post-save-btn" onclick="validateFormPostSave()">Save</button>
                        <button  type="submit" name="UpdatePost" class="btn btn-primary task-action-btn" id="post-update-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include_once 'footerDashboard.php'
?>