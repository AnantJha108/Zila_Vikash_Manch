<?php include "include/dbConfig.php";
if (isset($_GET['next'])) {
    $_SESSION['next']=$_GET['next'];
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Here - Zila Vikash Manch</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-5 mb-5 mx-auto">
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="text-center h3 mb-0"><i class="bi bi-building"></i></h5>
                                <a href="registerInstitute.php" class="stretched-link nav-link m-0 p-0 text-white text-center">Register As Institute</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                            <h5 class="text-center h3 mb-0"><i class="bi bi-person"></i></h5>
                                <a href="register.php" class="stretched-link nav-link m-0 p-0 text-white text-center">Register As Candidate</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Register Here as Candidite</div>
                    <div class="card-body">
                        <form action="" method="post" class="needs-validation" novalidate>
                            <div class="mb-2">
                                <div class="form-floating">
                                    <input type="text" placeholder="Name" name="name" class="form-control" required>
                                    <label for="">Name</label>
                                    <div class="invalid-feedback">
                                    Please enter your name
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-floating">
                                    <input type="text" placeholder="Contact" name="contact" class="form-control" required>
                                    <label for="">Contact</label>
                                    <div class="invalid-feedback">
                                    Please enter your contact
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-floating">
                                    <input type="email" placeholder="Email" name="email" class="form-control" required>
                                    <label for="">Email</label>
                                    <div class="invalid-feedback">
                                    Please enter your email
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="form-floating">
                                    <input type="password" placeholder="Password" name="password" class="form-control" required>
                                    <label for="">Password</label>
                                    <div class="invalid-feedback">
                                    Please enter your password
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="submit" name="create" class="btn btn-primary w-100" value="Register">
                            </div>
                        </form>
                        <?php
                           if (isset($_POST['create'])) {
                               $name = $_POST['name'];
                               $contact = $_POST['contact'];
                               $email = $_POST['email'];
                               $password = sha1($_POST['password']);

                               $query = mysqli_query($connect,"insert into accounts (name,contact,email,password) value ('$name','$contact','$email','$password')");
                               if ($query) {
                                if (isset($_SESSION['next'])) {
                                    $_SESSION['user']=$email;
                                    echo "<script>window.open('".$_SESSION['next']."','_self')</script>";
                                }
                                   redirect('login');
                               }
                           }
                        ?>
                    </div>
                    <div class="card-footer">
                        <a href="login.php" class="nav-link float-end small text-muted p-0 m-0">Already registered user?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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