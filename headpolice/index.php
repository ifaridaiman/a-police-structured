<?php
include_once('../templates/header.php');
include_once('../templates/navhead.php');
require('../connect.php');
?>
<div class="container">
    <div class="container-fluid text-center p-4">
        <h3>Latest Report</h3>
    </div>
    <?php
    //query to get data from report table and join with type table
    $newsquery = "SELECT * FROM report JOIN user ON report.userID=user.userID";

    //to performs query and save in array
    $newsget = mysqli_query($connection, $newsquery);
    //display the data in array 
    while ($rpt = mysqli_fetch_array($newsget)) {

    ?>
        <!-- mobile -->
        <div class="container d-md-none p-3 mt-3">
            <a href="<?php echo $base_url; ?>headpolice/reporthistory.php?id=<?= $rpt['reportID']; ?>" style="color: black;">
                <div class="container border shadow mb-5 bg-white rounded">
                    <div class="row">
                        <div class="col pt-3 pb-3">
                            <img src="../assets/img/<?php echo $rpt['reportEvidence']; ?>" class="card-img" style="width:auto ;">
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
                </div>
            </a>
        </div>
        <!--desktop-->
        <div class="container d-none d-md-block">
            <a href="<?php echo $base_url; ?>headpolice/reporthistory.php?id=<?= $rpt['reportID']; ?>" style="color: black;">
                <div class="container border shadow mb-5 bg-white rounded">
                    <div class="row">
                        <div class="col pt-3 pb-3">
                            <img src="../assets/img/<?php echo $rpt['reportEvidence']; ?>" class="card-img" style="width:auto ;">
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
                </div>
            </a>
        </div>

    <?php } ?>

</div>

<?php
include_once('../templates/footer.php');
?>