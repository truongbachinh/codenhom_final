<?php
include "connect_db.php";
session_start();

$i = 1;
$res = mysqli_query($conn, "select * from user");
$resFaculty = $conn->query("SELECT * from faculty");
$faculty = array();
while ($rowFaculty =  mysqli_fetch_array($resFaculty)) {
    $faculty[] = $rowFaculty;
}

$infor = $conn->query("SELECT f.*, u.* FROM user as u INNER JOIN faculty as f ON  u.faculty_id = f.f_id ");
$userInforFaculty = array();
while ($userInfor = mysqli_fetch_array($infor)) {
    $userInforFaculty[] = $userInfor;
}


?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="author" />
<meta content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" name="description" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" />
<meta property="og:description" content="atlas is Bootstrap 4 based admin panel.It comes with 100's widgets,charts and icons" />
<meta property="og:image" content="https://cdn.dribbble.com/users/180706/screenshots/5424805/the_sceens_-_mobile_perspective_mockup_3_-_by_tranmautritam.jpg" />
<meta property="og:site_name" content="atlas " />
<title>Home Page</title>
<link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
<link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
<link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/light/assets/vendor/pace/pace.css' />
<script src='https://d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/light/assets/vendor/pace/pace.min.js'></script>
<!--vendors-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css' />
<link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/bundles/fc681442cee6ccf717f33ccc57ebf17a4e0792e1.css' />


<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css' />
<!--Material Icons-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/0940f25997c8e50e65e95510b30245d116f639f0/light/assets/fonts/feather/feather-icons.css' />
<!--Bootstrap + atmos Admin CSS-->
<link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/16e33a95bb46f814f87079394f72ef62972bd197/light/assets/css/atmos.min.css' />
<!-- Additional library for page -->
<!-- <link rel="stylesheet" type='text/css' href="./css/student.css" /> -->

<body class="sidebar-pinned ">
    <?php include 'aside.php' ?>
    <main class="admin-main">
        <!-- Header -->
        <?php include 'header.php' ?>
        <!-- Session -->
        <section class="admin-content">
            <div class="container m-t-30" style="margin-top: 0">
                <div class="row justify-content-md-center">
                    <div class="col-md-12 mt-4 mb-4" style="background-color: #FFFFFF; font-weight: 
                    bold; padding-bottom: 1%;padding-top: 1%; border-radius: 10px;">
                        MANAGE SYTEM > <a href="#" style="color: blue;">MANAGE USER</a></div>
                    <div class="col-md-12 mt-4 mb-4" style="font-weight: bold;">
                        <img src="../images/users2.png" /> USER
                    </div>

                    <div class="form-group col-md-12 row" style="background-color: #F4F7FC; border-radius: 10px;">
                        <div class="form-group col-md-12 row" style="margin: 2%">
                            <div class="form-group has-search col-md-6">
                                <input type="text" class="form-control col-md-6" placeholder="Search">
                            </div>


                            <!-- Modal add user -->
                            <div class="form-group col-md-6">
                                <button type="button" class="btn btn-primary col-md-4 float-right" data-toggle="modal" data-target="#exampleModalCenter" style="margin-right: 10%;">
                                    Add User
                                </button>

                                <!-- Model add user  -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New User
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" name="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="fullName">FullName</label>
                                                        <input type="text" class="form-control" id="inputFullName" name="fullName" Value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userName">UserName </label>
                                                        <input type="text" class="form-control" id="inputUserName" name="userName" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userName">Password </label>
                                                        <input type="text" class="form-control" id="inputUserName" name="password" value="123456" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail">Email</label>
                                                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputRole" class="col-md-12" style="padding: 0">Role</label>
                                                        <select name="roleOption" class="form-select" style="width: 100%;height: 34px;border-color: #D4D2D2;border-radius: 5px">
                                                            <option selected>--Select Role--</option>
                                                            <option value="student">Student</option>
                                                            <option value="manager-coordinator">Manager Coordinator</option>
                                                            <option value="manager-marketing">Manager Marketing</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputStatus">Status</label>
                                                        <select name="statusOption" class="form-select" style="width: 100%;height: 34px;border-color: #D4D2D2;border-radius: 5px">
                                                            <option selected>--Select--</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Non-active</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="inputRole" class="col-md-12" style="padding: 0">Faculty</label>
                                                        <select name="facultyOption" class="form-select" style="width: 100%;height: 34px;border-color: #D4D2D2;border-radius: 5px">
                                                            <option selected>--Select Faculty--</option>
                                                            <?php
                                                            foreach ($faculty as $selectFacuty) {
                                                            ?>
                                                                <option value="<?= $selectFacuty["f_id"] ?>"><?= $selectFacuty["f_name"] ?></option>


                                                            <?php

                                                            }
                                                            ?>

                                                        </select>
                                                    </div>
                                                    <div class="alert alert-success" id="success" style="margin-top: 10px; display: none">
                                                        <strong>Success!</strong> Add user Successfully.
                                                    </div>
                                                    <div class="alert alert-danger" id="failure" style="margin-top: 10px; display: none">
                                                        <strong>Already exist!</strong> The Username Alreadly Exits!
                                                    </div>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Cancel
                                                    </button>
                                                    <input type="submit" class="btn btn-primary" name="addNewUser" value="Add New">
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0; padding-right:0">
                            <table class="table table-bordered">
                                <thead class="thead" style="background-color: #F4F7FC; text-align: center;">
                                    <tr style="color: black !important">
                                        <th style="color: black !important" scope="col">NO.</th>
                                        <th style="color: black !important" scope="col">AVATAR</th>
                                        <th style="color: black !important;width: 16%;" scope="col">NAME</th>
                                        <th style="color: black !important" scope="col">USERNAME</th>
                                        <th style="color: black !important" scope="col">EMAIL</th>
                                        <th style="color: black !important" scope="col">Faculty</th>
                                        <th style="color: black !important" scope="col">ROLE</th>
                                        <th style="color: black !important" scope="col">STATUS</th>
                                        <th style="color: black !important; width: 10%;" scope="col">CREATE DATE TIME</th>
                                        <th style="color: black !important; width: 10%;" scope="col">UPDATE DATE TIME</th>
                                        <th scope="col"><img src="../images/dots48.png"></th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                    foreach ($userInforFaculty as $row) {
                                    ?>
                                        <tr>
                                            <th scope="row" style="padding: 2.5%;"><?= $i++ ?></th>
                                            <td><img src="../images/AvatarListofReport.png"></td>
                                            <td id="fullname" style="padding: 2.5%;"><?= (!empty($row['fullname']) ? $row['fullname'] : "Null") ?></td>
                                            <td id="username" style="padding: 2.5%;"><?= (!empty($row['username']) ? $row['username'] : "Null") ?></td>
                                            <td style="padding: 2.5%;"><?= (!empty($row['email']) ? $row['email'] : "Null") ?></td>
                                            <td style="padding: 2.5%;"><?= (!empty($row['f_name']) ? $row['f_name'] : "Null") ?></td>
                                            <td style="padding: 2.5%;"><?= (!empty($row['role']) ? $row['role'] : "Null") ?></td>
                                            <?php
                                            if (!empty($row['status'] == 1)) {
                                            ?>

                                                <td style="padding: 1.5%;"><button style="border-radius: 10px" type="button" class="btn btn-success">Active</button></td>

                                            <?php
                                            } else {  ?>
                                                <td style="padding: 1.5%;"><button style="border-radius: 10px" type="button" class="btn btn-danger">Block</button></td>
                                            <?php
                                            }



                                            ?>

                                            <td style="padding: 2.5%;"><?php echo date("d/m/y H:i", $row["u_create_time"]); ?></td>
                                            <?php
                                            if (!empty($row['u_update_time'] == 0)) {

                                            ?>
                                                <td style="padding: 2.5%;">Not Update</td>

                                            <?php
                                            } else {  ?>
                                                <td style="padding: 2.5%;"><?php echo date("d/m/y H:i", $row["u_update_time"]); ?></td>
                                            <?php
                                            }
                                            ?>


                                            <td style="padding: 1.5%;width: 12%;">

                                                <button name="editUserButton" class="updateUserForm" data-id="<?= $row["u_id"] ?>" data-toggle="modal" data-target="#editUser" style="border:none; background:rgb(237, 242, 249); ; padding: 0">
                                                    <img src="../images/pencil.png"></button>

                                                <!-- Model edit user  -->
                                                <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit User
                                                                </h5>

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" name="formEditUser" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <label style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;" for="fullName">User Id</label>
                                                                        <input type="text" name="idUser" class="form-control" id="idUser" readonly>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;" for="fullName">Full Name</label>
                                                                        <input type="text" class="form-control" id="fullname" name="fullName" require>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;" for="userName">User Name</label>
                                                                        <input type="text" class="form-control" id="inputUserName" name="userName" require>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;" for="userName">Password</label>
                                                                        <input type="text" class="form-control" id="inputUserName" name="password" require>
                                                                    </div>



                                                                    <div class="form-group">
                                                                        <label style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;" for="inputEmail">Email</label>
                                                                        <input type="email" class="form-control" id="inputEmail" name="Email" require>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputRole" style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;">Role</label>
                                                                        <select require name="roleOption" class="form-select" style="width: 100%;height: 34px;border-color: #D4D2D2;border-radius: 5px">
                                                                            <option selected value="student">Student</option>
                                                                            <option value="manager-coordinator">Manager Coordinator</option>
                                                                            <option value="manager-marketing">Manager Marketing</option>
                                                                            <option value="admin">Admin</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="inputStatus" style="    text-align: left;     /* text-align: start; */     display: block;     font-weight: 500;">Status</label>
                                                                        <select name="statusOption" class="form-select" style="width: 100%;height: 34px;border-color: #D4D2D2;border-radius: 5px">
                                                                            <option selected>--Select--</option>
                                                                            <option value="1">Active</option>
                                                                            <option value="0">Non-active</option>
                                                                        </select>
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <input type="submit" class="btn btn-primary" name="changeUser" value="Save changes">
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                        </div>

                        <!-- Model delete  -->

                        <button class="deleteUserForm" data-id="<?= $row["u_id"] ?>" style="border:none; background: rgb(237, 242, 249);; padding: 0" data-toggle="modal" data-target="#deleteUser">
                            <img src="../images/trash.png">
                        </button>
                        <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle" style="padding-left: 36%;">DELETE USER</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want delete user?
                                    </div>
                                    <div class="modal-footer" style="    display: flow-root;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Model view -->
                        <button class="viewUserForm" data-id="<?= $row["u_id"] ?>" data-toggle="modal" data-target="#viewUser" style="border:none; background: rgb(237, 242, 249);; padding: 0">
                            <img src="../images/dots.png"></button>

                        <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Information Detail - Nguyen Thu Thuy
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="about-student">
                                        <div class="tab-content profile-tab" id="myTabContent">
                                            <div class="tab-pane fade active show" id="inforStudent" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>FullName</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Nguyen Thu Thuy</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>UserName</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Thuy</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>haducc246@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Create Date</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>11/11/2020</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Role</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Student</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Status</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Active</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                        </tr>
                                    <?php
                                    } ?>
                                    </tbody>
                                    </table>
                                    </div>
                                </div>

                            </div>
                        </div>
        </section>
    </main>
</body>
<!-- jquery 4 cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS 
    -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://d33wubrfki0l68.cloudfront.net/bundles/85bd871e04eb889b6141c1aba0fedfa1a2215991.js'></script>
<!--page specific scripts for demo-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-66116118-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-66116118-3');
</script>

<!--Additional Page includes-->
<script src='https://d33wubrfki0l68.cloudfront.net/js/c36248babf70a3c7ad1dcd98d4250fa60842eea9/light/assets/vendor/apexchart/apexcharts.min.js'></script>
<!--chart data for current dashboard-->
<script src='https://d33wubrfki0l68.cloudfront.net/js/d678dabfdc5c3131d492af7ef517fbe46fbbd8e4/light/assets/js/dashboard-01.js'></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var id;
        var btnDelete = document.getElementById('updateUserForm');

        $('#editUser').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            id = button.data('id');
            console.log(id);
            $('input[id=idUser]').val(id);

        });
    })
    document.addEventListener('DOMContentLoaded', function() {
        var id;
        var btnDelete = document.getElementById('deleteUserForm');

        $('#deleteUser').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            id = button.data('id');
            console.log(id);
            $('#idUser').val("id");
            $('input[id=idUser]').val(id);

        });
    })
    document.addEventListener('DOMContentLoaded', function() {
        var id;
        var btnDelete = document.getElementById('viewUserForm');

        $('#viewUser').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            id = button.data('id');
            console.log(id);
            $('#idUser').val("id");
            $('input[id=idUser]').val(id);

        });
    })
</script>


</body>

</html>

<?php
if (isset($_POST["addNewUser"])) {

    $count = 0;
    $sql_user = "select * from user where username ='$_POST[userName]'";
    $res = mysqli_query($conn, $sql_user) or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);
    if ($count > 0) {
?>
        <script type="text/javascript">
            document.getElementById("success").style.display = "none";
            document.getElementById("failure").style.display = "block";
        </script>
        <?php
    } else {

        $addUser = $conn->query("INSERT INTO `user` (`u_id`, `username`, `password`, `email`, `status`, `role`,`faculty_id`, `fullname`, `u_create_time`)
        VALUES (NULL, '$_POST[userName]', '$_POST[password]', '$_POST[email]', '$_POST[statusOption]', '$_POST[roleOption]',$_POST[facultyOption], '$_POST[fullName]', '" . time() . "');");
        if ($addUser == true) {
        ?>
            <script type="text/javascript">
                alert("Add user successful");
                window.location.replace("./listOfUser.php");
            </script>

        <?php
        }
    }
}
if (isset($_POST["changeUser"])) {
    var_dump($_POST);
    $updateUser = $conn->query("UPDATE `user` SET `username` = '$_POST[userName]', `password` ='$_POST[password]', `email`= '$_POST[Email]', `status` ='$_POST[statusOption]', `role` ='$_POST[roleOption]', `fullname` = '$_POST[fullName]', `u_update_time` =  '" . time() . "' WHERE `u_id` = '$_POST[idUser]'");
    if ($updateUser == true) {
        ?>
        <script type="text/javascript">
            alert("Add user successful");
            window.location.replace("./listOfUser.php");
        </script>

<?php
    }
}

?>