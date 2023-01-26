const body = document.querySelector("body"),
    modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
}

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
        localStorage.setItem("status", "close");
    } else {
        localStorage.setItem("status", "open");
    }
});
/*===============================Users===============================*/
var table;
$(document).ready(function() {
    table = $("#users-table").DataTable();
});

function DeleteUser(id) {
  Swal.fire({
    background: "#1e1e2d",
    color: "#F0F6FC",
    title: "Are you sure you want to delete this user?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        background: "#1e1e2d",
        color: "#F0F6FC",
        title: "Deleted!",
        text: "Your user has been deleted successfully. ",
        icon: "error",
      });
      $.ajax({
        url: "user.php",
        method: "POST",
        data: { DeleteUser: id },
        dataType: "html",
        success: function () {
          document.querySelector(`#User${id}`).remove();
        },
      });
    }
  });
}

/*===============================Categories===============================*/
var tableCategorie;
$(document).ready(function() {
    tableCategorie = $("#Categorie-table").DataTable();
});

function deletecategories(id) {
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this user?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your user has been deleted successfully. ', icon: 'error' });
            $.ajax({
                url: 'categories.php',
                method: 'POST',
                data: { DeleteCategories: id },
                dataType: 'html',
                success: function () {
                    document.querySelector(`#User${id}`).remove();
                },
            });
        }
    });
}

$("#add-btn").click(function () {
    $("#modal-title").text("Add User");
    $("#name-input").val("");
    $("#categorie-save-btn").show();
    $("#categorie-update-btn").hide();
    $("#add-update-modal").modal("show");
});

var data;
$("#Categorie-table tbody").on("click", ".edit-btn", function () {
    data = tableCategorie.row($(this).parents("tr")).data();
    $("#modal-title").text("Update Categorie");
    $("#modal-categorie-name").val(data[1]);
    $("#categorie-id").val(data[0]);
    $("#categorie-save-btn").hide();
    $("#categorie-update-btn").show();
    $("#add-update-modal").modal("show");
});

function validateFormCategorieSave() {
  if ($("#modal-categorie-name").val() == "") {
    $("#categorie-save-btn").attr("type", "button");
    $(".validation-input-categorie").addClass("show-validation");
  } else {
    $("#categorie-save-btn").attr("type", "submit");
    $(".validation-input-categorie").removeClass("show-validation");
  }
}

function validateFormCategorieUpdate() {
  if ($("#modal-categorie-name").val() == "") {
    $("#categorie-update-btn").attr("type", "button");
    $(".validation-input-categorie").addClass("show-validation");
  } else {
    $("#categorie-update-btn").attr("type", "submit");
    $(".validation-input-categorie").removeClass("show-validation");
  }
}

/*===============================Post===============================*/
var tablePost;
$(document).ready(function() {
    tablePost = $("#Post-table").DataTable();
});

function deletePost(id) {
  Swal.fire({
    background: "#1e1e2d",
    color: "#F0F6FC",
    title: "Are you sure you want to delete this user?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        background: "#1e1e2d",
        color: "#F0F6FC",
        title: "Deleted!",
        text: "Your user has been deleted successfully. ",
        icon: "error",
      });
      $.ajax({
        url: "post.php",
        method: "POST",
        data: { Deletepost: id },
        dataType: "html",
        success: function () {
          document.querySelector(`#User${id}`).remove();
          // tablePost.ajax.reload();
        },
      });
    }
  });
}

$("#add-Post-btn").click(function () {
     $("#postList > .modal-body:gt(0)").remove();
     $("#modal-title").text("Add Post");
     $("#modal-post-title").val("");
     $("#modal-post-content").val("");
     $("#modal-post-categorie").val("");
     $("#post-save-btn").show();
     $("#post-update-btn").hide();
     $("#add-update-post-modal").modal("show");
     i = 2;
});

var data;
$("#Post-table tbody").on("click", ".edit-btn", function () {
  data = tablePost.row($(this).parents("tr")).data();
  console.log($(this).parents("td").prev().attr("data_id"));
    $("#modal-title").text("Update Post");
    $("#modal-post-id").val(data[0]);
    $("#modal-post-title").val(data[2]);
    $("#modal-post-content").val(data[3]);
    $(
      "#modal-post-categorie option[value='" +
        $(this).parents("td").prev().attr("data_id") +
        "']"
    ).attr("selected", true);
    $("#post-save-btn").hide();
    $("#post-update-btn").show();
    $("#add-update-post-modal").modal("show");
});

$("#add-post-btn").click(function () {
       var $article = $("#modal-body-Post");
       var $articles = $("#postList");
       var $copyArticle = $article.clone();
       $copyArticle.find("input:text").val("");
       $copyArticle.find("select").val("");
       $articles.append($copyArticle);
});

function validateFormPostSave(){

    let valid = true;
    $("input[name='postTitle[]'], input[name='postContent[]'], select[name='categorie[]'], input[name='picture[]']").each(function () {
      if (!$(this).val()) {
        valid = false;
        return false;
      }
    });

    if (valid) {
      $("#post-save-btn").attr("type", "submit");
      $(".validation-input-Post").removeClass("show-validation");
    } else {
      $("#post-save-btn").attr("type", "button");
      $(".validation-input-Post").addClass("show-validation");
    }
}

$("#search-input").on("input", function () {
  var rows = $("#Post-table tbody tr");
  var searchValue = $(this).val().toLowerCase();
  rows.each(function () {
    var row = $(this);
    var rowText = row.text().toLowerCase();
    if (rowText.indexOf(searchValue) !== -1) {
      row.show();
    } else {
      row.hide();
    }
  });
});