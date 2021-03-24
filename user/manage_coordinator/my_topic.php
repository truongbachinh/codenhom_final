<?php
session_start();
include "../connect_db.php";
// $idFaculty = $_GET['idl'];
$userFacultyId = $_SESSION["current_user"]["faculty_id"];
$userId = $_SESSION["current_user"]["u_id"];


$topic = $conn->query("SELECT faculty.*,user.*, topic.* FROM (( faculty INNER JOIN topic ON faculty.f_id = topic.faculty_id) INNER JOIN user ON faculty.f_id = user.faculty_id) WHERE user.u_id = '$userId' AND user.role = 'manager-coordinator'");
$topicSubmit = mysqli_fetch_assoc($topic);

if ($topicSubmit != NULL) {

    $selected_date = ($topicSubmit["topic_deadline"]);
    // echo $selected_date, "a ";
    $duration = 14;
    $duration_type = 'day';
    $date1 = ("2021/05/06 22:00:00");
    $deadline = date('Y/m/d H:i:s', strtotime($selected_date . ' +' . $duration . ' ' . $duration_type));
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

<body class="sidebar-pinned ">
    <?php include 'aside.php' ?>
    <main class="admin-main">
        <!-- Header -->
        <?php include 'header.php' ?>
        <!-- Session -->
    </main>
    <div class="container">
        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="widget-content nopadding">
                <div class="widget-title"> <span class="icon"> <i class="icon-tag"></i> </span>
                    <h5>List Topic</h5>
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
                            <th>View Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $topicInfor = $conn->query("SELECT faculty.*,user.*, topic.* FROM (( faculty INNER JOIN topic ON faculty.f_id = topic.faculty_id) INNER JOIN user ON faculty.f_id = user.faculty_id) WHERE user.u_id = '$userId' AND user.role = 'manager-coordinator'");
                        $topicFacultyInfor = array();
                        while ($tInfor = mysqli_fetch_array($topicInfor)) {
                            $topicFacultyInfor[] = $tInfor;
                        }
                        foreach ($topicFacultyInfor as $row) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row["topic_id"]; ?></td>
                                <td><?php echo $row["topic_name"]; ?></td>
                                <td><?php echo $row["topic_description"]; ?></td>
                                <td><?php echo  $row["topic_deadline"] ?></td>
                                <td><?= $deadline ?></td>
                                <td style="color: red"><a href="listofreport.php?idt=<?= $row["id"] ?>">Select</a></td>
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




<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
if (isset($_POST["addTopic"])) {
    var_dump($_POST);

    $count = 0;
    $sql_user = "SELECT * from topic where topic_id ='$_POST[topicId]'";
    $res = mysqli_query($conn, $sql_user) or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);

    if ($count > 0) {
?>
        <script type="text/javascript">
            alert("Topic Id exits !");
            window.location.replace("./add-topic.php?idl=<?= $idFaculty ?>");
        </script>
    <?php
    } else {
        $addFaculty =   mysqli_query($conn, "INSERT INTO `topic` (`id`, `topic_id`, `topic_name`, `topic_description`, `topic_deadline`, `topic_of_faculty`) VALUES (NULL, '$_POST[topicId]', '$_POST[topicName]', '$_POST[topicDescription]', '$_POST[startDeadLine]', '$idFaculty');");
    ?>
        <script type="text/javascript">
            alert("add faculty success !");
            window.location.replace("./add-topic.php?idl=<?= $idFaculty ?>");
        </script>
<?php
    }
}
?>