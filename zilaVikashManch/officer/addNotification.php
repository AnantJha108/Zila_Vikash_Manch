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

<body>
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
                            <h1 class="h4 fs-bolder">Add Notification</h1>
                        </div>
                        <div class="col-4">
                            <a href="manageNotification.php" class="btn btn-warning float-end me-5">Go back</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 mx-auto">
                            <form action="" method="post" class="needs-validation"
                                novalidate>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Category</label>
                                            <input type="text" placeholder="category" name="n_category"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Event Description</label>
                                            <textarea name="n_description" id="" placeholder="Event Description" cols="30"
                                                rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <input type="submit" value="Add Notification" name="insertNotification"
                                            class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                            if (isset($_POST['insertNotification'])) {
                                $n_category = $_POST['n_category'];
                                $n_description = $_POST['n_description'];
                                $status = 1;

                                $query = mysqli_query($connect,"insert into notifications (n_category,n_description) value ('$n_category','$n_description')");

                                if ($query) {
                                    redirect("manageNotification");
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