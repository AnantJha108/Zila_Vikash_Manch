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
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="carousel slide" data-bs-ride="carousel" id="banner">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/modi_banner.jpeg" class="w-100" style="height:420px;" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="images/banner-covid.jpg" class="w-100" style="height:420px;" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="images/1.png" class="w-100" style="height:420px;" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="images/projects.jpg" class="w-100" style="height:420px;" alt="">
                        </div>
                    </div>
                    <a href="#banner" class="carousel-control-prev" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a href="#banner" class="carousel-control-next" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-8">
                    <div class="card border border-primary">
                        <div class="card-header bg-primary text-white">Latest Project</div>
                        <div class="card-body py-0 px-1">
                            <table class="table table-sm small table-hover">
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Categoery</th>
                                </tr>
                                <?php
                       $callingProject = mysqli_query($connect,"select * from projects JOIN categories ON projects.category_id=categories.cat_id where status=1 order by projects.pro_id DESC LIMIT 5");
                       $count = 1;
                       while ($row = mysqli_fetch_array($callingProject)) {
                        ?>
                                <tr>
                                    <td><?= date("d-M-Y",strtotime($row['doc']));?></td>
                                    <td><a href="viewProjects.php?pro_id=<?=$row['pro_id'];?>"
                                            class="nav-link m-o p-0 d-inline"><?= $row['pro_title'];?></a>
                                        <?php if ($count == 1): ?>
                                        <span class="badge bg-danger text-white">New</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row['cat_title'];?></td>
                                </tr>
                                <?php $count++; } ?>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="viewAllProject.php" class="btn btn-dark btn-sm float-end ">View more...</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header border-0 bg-danger text-white py-1">
                            <h4 class="h5">Notification</h4>
                        </div>
                        <div class="card-body">
                            <?php
                     $callingNotifications = mysqli_query($connect,"select * from notifications where status=1 order by notifications.n_id DESC LIMIT 5");
                     $count = 1;
                     while ($row = mysqli_fetch_array($callingNotifications)) { ?>
                            <tr>
                                <marquee>
                                    <td>
                                        <?= $row['n_description'];?><span class="badge bg-danger text-white">New</span>
                                    </td>
                                </marquee>
                            </tr>
                            <?php $count++; } ?>
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
</body>

</html>