<?php
require('../connect.php');
include_once('../templates/header.php');
include_once('../templates/navpolice.php');
?>
<div class="container">
    <div class="container-fluid text-center p-4 d-none d-md-block">
        <h3>Latest Report</h3>
    </div>
    <?php
    //query to get data from report table and join with type table
    $newsquery = "SELECT * FROM report  JOIN user ON report.userID=user.userID";

    //to performs query and save in array
    $newsget = mysqli_query($connection, $newsquery);
    $newsdesktop = mysqli_query($connection, $newsquery);
    //display the data in array 
    //  
    $countingquery = "SELECT COUNT(reportID) FROM report";
    $countingget = mysqli_query($connection, $countingquery);
    while ($counting =  mysqli_fetch_array($countingget)) {
        $allcount = $counting['COUNT(reportID)'];
    }
    $counting0query = "SELECT COUNT(reportID) FROM report WHERE progressID='0'";
    $counting0get = mysqli_query($connection, $counting0query);

    $counting1query = "SELECT COUNT(reportID) FROM report WHERE progressID='1'";
    $counting1get = mysqli_query($connection, $counting1query);

    $counting2query = "SELECT COUNT(reportID) FROM report WHERE progressID='2'";
    $counting2get = mysqli_query($connection, $counting2query);
    ?>
    <!-- mobile -->

    <div class="container d-md-none p-3 mt-3">
        <h3 class="font-weight-bolder text-primary">Report Counter</h3>
        <div class="container">
            <div class="row">
                <div class="col shadow-sm mb-3 bg-white rounded">
                    <p>No action taken report</p>
                    <div class="progress mb-3">
                        <?php while ($counter = mysqli_fetch_array($counting0get)) { ?>
                            <?php $count0 = ($counter['COUNT(reportID)'] / $allcount) * 100;
                            $count0num = $counter['COUNT(reportID)']; ?>

                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $count0 . '%'; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $count0num; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col shadow-sm mb-3 bg-white rounded">
                    <p>Completed</p>
                    <div class="progress mb-3">
                        <?php while ($counter = mysqli_fetch_array($counting1get)) { ?>
                            <?php $count1 = ($counter['COUNT(reportID)'] / $allcount) * 100;
                            $count1num = $counter['COUNT(reportID)']; ?>
                            <div class="progress-bar bg-success" role="progressbar" style="width:<?= $count1 . '%'; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $count1num; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col shadow-sm mb-3 bg-white rounded">
                    <p>Ignored Report</p>
                    <div class="progress mb-3">
                        <?php while ($counter = mysqli_fetch_array($counting2get)) { ?>
                            <?php $count2 = ($counter['COUNT(reportID)'] / $allcount) * 100;
                            $count2num = $counter['COUNT(reportID)']; ?>
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $count2 . '%'; ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?= $count2num; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h3 class="font-weight-bolder text-primary">Latest Report</h3>
        <div class=" scrolling-wrapper">
            <?php while ($rpt = mysqli_fetch_array($newsget)) {
            ?>
                <a href="<?php echo $base_url; ?>patrolpolice/reportcheck.php?id=<?= $rpt['reportID']; ?>" class="scrolling-card col-6 border shadow-sm mb-3 bg-white rounded ml-1 mt-3" style="color:black;">


                    <div class="mt-2 pb-3 text-center">


                        <div class="content-cd">
                            <img src="../assets/img/<?php echo $rpt['reportEvidence']; ?>" class="img-thumbnail" style="height:180px;width:100% ;">
                            <?= $rpt['reportcreated']; ?>
                            <div class="push"></div>
                        </div>

                        <footer class="footer-cd">
                            <?php if ($rpt['progressID'] == '1') {
                            ?>

                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Accepted</div>
                                </div>

                            <?php } elseif ($rpt['progressID'] == '2') {
                            ?>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Ignore</div>
                                </div>
                            <?php } else {
                            ?>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 10%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">No action Taken</div>
                                </div>
                            <?php }
                            ?>
                        </footer>

                    </div>

                </a>
            <?php }
            ?>
        </div>


    </div>
    <!--desktop-->

    <div class="container d-none d-md-block">
        <div class="row text-center pb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Total Report
                    </div>
                    <div class="card-body">
                        <h2 class="card-title"><?= $allcount; ?></h2>

                    </div>
                    <div class="card-footer">
                        Reported
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        No action taken
                    </div>
                    <div class="card-body">
                        <h2 class="card-title"><?= $count0num; ?></h2>
                    </div>
                    <div class="card-footer">
                        Reported
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Completed
                    </div>
                    <div class="card-body">
                        <h2 class="card-title"><?= $count1num; ?></h2>
                    </div>
                    <div class="card-footer">
                        Reported
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Ignored Report
                    </div>
                    <div class="card-body">
                        <h2 class="card-title"><?= $count2num; ?></h2>
                    </div>
                    <div class="card-footer">
                        Reported
                    </div>
                </div>
            </div>
        </div>
        <?php while ($rpt = mysqli_fetch_array($newsdesktop)) { ?>
            <div class="container">
                <a href="<?php echo $base_url; ?>patrolpolice/reportcheck.php?id=<?= $rpt['reportID']; ?>" style="color: black;">
                    <div class="row border shadow mb-3 bg-white rounded">
                        <div class="col-3 pt-3 pb-3 text-center">
                            <img src="../assets/img/<?php echo $rpt['reportEvidence']; ?>" class="img-thumbnail" style="height:100px;width:auto ;">
                        </div>
                        <div class="col">
                            <p class="card-text"><small class="text-muted"><?= $rpt['reportcreated']; ?></small></p>
                            <p class="card-text">Report Description: <?= $rpt['description']; ?></p>
                            <?php if ($rpt['progressID'] == '1') { ?>

                                <div class="alert alert-success" role="alert">
                                    Accepted
                                </div>

                            <?php } elseif ($rpt['progressID'] == '2') { ?>
                                <div class="alert alert-danger" role="alert">
                                    Dismissed
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-secondary" role="alert">
                                    No-action-taken
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            </div>

        <?php }
        ?>

    </div>

    <?php
    include_once('../templates/footer.php');
    ?>