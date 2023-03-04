<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/about.css">
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
          document.location.href = './About.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = './About.php';
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
        document.location.href = './About.php';
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
    <div class="Paragraf">
    <h1>About jeruk limau</h1>
    <p><h2>
    Jeruk atau limau adalah semua tumbuhan berbunga anggota marga Citrus dari suku Rutaceae (suku jeruk-jerukan). Anggotanya berbentuk pohon dengan buah yang berdaging dengan rasa masam yang segar, meskipun banyak di antara anggotanya yang memiliki rasa manis. Rasa masam berasal dari kandungan asam sitrat yang memang menjadi terkandung pada semua anggotanya.
    Sebutan "jeruk" kadang-kadang juga disematkan pada beberapa anggota marga lain yang masih berkerabat dalam suku yang sama, seperti kingkit. Dalam bahasa sehari-hari, penyebutan "jeruk" atau "limau" (di Sumatra dan Malaysia) sering kali berarti "jeruk keprok" atau "jeruk manis". Di Jawa, "limau" (atau "limo") berarti "jeruk nipis".
    Jeruk sangatlah beragam dan beberapa spesies dapat saling bersilangan dan menghasilkan hibrida antarspesies ('interspecific hybrid) yang memiliki karakter yang khas, yang berbeda dari spesies tetuanya. Keanekaragaman ini sering kali menyulitkan klasifikasi, penamaan dan pengenalan terhadap anggota-anggotanya, karena orang baru dapat melihat perbedaan setelah bunga atau buahnya muncul. Akibatnya tidak diketahui dengan jelas berapa banyak jenisnya. Penelitian-penelitian terakhir menunjukkan adalah keterkaitan kuat Citrus dengan genus Fortunella (kumkuat), Poncirus, serta Microcitrus dan Eremocitrus, sehingga ada kemungkinan dilakukan penggabungan. Citrus sendiri memiliki dua anakmarga (subgenus), yaitu Citrus dan Papeda.
    Asal jeruk adalah dari Asia Timur dan Asia Tenggara, membentuk sebuah busur yang membentang dari Jepang terus ke selatan hingga kemudian membelok ke barat ke arah India bagian timur. Jeruk manis dan sitrun (lemon) berasal dari Asia Timur, sedangkan jeruk bali, jeruk nipis dan jeruk purut berasal dari Asia Tenggara.
    Banyak anggota jeruk yang dimanfaatkan oleh manusia sebagai bahan pangan, wewangian, maupun industri. Buah jeruk adalah sumber vitamin C dan wewangian/parfum penting. Daunnya juga digunakan sebagai rempah-rempah.
    Pemerian
    Pohon kecil, perdu atau semak besar, ketinggian 2–15 m, dengan batang atau ranting berduri panjang tetapi tidak rapat. Daun hijau abadi dengan tepi rata, tunggal, permukaan biasanya licin dan agak berminyak. Bunga tunggal atau dalam kelompok, lima mahkota bunga (kadang-kadang empat) berwarna putih atau kuning pucat, [stamen] banyak, sering kali sangat harum. Buah bertipe "buah jeruk" (hesperidium), semacam buah buni, membulat atau seperti tabung, ukuran bervariasi dengan diameter 2–30 cm tergantung jenisnya; kulit buah biasanya berdaging dengan minyak atsiri yang banyak. Hama yang sering menyerang tanaman jeruk adalah kutu daun, ulat Pappilio memnon, Philocnitis, sedangkan penyakit yang sering menyerang adalah embun tepung, embun jelaga, virus keriting.
    Jeruk dapat tumbuh dengan baik pada ketinggian 0–400 mdpl.[2] Keadaan iklim yang baik bagi tanaman jeruk adalah pada kisaran suhu udara 25–30 °C atau rata-rata 20 °C, curah hujan tidak lebih dari 100 mm/bulan atau 1200 mm/tahun, kelembaban udara 50–85% dengan minimal 3 bulan kering. Jeruk harus ditanam di tempat terbuka atau mendapat cukup sinar matahari, dan apabila ditanam di dataran tinggi dapat menyebabkan kulit menjadi tebal dan rasa jeruk menjadi pahit. Keadaan tanah yang baik untuk ditanami jeruk adalah tanah yang gembur, memiliki kandungan bahan organik yang tinggi, memiliki aerasi dan drainase yang baik, dengan nilai kemasaman (pH) 6–7.[3]
    Buah dan daunnya dimanfaatkan orang sebagai penyedap atau komponen kue/puding. Aroma yang khas berasal dari sejumlah flavonoid dan beberapa terpenoid. "Daging buah" mengandung banyak asam sitrat (harafiah: "asam jeruk") yang memberikan rasa masam yang tajam tetapi segar.
    </p></h2>
    <h3>Jeruk Juga bisa dibuat menjadi jus</h3>