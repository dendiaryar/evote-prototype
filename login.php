<?php

session_start();
$koneksi = new mysqli("localhost","root","","evote");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E Vote</title>
    <script src="https://unpkg.com/vue"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/loginpage.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    
  </head>
  <body>

  <div id = "vue-login">
        <nav class="navbar navbar-expand navbar-dark bg">
            <a class="navbar-brand" href="login.php"><h2>E Vote</h2></a>
            <ul class="navbar-nav mr-auto">
            
                <li class="nav-item active">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="regist.php">Registrasi</a>
                </li>
            </ul>
                    
        </nav>

        <form id = "form-container" method = "post">
          <div class="form-group">
            <div id="form-title">
            <h1 class = "form-title">{{title}}</h1>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" onmouseover="this.focus();" placeholder="Your Name" name = "nama" required>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" onmouseover="this.focus();" placeholder="Student ID" name = "nim" required>
          </div>
         

          <button type="submit" class="btn" name = "login">{{button_text}}</button>

          
        
        </form>
        
    </div>
        

<?php
if(isset($_POST['login'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    if(ctype_alpha($nama) && is_numeric($nim)){
        $ambil = $koneksi->query("SELECT * FROM user where nim = '$nim' AND nama = '$nama'");
        $cocok = $ambil->num_rows;
        $fetch = $ambil->fetch_row();
        if($cocok==1)
        {
            if($fetch[5] == 0){
            $_SESSION['user'] = $nim;
            $koneksi->query ("UPDATE user SET status = 1 where nim = '$nim'");
            $koneksi->query("INSERT into logged_in SET nim = '$nim'");
            echo "<div class = 'alert alert-info'>Anda berhasil Login!</div>" ; 
            echo "<meta http-equiv='refresh' content='1;url=vote.php'>";     
            }
            else{
              echo "<div class = 'alert alert-danger'>Anda sudah memilih</div>" ; 
            echo "<meta http-equiv='refresh' content='1;url=login.php'>"; 
            }
          }
        else{
            echo "<div class = 'alert alert-warning'>Data tidak cocok,silahkan registrasi  <a href ='regist.php' class = 'alert-link'>disini</a></div>" ; 
        }
  }
  
  
}

?>

</body>
<script src = "js/login.js"></script>
</html>