<?php
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
    <link rel="stylesheet" href="css/registration.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    
  </head>
  <body>

  <div id = "vue-regist">
  <nav class="navbar navbar-expand navbar-dark bg">
                  <a class="navbar-brand" href="regist.php"><h2>E Vote</h2></a>
                
                
                    <ul class="navbar-nav mr-auto">
                     
                      <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                      </li>
                      <li class="nav-item active">
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
              <input type="email" class="form-control" onmouseover="this.focus();" placeholder="E-mail" name = "email" required>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" onmouseover="this.focus();" placeholder="Student ID" name = "nim" required>
          </div>
         

          <button type="submit" class="btn" name = "register">{{button_text}}</button>

          
        
        </form>
        
    </div>
        

<?php
if(isset($_POST['register'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];
    $ambil = $koneksi->query("SELECT * FROM user where nim = '$nim'");
    $cocok = $ambil->num_rows;
    if($cocok==1)
    {
      echo "<div class = 'alert alert-secondary'>Anda Sudah Terdaftar! Login <a href  ='login.php' class = 'alert-link'>disini</a></div>" ;
      
                        
      }
      else{
      $query = ("INSERT INTO user SET nama = '$nama',email = '$email',nim = '$nim'  ");
      mysqli_query($koneksi,$query);
      echo "<meta http-equiv='refresh' content='1;url=login.php'>";        
      echo "<div class = 'alert alert-info'>Anda berhasil terdaftar!</div>" ;
    }
}

?>

</body>
<script src = "js/regist.js"></script>
</html>