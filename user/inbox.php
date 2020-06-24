<?php
session_start();
include_once('../templates/header.php');
include_once('../templates/navuser.php');
require('../connect.php');
?>
<div class="container-fluid text-center p-4">
    <h3>INBOX</h3>
</div>
<?php
$id = $_SESSION['id'];
$inboxquery = "SELECT * FROM report  JOIN progress ON report.progressID=progress.progressID WHERE report.userID=$id";
$inboxget = mysqli_query($connection, $inboxquery);

while ($inbox = mysqli_fetch_array($inboxget)) {
?>
    <!-- mobile -->
    <div class="container d-lg-none text-center p-3 mt-3">

        <div class="card shadow mb-5 bg-white rounded">
            <img src="../assets/img/<?php echo $inbox['reportEvidence']; ?>" class="card-img mx-auto d-block pt-2" style="width:auto ;height:100px;">

            <div class="card-body">
                <strong>Police in charge: </strong>Mohd Arif Zaki<br><strong>Progress status: </strong><?= $inbox['progressstatus']; ?><br><br><strong>Description: </strong><?= $inbox['description']; ?></br>


            </div>
        </div>
    </div>

    <!-- Desktop -->
    <div class="container d-none d-lg-block">
        <div class="container shadow mb-5 bg-white rounded">
            <div class="row">
                <div class="col" style="width:30%;">
                    <img src="../assets/img/<?php echo $inbox['reportEvidence']; ?>" class="card-img mx-auto d-block" style="width:auto ;height:250px;">
                </div>
                <div class="col">
                    <strong>Police in charge: </strong>Mohd Arif Zaki<br><strong>Progress status: </strong><?= $inbox['progressstatus']; ?><br><br><strong>Description: </strong><?= $inbox['description']; ?></br>

                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
include_once('../templates/footer.php');
?>