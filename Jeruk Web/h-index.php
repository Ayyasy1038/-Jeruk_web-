<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeruk Web</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
        <?php
require 'connection.php';
$_SESSION["id"] = 1; // User's session
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tb_users` WHERE id = $sessionId"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <form class="form" id = "form" action="" enctype="multipart/form-data" method="post">
      <div class="upload">
        <?php
        $id = $user["id"];
        $name = $user["name"];
        $image = $user["image"];
        ?>
        <img src="img/<?php echo $image; ?>" width = 50 height = 50 title="<?php echo $image; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          
        </div>
      </div>
      </form>
    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = './h-index.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = './h-index.php';
        </script>
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE tb_users SET image = '$newImageName' WHERE id = $id";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'img/' . $newImageName);
        echo
        "
        <script>
        document.location.href = './h-index.php';
        </script>
        ";
      }
    }
    ?>
  </body>
</html> 
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="h-index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Image.php">Image</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="About.php">About</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="Advance_Shopping_cart-master/index.php">Shop</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <h3><p id="Day"></p></h3>

      <h1 style="text-align:center ;" >Hello, <?php echo $_SESSION['name']; ?></h1>
    <h1 style="text-align:center ;">Welcome To</h1>
    <h1 style="text-align:center ;">JERUK WEB HTML</h1>
    <h1 style="text-align:center ;"><p id="Hours"></p></h1>
    <script>
      const hour = new Date().getHours(); 
      let greeting;
      if (hour < 12) {
        greeting = "Good Day";
      } else {
        greeting = "Good Evening";
      }
      
      document.getElementById("Hours").innerHTML = greeting;
      </script>
      <script>
        let day;
        switch (new Date().getDay()) {
          case 0:
            day = "Sunday";
            break;
          case 1:
            day = "Monday";
            break;
          case 2:
            day = "Tuesday";
            break;
          case 3:
            day = "Wednesday";
            break;
          case 4:
            day = "Thursday";
            break;
          case 5:
            day = "Friday";
            break;
          case  6:
            day = "Saturday";
        }
        document.getElementById("Day").innerHTML = "Today is :" + day;
        </script>
</body>
</html>
<?php 
}else{
     header("Location: h-index.php");
     exit();
}
 ?>
