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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $_SESSION['user_name']; ?> - Phonebook</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="bg-primary text-white">
      <div class="container">
        <div class="row">
          <div class="col col-lg-4">
              <a href="addNew.php"><i class="fa fa-plus fa-3x"></i></a>
          </div>
          <div class="col col-lg-4">
              <h1 class="text-center">Phone Book</h1>
          </div>
          <div class="col col-lg-4">
              <h3 class="text-right">(<?php echo $_SESSION['user_name']; ?>) <a href="logout.php">Logout</a></h3>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <?php $result = $db->getAllNotes($_SESSION['user_id']);
      ?>
      <div class="row text-center d-flex justify-content-center">
        <?php foreach ($result as $data) { ?>
        <div class="card col col-lg-3 mx-3 mt-1">
          <img class="card-img-top" src="photos/<?php echo $data['image']; ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data['name']; ?></h5>
            <p class="card-text"><i class="fas fa-phone"></i><?php echo ": ".$data['phone']; ?></p>
            <p class="card-text"><i class="fas fa-envelope"></i><?php echo ": ".$data['email']; ?></p>
            <a href="update.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a>
          </div>
        </div>
        <?php } ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
