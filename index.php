<?php 
include_once('templates/header.php');
?>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <div class="text-center">
              <img src="assets\img\polibantuan.jpg" class="rounded mx-auto d-block" alt="assets\img\polibantuan.jpg" style="height:30%;width:30%;">
            </div>
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="functionauth.php" method="POST">
              <div class="form-label-group">
                <input type="text" class="form-control" name="inputId" autofocus>
                <label for="inputid">Staff or Student Id</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="inputPassword" class="form-control" >
                <label for="inputPassword">IC Number</label>
              </div>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Sign In">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php 
include_once('templates/footer.php');
?>
