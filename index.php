<?php 
$emailerror = "";
$passerror = "";
$img = "";
$success = "";

include('./data.php');

if(isset($_POST['submit']))
{
  $email = htmlspecialchars($_POST['email']);
  $pass  =   htmlspecialchars($_POST['pass']);

 
  if(empty($email))
  {
    $emailerror = "please Enter Your Email...";
  }
  elseif(empty($pass))
  {
    $passerror = "please Enter Your Password...";

  }
    
    else
    {
      $arr = [
        "email" => $email,
        "pass" =>  $pass
      ];
          $udata->insert('user_data',$arr);
    }
  }
?>
<!doctype html>
<html lang="en">
<?php include('./partials/head.php')  ?>
  <body>
   <div class="row col-6 m-auto border border-secondary p-3">
        <form id="frm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <legend>Registration Form</legend>
            <div class="mb-3">
                <p class="text-danger"><?php echo $emailerror?></p>
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="text" class="form-control" name="email"  aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
              <p  class="text-danger"><?php echo $passerror ?></p>
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="pass">
            </div>
           
            <p id="succes" class="text-info"><?php echo $success ?></p>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>