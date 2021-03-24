<?php
session_start();
include "../connect_db.php";
$userId = $_SESSION["current_user"]["u_id"];
$result = mysqli_query($conn, "SELECT faculty.*,user.*, topic.* FROM (( faculty INNER JOIN topic ON faculty.f_id = topic.faculty_id) INNER JOIN user ON faculty.f_id = user.faculty_id) WHERE user.u_id = '$userId' AND user.role = 'student'");
$faculty = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font-cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <!-- bootstrap 4 cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- jquery 4 cdn -->
    <link src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</head>

<body>
    <h1>Faculty: <?= $faculty["f_name"] ?></h1>
    <div class="container">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-content nopadding">
                <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                    <h5>List Categories</h5>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Topic id</th>
                            <th>Topic name</th>
                            <th>Topic description</th>
                            <th>Topic Start deadline</th>
                            <th>Topic End deadline</th>
                            <th>Select Topic To sucbmit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $topicInfor = $conn->query("SELECT faculty.*,user.*, topic.* FROM (( faculty INNER JOIN topic ON faculty.f_id = topic.faculty_id) INNER JOIN user ON faculty.f_id = user.faculty_id) WHERE user.u_id = '$userId' AND user.role = 'student'");
                        $topicStudentInfor = array();
                        while ($tInfor = mysqli_fetch_array($topicInfor)) {
                            $topicStudentInfor[] = $tInfor;
                        }

                        foreach ($topicStudentInfor as $row) {
                            $selected_date = ($row["topic_deadline"]);
                            // echo $selected_date, "a ";
                            $duration = 14;
                            $duration_type = 'day';
                            $deadline = date('Y/m/d H:i:s', strtotime($selected_date . ' +' . $duration . ' ' . $duration_type));
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row["topic_id"]; ?></td>
                                <td><?php echo $row["topic_name"]; ?></td>
                                <td><?php echo $row["topic_description"]; ?></td>
                                <td><?php echo  $row["topic_deadline"] ?></td>
                                <td><?= $deadline ?></td>
                                <td><a href="submit.php?idf=<?= $row["faculty_id"] ?>&idt=<?= $row['id'] ?>">Select</a></td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

</body>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>