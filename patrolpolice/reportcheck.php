<?php
include_once('../templates/header.php');
include_once('../templates/navpolice.php');
require('../connect.php');
?>
<div class="container pt-5">
    <?php
    //variable
    //parse data from link, using GET method
    $id = $_GET['id'];
    //query of report join user, join type and specific to get based on report ID
    $historyquery = "SELECT * FROM report JOIN user ON report.userID=user.userID WHERE reportID=$id";
    //process query adn save in array data
    $historyget = mysqli_query($connection, $historyquery);
    //display data array
    while ($hty = mysqli_fetch_array($historyget)) {
    ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 text-center">
                        <!--display blob image, to get jpg file base64 -->
                        <img src="../assets/img/<?php echo $hty['reportEvidence']; ?>" class="card-img" style="width:auto ;">
                    </div>
                    <div class="col-8">
                        <p><strong>Report person : </strong><?= $hty['userName']; ?></p>

                        <p><strong>Report Location :</strong> <?= $hty['reportLocation']; ?>
                            <br>
                            <p><strong>Description</strong></br><?= $hty['description']; ?></p>
                    </div>
                </div>
                <?php
                //if statement either progress is 0,1, or 2
                if ($hty['progressID'] == 0) { ?>
                    <div class="row">
                        <div class="col">
                            <a href="<?= $base_url; ?>functionupdatestatus.php?status=1&&id=<?= $hty['reportID']; ?>" class="btn btn-outline-success btn-block">Accept</a>
                        </div>
                        <div class="col">
                            <a href="<?= $base_url; ?>functionupdatestatus.php?status=2&&id=<?= $hty['reportID']; ?>" class="btn btn-outline-danger btn-block">Ignore</a>
                        </div>
                    </div>
                <?php } elseif ($hty['progressID'] == 1) { ?>
                    <div class="container-fluid">
                        <div class="alert alert-success" role="alert">
                            Reported to head police
                        </div>
                    </div>
                <?php } elseif ($hty['progressID'] == 2) { ?>
                    <div class="container-fluid">
                        <div class="alert alert-danger" role="alert">
                            The case successfully dismissed!
                        </div>
                    </div>
                <?php } else {
                    echo 'contact database manager';
                } ?>
            </div>
        </div>
    <?php } ?>
</div>


<?php
include_once('../templates/footer.php');
?>