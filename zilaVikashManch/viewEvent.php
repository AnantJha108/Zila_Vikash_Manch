<?php include "include/dbConfig.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District Purnea Panel - Zila Vikash Manch</title>
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<body>
    <?php include "header.php"; ?>
    <div class="container-fluid">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="h4"> Upcoming Events</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Event Sponser</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                        </tr>
                        <?php
                               $callingEvents = mysqli_query($connect,"select * from events where status=1");
                               while ($row = mysqli_fetch_array($callingEvents)) { ?>
                        <tr>
                            <td><?= $row['category'];?></td>
                            <td><?= $row['event_sponser'];?></td>
                            <td><?= $row['event_description'];?></td>
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
    <?php include "footer.php"; ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>