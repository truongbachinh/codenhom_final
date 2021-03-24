<?php
session_start();
include "../connect_db.php";
$userFacultyId = $_SESSION["current_user"]["faculty_id"];
$userId = $_SESSION["current_user"]["u_id"];
$infor = $conn->query("SELECT f.*, u.* FROM user as u INNER JOIN faculty as f ON u.faculty_id = f.f_id where role = 'manager-coordinator' and u_id = '$userId' ");
$userFacultyInfor = array();
while ($userInfor = mysqli_fetch_array($infor)) {
    $userFacultyInfor[] = $userInfor;
}
$amountS = $conn->query("SELECT count(`u_id`) from  `user` where `role` = 'student' AND `faculty_id` = '$userFacultyId'");
$amountStudent = mysqli_fetch_assoc($amountS);



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
    <div>
        <h1 style="color:red">Tk <?= $_SESSION["current_user"]["fullname"] ?></h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-content nopadding">
                <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                    <h5>List Categories</h5>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Faculty id</th>
                            <th>Faculty name</th>
                            <th>Amount Student</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($userFacultyInfor as $uFaculty) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $uFaculty["faculty_id"]; ?></td>
                                <td><?php echo $uFaculty["f_name"]; ?></td>
                                <td><?php echo $amountStudent["count(`u_id`)"] ?></td>
                                <td><a href="add-topic.php?idl=<?php echo $uFaculty["f_id"]; ?>">Select</a></td>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>