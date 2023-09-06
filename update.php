<?php
include('./data.php');

$id = $_GET['uid'];

$data =   $udata->showsingle('user_data',$id);

$id = $data['id'];
$email = $data['email'];
$pass = $data['pass'];

?>
<!doctype html>
<html lang="en">
  <?php include('./partials/head.php')  ?>
  <body>

   <div class="row col-6 m-auto border border-secondary p-3">
        <form id="frm" action="" method="post" enctype="multipart/form-data">
            <legend>Registration Form</legend>


            <div class="mb-3">
               
            <input type="hidden" name="id" value="<?php echo $id  ?>">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="text" class="form-control" name="email"  aria-describedby="emailHelp" value="<?php echo $email ?>">
              
            </div>
            <div class="mb-3">
                
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" name="pass" value="<?php echo $pass ?>">
            </div>
           
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

<?php 



if(isset($_POST['submit']))
{

  $email = htmlspecialchars($_POST['email']);
  $pass  =   htmlspecialchars($_POST['pass']);
  $id  =   htmlspecialchars($_POST['id']);

 
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
          $udata->update('user_data',$arr,$id);
    }
  }


?>