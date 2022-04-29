<?php include "include/dbConfig.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Purnea Panel - Zila Vikash Manch</title>
    <!-- CSS only -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea'
    });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include "header.php"; ?>
    <?php
    $pro_id=$_GET['pro_id'];
        $callingProject = mysqli_query($connect,"select * from projects JOIN categories ON projects.category_id=categories.cat_id where pro_id='$pro_id'");
        $row = mysqli_fetch_array($callingProject);
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-7">
                <div class="card border border-secondary">
                    <div class="card-body">
                        <h2 class="text-capitalize"><?= $row['pro_title'];?></h2>
                        <tr>
                            <p>Date:<?= date("d-M-Y",strtotime($row['doc']));?></p>
                            <p class="text-muted">Category:<?= $row['cat_title'];?> </p>
                            <p class="lead"><?= $row['description'];?></p>
                        </tr>
                        </table>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION['admin'])):
                   if (!isset($_SESSION['user'])):?>
                     <a href="login.php?next=viewProjects.php?pro_id=<?= $_GET['pro_id'];?>"
                       class="btn btn-warning mt-5">Sign In to Submit Your Project</a>
                   <?php else: ?>
                     <a href="#submitform" class="btn btn-success mt-5" data-bs-toggle="collapse">Submit Your Project</a>
                   <?php endif;
                endif;?>
            </div>
            <div class="col-5">
                <div class="card">
                    <img src="images/project/<?=$row['image'];?>" alt="" class="card-img-top">
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="collapse fadeIn mt-5" id="submitform">
                    <div class="card">
                        <div class="card-header py-1">
                            <h2 class="h3">Submit Your Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <textarea name="content" id="" cols="30" rows="10" class="form-control" required></textarea>
                                    <div class="invalid-feedback">
                                    Please enter content
                             </div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Upload Attachment (if any)</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="submit" class="btn btn-success">
                                </div>
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $content=$_POST['content'];

                                    $log = $_SESSION['user'];
                                    $row = mysqli_fetch_array(mysqli_query($connect,"select * from accounts where email='$log'"));

                                    $account_id=$row['id'];
                                    $project_id=$_GET['pro_id'];

                                    $file  = $_FILES['file']['name'];
                                    $tmp  = $_FILES['file']['tmp_name'];
                                    move_uploaded_file($tmp,"images/reports/$file");

                                    $query= mysqli_query($connect,"insert into reports(content,attachment,account_id,project_id) value ('$content','$file','$account_id','$project_id')");
                                    if ($query) {
                                        redirect();
                                    }
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
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