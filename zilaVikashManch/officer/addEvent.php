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
                            <h1 class="h4 fs-bolder">Add Event</h1>
                        </div>
                        <div class="col-4">
                            <a href="manageEvent.php" class="btn btn-warning float-end me-5">Go back</a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 mx-auto">
                            <!-- <div class="card">
                                <div class="card-header text-white bg-dark">
                                    <h2 class="h5 text-center">Add Event</h2>
                                </div>
                                <div class="card-body"> -->
                            <form action="" method="post" enctype="multipart/form-data" class="needs-validation"
                                novalidate>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="">Category</label>
                                            <input type="text" placeholder="category" name="category"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="">Event Sponsers</label>
                                            <input type="text" placeholder="Event Sponsers" name="e_spon"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="">Event Description</label>
                                            <textarea name="e_des" id="" placeholder="Event Description" cols="30"
                                                rows="6" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="">Event Date</label>
                                            <input type="date" placeholder="Event Date" name="date" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="">Event End Date</label>
                                                    <input type="date" placeholder="Event Sponsers" name="event_Spon"
                                                        class="form-control" required>
                                                </div>
                                            </div> -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="">Event Location</label>
                                            <input type="text" placeholder="Event Location" name="location"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="">Event Time</label>
                                            <input type="time" placeholder="Event Time" name="doc" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="">Event Featured Image</label>
                                            <input type="file" placeholder="Event Featured Image" name="image"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <input type="submit" value="Add Event" name="insertEvent"
                                            class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                            if (isset($_POST['insertEvent'])) {
                                $image = NULL;
                                $category = $_POST['category'];
                                $e_spon = $_POST['e_spon'];
                                $e_des = $_POST['e_des'];
                                $date = $_POST['date'];
                                $location = $_POST['location'];
                                $doc = $_POST['doc'];
                                $status = 1;

                                if ($_FILES['image'] != "") {
                                    $image = $_FILES['image']['name'];
                                    $tmp_image = $_FILES['image']['tmp_name'];
                                    move_uploaded_file($tmp_image,"../images/event/$image");
                                }

                                $query = mysqli_query($connect,"insert into events (category,event_sponser,event_description,date,venue,doc,status,image) value ('$category','$e_spon','$e_des','$date','$location','$doc','$status','$image')");

                                if ($query) {
                                    redirect("manageEvent");
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