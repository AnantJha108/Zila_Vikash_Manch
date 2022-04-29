<?php include "../include/dbConfig.php";

authCheck('admin','login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Project | Officer Panel - Zila Vikash Manch</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <?php include "../include/navbar.php"; ?>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-2 bg-dark" style="height:92.5vh">
                <?php include "../include/side.php";?>
            </div>
            <div class="col-10 p-4">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h1 class="h5 fs-bolder">Insertnage Projects/Problems</h1>
                        </div>
                        <div class="col-4">
                            <a href="manageProject.php" class="btn btn-success float-end me-5">Go back</a>
                        </div>
                    </div>
                    <div class="row">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="">Project Title <span class="text-danger">*</span></label>
                                        <input type="text" name="project_title" class="form-control">
                                        <div class="invalid-feedback">
                                    Please enter Project title
                                </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="">Category <span class="text-danger">*</span></label>
                                        <select type="text" name="category_id" class="form-select">
                                        <div class="invalid-feedback">
                                    Please select category
                                </div>
                                            <?php
                                            $callingCat = mysqli_query($connect,"select * from categories");
                                            while ($row=mysqli_fetch_array($callingCat)) {
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];
                                                echo "<option value ='$cat_id'> $cat_title </option>";
                                            }
                                            ?>

                                        </select>
                                        <a href="#insertCat" class="badge bg-danger text-white text-decoration-none"
                                            data-bs-toggle="modal">Add New Category</a>
                                        <div class="modal fade" id="insertCat">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">Insert Category</div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                                                            <div class="mb-3">
                                                                <div class="form-floating">
                                                                    <input type="text" placeholder="cat_title"
                                                                        name="cat_title" class="form-control">
                                                                    <label for="">Category Title</label>
                                                                    <div class="invalid-feedback">
                                                                        Please enter category
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="">Category Description</label>
                                                                <textarea rows="5" name="cat_description"
                                                                    class="form-control"></textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <input type="submit" name="insertCat" value="create"
                                                                    class="btn btn-success float-end">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="">Cover image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="">Description<span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" cols="30" rows="13"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="">Support File</label>
                                        <input type="file" name="support_file" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter address
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input type="submit" name="insertProject" value="Publish"
                                        class="btn btn-lg btn-success w-100 mt-3">
                                </div>
                            </div>
                        </form>
                        <?php
                            if (isset($_POST['insertProject'])) {
                                $file = $image = NULL;
                                $pro_title = $_POST['project_title'];
                                $category_id = $_POST['category_id'];
                                $description = $_POST['description'];
                                $address = $_POST['address'];
                                $status = 1;

                                if ($_FILES['image'] != "") {
                                    $image = $_FILES['image']['name'];
                                    $tmp_image = $_FILES['image']['tmp_name'];
                                    move_uploaded_file($tmp_image,"../images/project/$image");
                                }
                                if ($_FILES['support_file'] != "") {
                                    $file = $_FILES['support_file']['name'];
                                    $tmp_file = $_FILES['support_file']['tmp_name'];
                                    move_uploaded_file($tmp_file,"../images/project/file/$file");
                                }

                                $log_id=$_SESSION['admin'];
                                $admin_id=mysqli_query($connect,"select * from admin where email='$log_id'");
                                $row = mysqli_fetch_array($admin_id);
                                echo $admin_id = $row['id'];

                                $query = mysqli_query($connect,"insert into projects (pro_title,category_id,description,address,image,status,admin_id,support_file) value ('$pro_title','$category_id','$description','$address','$image','$status','$admin_id','$file')");

                                if ($query) {
                                    redirect("manageProject");
                                }
                                else {
                                    message("failed");
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
  if (isset($_POST['insertCat'])) {
      $cat_title = $_POST['cat_title'];
      $cat_description = $_POST['cat_description'];

      $query = mysqli_query($connect,"insert into categories (cat_title,cat_description) value ('$cat_title','$cat_description')");
      if ($query) {
          redirect("insertProject");
      }
      else {
          message("category insertion failed");
      }
  }
?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
    (function() {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                }, false)
            }, false)
    })()
    </script>
</body>

</html>