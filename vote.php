<?php
session_start();
$koneksi = new mysqli("localhost","root","","evote");

if(!isset($_SESSION['user'])){
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>'Location :login.php</script>";
  header('location: login.php'); 
}

else{
  $nim = $_SESSION['user'];
  $ambil=$koneksi->query("SELECT nim from logged_in where nim = '$nim'");
  $fetch = $ambil->fetch_row();
  $setnim= $fetch[0];
 
}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Evote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/votingpage.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/vue"></script>
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg">
                  <a class="navbar-brand" href="vote.php"><h2>E Vote</h2></a>
                
                
                     
                
              </li>
                    </ul>
                  
                </nav>


    <div class ="content">
        <div id ="vue-vote">
            <h1 id = "judul">{{title}}</h1>
        </div>
        
            <table class = "table-bordered">
              <thead >
                  <tr>
                    <th>1</th>
                    <th>2</th>
                  
                  </tr>
                </thead>
                <tbody>
                  <tr>
                
                    <td><img src="img/leader.jpg" width="180" height="180"></td>
                    <td><img src="img/leader.jpg" width="180" height="180"></td>
                  </tr>

                  <tr>
                    <form method = "post">
                    
                      <td><button type="submit" class="btn" name = "vote1">Pilih</button></td>
                      <td><button  type="submit" class="btn" name = "vote2">Pilih</button></td>
                    
                    </form>
                  </tr>
              
                </tbody>
            <table>


    </div>
    

</body>
<script src="js/app.js"></script>
</html>
        
<?php
if(isset($_POST['vote1'])){
    $ambil = $koneksi->query("SELECT * FROM suara WHERE id = 1 ");
    $cocok = $ambil->num_rows;
    
    $isi = $ambil->fetch_assoc();
    if($cocok==1)
    {
      $currentvote = $isi['suara'];
      $currentvote+=1;
      $koneksi->query("UPDATE suara SET suara = '$currentvote' WHERE id = 1 ");
      $koneksi->query("UPDATE user SET status = 0 WHERE nim = '$setnim'");
      $koneksi->query("UPDATE user SET done = 1 WHERE nim = '$setnim'");
      $koneksi->query("DELETE from logged_in where nim = '$setnim'");
      echo "<div class = 'alert alert-info'>Berhasil Memilih!</div>" ;
      session_destroy();
      echo "<meta http-equiv='refresh' content='1;url=login.php'>";        
                        
      }
  
}

if(isset($_POST['vote2'])){
  $ambil = $koneksi->query("SELECT * FROM suara WHERE id = 2");
  $cocok = $ambil->num_rows;
  $isi = $ambil->fetch_assoc();
  if($cocok==1)
  {
    $currentvote = $isi['suara'];
    $currentvote+=1;
    $koneksi->query("UPDATE suara SET suara = '$currentvote' WHERE id = 2 ");
    $koneksi->query("UPDATE user SET status = 0 WHERE nim = '$setnim'");
    $koneksi->query("UPDATE user SET done = 1 WHERE nim = '$setnim'");
    echo "<div class = 'alert alert-info'>Berhasil Memilih!</div>" ;
    session_destroy();
    echo "<meta http-equiv='refresh' content='1;url=login.php'>";        
                      
    }

}

?>

