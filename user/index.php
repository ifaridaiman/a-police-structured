<?php
session_start();
include_once('../templates/header.php');
include_once('../templates/navuser.php');
require('../connect.php');

?>
<?php
$id = $_SESSION['id'];
$detailquery = "SELECT * FROM user WHERE userID = $id";
$getdetail = mysqli_query($connection, $detailquery);
?>
<!-- mobile -->

<div class="d-lg-none">
    <form action="../functionreport.php" method="POST" enctype="multipart/form-data">

        <div class="container pt-3">
            <div class="text-center pb-3">
                <u>
                    <h2>Case Details</h2>
                </u>
            </div>
            <div class="form-group">
                <label for="casedate">Case Date</label>
                <input class="form-control" type="date" name="casedate" id="casedate">

            </div>
            <div class="form-group">
                <label for="casetime">Case Time</label>
                <input class="form-control" type="time" name="casetime" id="casetime">

            </div>
            <div class="form-group">
                <label for="caselocation">Case Location</label>
                <input class="form-control" placeholder="case location" name="caselocation" id="caselocation">

            </div>
            <div class="form-group">
                <label for="casedescription">Case Description</label>
                <input class="form-control" placeholder="case Description" name="casedescription" id="casedescription">

            </div>
            <div class="form-group">
                <label for="casefile">Case File</label>
                <input class="form-control" type="file" class="form-control" style="width: 100%;" id="casefile" name="casefile">
            </div>
        </div>
        <div class="container">
            <div class="float-right">
                <input class="btn btn-primary" type="submit">
            </div>
        </div>

    </form>
</div>
<!-- desktop -->
<!-- <div class="container-fluid text-center p-4 d-none d-lg-block">
    <div class="card shadow mb-5 bg-white rounded">
        <div class="card-body">
            <div class="card">

                <div class="card-header">
                    User Details //
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">Name</label>
                            <input type="text" name="username" placeholder="Fazira Fairos" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">Ic Number</label>
                            <input type="text" name="ic" placeholder="970000010000" class="form-control">
                        </div>
                        <div class="col">
                            <label for="my-input">Matrix Number</label>
                            <input type="text" name="matrixcard" placeholder="2017717347" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">phone number</label>
                            <input type="text" name="phonenum" placeholder="971019146117 " class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">Department / Faculty</label>
                            <input type="text" name="ic" placeholder="FSKM" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card">

                <div class="card-header">
                    Report Details
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">Case Date</label>
                            <input id="my-input" class="form-control" type="date" name="">
                        </div>
                        <div class="col">
                            <label for="my-input">Case Time</label>
                            <input id="my-input" class="form-control" type="time" name="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">Case Location</label>
                            <input type="text" name="location" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="my-input">Case Description</label>
                            <textarea type="text" class="form-control" name="report" id="my-input" placeholder="Briefly describe on what is currently happening." rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </div>
    </div>
</div> -->
<?php

include_once('../templates/footer.php');
?>