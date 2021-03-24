<?php
include "connect_db.php";
session_start();
// $user = $conn->query("SELECT * from user where role = 'manager-coordinator'");
// $userRole = array();
// while ($rowUser = mysqli_fetch_array($user)) {
//     $userRole[] = $rowUser;
// }

// $infor = $conn->query("SELECT f.*, u.* FROM faculty as f INNER JOIN user as u ON f.f_manager = u.u_id where role = 'manager-coordinator' ");
// $userInfor = array();
// while ($userInfor = mysqli_fetch_array($infor)) {
//     $userFacultyInfor[] = $userInfor;
// }


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
<title>Manage Faculty</title>
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

<body class="sidebar-pinned ">
    <?php include 'aside.php' ?>
    <main class="admin-main">
        <!-- Header -->
        <?php include 'header.php' ?>
        <!-- Session -->

        <section class="manage-faculty">
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4> Manage Faculty </h4>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group has-search">
                                                <span class="fa fa-search form-control-feedback"></span>
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <a href="" class="btn btn-info float-right" role="button" data-toggle="modal" data-target="#addfaculty"><i class="mdi mdi-clipboard-plus"></i> Add Faculty
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-responsive p-t-10">
                                        <table id="example" class="table text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Faculty ID</th>
                                                    <th>Name Faculty</th>
                                                    <th>Description Faculty</th>
                                                    <th>Manager Facutly</th>
                                                    <!-- <th>Topics</th>
                                                    <th>Articles</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $res = mysqli_query($conn, "select * from faculty");
                                                while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i++ ?></td>
                                                        <td><?= $row["faculty_id"] ?></td>
                                                        <td><?= $row["f_name"] ?></td>
                                                        <td><?= $row["f_description"] ?></td>
                                                        <td><?= $row["f_manager"] ?></td>
                                                        <td>
                                                            <a href="" class="btn btn-info" role="button" data-toggle="modal" data-target="#editFaculty"><i class="mdi mdi-pencil-outline"></i> </a>
                                                            <a href="" class="btn btn-danger" role="button" data-toggle="modal" data-target="#deleteFaculty"><i class="mdi mdi-delete"></i> </a>
                                                            <a href="" class="btn btn-primary" role="button" data-toggle="modal" data-target="#detailFaculty"><i class="mdi mdi-dots-horizontal"></i> </a>
                                                        </td>
                                                    </tr>
                                                <?php                            }
                                                ?>

                                            </tbody>
                                        </table>


                                        <!-- Modal add faculty -->
                                        <div class="modal fade" id="addfaculty" tabindex="-1" role="dialog" aria-labelledby="addfaculty" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addfaculty">Add Faculty</h5>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" name="addFaculty" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="inputfacultyId">Faculty ID</label>
                                                                <input type="text" class="form-control" id="inputFacultyId" name="idFaculty" placeholder="Input Id" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputNameFaculty">Name Faculty</label>
                                                                <input type="text" class="form-control" id="inputNameFaculty" name="nameFaculty" placeholder="Input name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputNameFaculty">Manage Faculty</label>
                                                                <input type="text" class="form-control" id="inputFacultyFaculty" name="facultyManage" placeholder="Input name" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputManager">Faculty Desciption </label>
                                                                <textarea class="form-control" aria-label="With textarea" name="descriptionFaculty" spellcheck="false"></textarea>
                                                                <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 3;" class="cGcvT"></grammarly-extension>
                                                            </div>
                                                            <input type="submit" class="btn btn-warning" name="submitFaculty" value="Create Faculty">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                Close
                                                            </button>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Model edit -->
                                    <div class="modal fade" id="editFaculty" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit
                                                        Faculty
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="">
                                                        <div class="form-group">
                                                            <label for="inputNameFaculty">Name Faculty</label>
                                                            <input type="text" class="form-control" id="inputNameFaculty" name="nameFaculty" Value="Advance Computing">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputfacultyId">Faculty ID</label>
                                                            <input type="text" class="form-control" id="inputFacultyId" name="facultyId" disabled value="Faculty_01">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputManager">Desciption</label>
                                                            <textarea class="form-control" aria-label="With textarea" spellcheck="false"></textarea>
                                                            <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 3;" class="cGcvT"></grammarly-extension>
                                                        </div>
                                                        <input type="button" class="btn btn-primary" name="change" value="Save changes">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            Close
                                                        </button>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal delete -->


                                <div class="modal fade" id="deleteFaculty" tabindex="-1" role="dialog" aria-labelledby="deleteFaculty" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-align-top-left" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteFaculty">Confirm Delete Faculty
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                This action cannot undo. Are you sure you want to delete this
                                                faculty?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Detail -->

                                <div class="modal fade" id="detailFaculty" tabindex="-1" role="dialog" aria-labelledby="detailFaculty" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailFaculty">Detai Infomation Faculty
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="detail">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td>Name Faculty</td>
                                                                <td>Advance Computing</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Faculty ID</td>
                                                                <td>Faculty_01</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Manager Faculty</td>
                                                                <td>Nguyen Van A</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Amount of Topic</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Amount of Student</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Amount of Articles</td>
                                                                <td>2</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Desciption</td>
                                                                <td>
                                                                    Desciption here...
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="button-close float-right">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
</body>


</body>


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

</body>

</html>

<?php
if (isset($_POST["submitFaculty"])) {


    var_dump($_POST);

    $count = 0;
    $sql_user = "SELECT * from faculty where faculty_id ='$_POST[idFaculty]'";
    $res = mysqli_query($conn, $sql_user) or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
?>
        <script type="text/javascript">
            alert("Faculty Id exits !");
            window.location.replace("./manage_facutlies.php");
        </script>
    <?php
    } else {
        $addFaculty =   mysqli_query($conn, "INSERT INTO `faculty` (`f_id`, `f_name`, `f_description`, `f_manager`, `faculty_id`) VALUES (NULL, '$_POST[nameFaculty]', '$_POST[descriptionFaculty]', '$_POST[facultyManage]', '$_POST[idFaculty]');");
    ?>
        <script type="text/javascript">
            alert("add faculty success !");
            window.location.replace("./manage_facutlies.php");
        </script>
<?php
    }
}
?>