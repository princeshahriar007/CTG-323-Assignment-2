<?php
  session_start();
  include 'Connection.php';
  $db = new Connection();

  if($_SESSION['user_id'] == null){
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <?php
    if(isset($_GET['id'])){
      $getNote = $db->getNote($_GET['id']);
      }
    if(isset($_POST['submit'])){
      $db->updateNote($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['image'], $_GET['id']);
      header("location:index.php");
    }
    foreach ($getNote as $data) {
  ?>
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container">
            <img src="images/user-icon.png" class="brand_logo" alt="Logo">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form method="POST" action="" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="name" class="form-control input_user" value="<?php echo $data['name']; ?>" placeholder="name">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>
              <input type="tel" name="phone" class="form-control input_user" value="<?php echo $data['phone']; ?>" placeholder="phone">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>
              <input type="email" name="email" class="form-control input_user" value="<?php echo $data['email']; ?>" placeholder="email">
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-file-image"></i></span>
              </div>
              <input type="file" name="image" class="form-control input_user" accept="image/*" value="<?php echo $data['image']; ?>">
            </div>
            <div class="d-flex justify-content-center mt-3 login_container">
              <input type="submit" name="submit" class="btn login_btn" value="Add">
            </div>
          </form>
        </div>

        <div class="mt-4">
          <div class="d-flex justify-content-center links">
            <a href="index.php" class="ml-2">Go to Contacts</a>
          </div>
          <div class="d-flex justify-content-center links">
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</body>
</html>
