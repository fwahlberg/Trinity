<h1>Welcome to your web portal! Please sign in to continue</h1>
<hr>
<section class="login-block">
  <div class="login-container">
    <div class="row">
      <div class="col-md login-sec">
        <h2 class="text-center">Login Now</h2>
        <form class="login-form" method="POST" action="/login.php">
          <div class="form-group" >
            <label for="exampleInputEmail1" class="text-uppercase">Email</label>
            <input type="email" class="form-control" placeholder="" name="email">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
            <input type="password" class="form-control" placeholder="" name="password">
          </div>


          <div class="form-check">
            <button type="submit" class="btn btn-login float-right">Submit</button>
          </div>
          <p><?php if(isset($error)) {echo $error;} ?></p>

        </form>
        <!-- <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div> -->
      </div>
    </div>
</section>
