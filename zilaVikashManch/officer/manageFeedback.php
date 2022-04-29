<?php include "../include/dbConfig.php";

authCheck('admin','login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Institute | Officer Panel - Zila Vikash Manch</title>
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
                <div class="row">
                    <div class="col-12">Manage Feedback</div>
                </div>
                <table class="table mt-3">
                    <tr>
                        <th>#id</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Contact</th>
                        <th>Doc</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $callingInstitute=mysqli_query($connect,"select * from feedbacks");
                    while ($row=mysqli_fetch_array($callingInstitute)) {?>
                        <tr>
                        <td><?=$row['feed_id'];?></td>
                        <td><?=$row['feed_by'];?></td>
                        <td><?=$row['msg'];?></td>
                        <td><?=$row['contact'];?></td>
                        <td><?=$row['doc'];?></td>
                        <td>
                            <a href="" class="btn btn-danger btn-sm">X</a>
                        </td>
                    </tr>
                   <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>