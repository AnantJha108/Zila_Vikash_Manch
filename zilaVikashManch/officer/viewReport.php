<?php include "../include/dbConfig.php";

authCheck('admin','login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Project | Officer Panel - Zila Vikash Manch</title>
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
                    <div class="col-8">View Reports</div>
                    <!-- <div class="col-4">
                        <a href="insertProject.php" class="btn btn-success float-end me-5">Publish Project</a>
                    </div> -->
                </div>
                    <?php
                     $id = $_GET['rep_id'];
                     $callingProjects = mysqli_query($connect,"select * from reports JOIN accounts  ON reports.account_id = accounts.id JOIN projects ON reports.project_id=projects.pro_id where r_id = '$id'");
                     $row = mysqli_fetch_array($callingProjects);
                     ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-9">
                                <h1 class="display-4"><?=$row['pro_title'];?></h1>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <strong>Date of submit:</strong><?= date("D d-M-Y h:i:s A",strtotime($row['doc']));?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <?=$row['content'];?>
                                    </div>
                                    <div class="card-footer">
                                        Support Files: <strong><?= $row['attachment'];?></strong>
                                        <a href="../images/reports/<?= $row['attachment'];?>" class="ms-2">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-header">
                                        Contributor Details
                                    </div>
                                    <div class="card-body">
                                        <h6>
                                            <span class="float-start">Name</span>
                                            <span class="float-end"><?= $row['name'];?></span>
                                        </h6>
                                        <div class="clearfix"></div>
                                        <hr class="m-2 p-0">
                                        <h6>
                                            <span class="float-start">Email</span>
                                            <span class="float-end"><?= $row['email'];?></span>
                                        </h6>
                                        <div class="clearfix"></div>
                                        <hr class="m-2 p-0">
                                        <h6>
                                            <span class="float-start">Contact</span>
                                            <span class="float-end"><?= $row['contact'];?></span>
                                        </h6>
                                        <div class="clearfix"></div>
                                        <hr class="m-2 p-0">
                                        <h6>
                                            <span class="float-start">Address</span>
                                            <span class="float-end"><?= $row['address'];?></span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>