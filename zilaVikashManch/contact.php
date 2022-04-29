<?php include "include/dbConfig.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Purnea Panel - Zila Vikash Manch</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-5 mx-auto">
                <div class="card border border-primary">
                    <div class="card-header bg-primary text-white">
                    <h5>Give Your Feedback Here</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter valid name
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Contact <span class="text-danger">*</span></label>
                                <input type="text" name="contact" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter valid contact
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Message<span class="text-danger">*</span></label>
                                 <textarea name="msg" class="form-control" rows="7"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="send" value="send" class="btn btn-dark float-end">
                            </div>
                        </form>
                        <?php
                           
                        if (isset($_POST['send'])) {
                            $name = $_POST['name'];
                            $msg = $_POST['msg']; 
                            $contact = $_POST['contact']; 

                            $query = mysqli_query($connect,"insert into feedbacks (feed_by,msg,contact) value ('$name','$msg','$contact')");
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
