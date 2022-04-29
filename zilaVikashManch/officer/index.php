<?php include "../include/dbConfig.php";

authCheck('admin','login');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Panel - Zila Vikash Manch</title>
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
            <div class="col-10 p-3">
                <div class="row g-2">
                    <div class="col-3">
                        <div class="card bg-success text-white shadow">
                            <div class="card-body">
                                <h1 class="display-3">
                                    <?php
                                    $query=mysqli_query($connect,"select * from projects");
                                    echo $count = mysqli_num_rows($query);
                                    ?>
                                </h1>
                                <p class="text-small">Total complete Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bg-danger text-white shadow">
                            <div class="card-body">
                                <h1 class="display-3">
                                    <?php
                                    $query=mysqli_query($connect,"select * from reports");
                                    echo $count = mysqli_num_rows($query);
                                    ?>
                                </h1>
                                <p class="text-small">Total Open Project</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bg-info text-white shadow">
                            <div class="card-body">
                                <h1 class="display-3">
                                    <?php
                                    $query=mysqli_query($connect,"select * from accounts where type='1'");
                                    echo $count = mysqli_num_rows($query);
                                    ?>
                                </h1>
                                <p class="text-small">Total Register Institute</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                <h1 class="display-3">
                                    <?php
                                    $query=mysqli_query($connect,"select * from accounts where type='0'");
                                    echo $count = mysqli_num_rows($query);
                                    ?>
                                </h1>
                                <p class="text-small">Total Register Candidate</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header bg-secondary">Latest Project</div>
                            <div class="card-body p-1">
                                <table class="table table-sm">
                                    <tr>
                                        <td>P.id</td>
                                        <td>Title</td>
                                        <td>Status</td>
                                        <td>Date</td>
                                    </tr>
                                    <?php
                       $callingProject = mysqli_query($connect,"select * from projects JOIN categories ON projects.category_id=categories.cat_id order by projects.pro_id DESC LIMIT 5");
                       $count = 1;
                       while ($row = mysqli_fetch_array($callingProject)) {
                        ?>
                            <tr>
                                <td><?= $row['pro_id'];?></td>
                                <td><a href="../viewProjects.php?pro_id=<?=$row['pro_id'];?>" class="nav-link m-o p-0 d-inline"><?= $row['pro_title'];?></a>
                                    <?php if ($count == 1): ?>
                                    <span class="badge bg-danger text-white">New</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= $row['status'];?></td>
                                <td><?= date("d-M-Y",strtotime($row['doc']));?></td>
                            </tr>
                            <?php $count++; } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header bg-secondary">Latest Events</div>
                            <div class="card-body p-1">
                                <table class="table table-sm">
                                    <tr>
                                        <td>Event Id</td>
                                        <td>Title</td>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>Location</td>
                                    </tr>
                                    <?php
                       $callingEvent = mysqli_query($connect,"select * from events");
                       $count = 1;
                       while ($row = mysqli_fetch_array($callingEvent)) {
                        ?>
                        <tr>
                            <td><?= $row['e_id'];?></td>
                            <td><?= $row['category'];?></td>
                            <td><?= date("d-M-Y",strtotime($row['date']));?></td>
                            <td><?= date("h:i A",strtotime($row['doc']));?></td>
                            <td><?= $row['venue'];?></td>
                        </tr>
                        <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>