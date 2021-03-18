<?php
$koneksi = new mysqli("localhost","root","","evote");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E Vote</title>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://use.fontawesome.com/5e1a9cbc40.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/registration.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    <div id="particles-js" style="position:fixed;width:100%;z-index:-10;"></div>
       <script type="text/javascript" src="js/particles.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
  <script src="js/app.js"></script>
  
    
  </head>
  <body>
 <div id="particles-js"></div>

  
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
          <td class="row">
            <div class="col-md-4">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">
               <span class="fa fa-user-o" aria-hidden="true" ></span>
              </div>
              <input type="text" class="form-control" onmouseover="this.focus();" placeholder="Your Name" name = "nama" required>

          </div>
          </div>
        </div>
      </td>

      <td class="row">
            <div class="col-md-4">
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                  <input type="email" class="form-control" onmouseover="this.focus();" placeholder="E-mail" name = "email" required>
                </div>
              </div>
            </div>
      </td>

      <td class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">
                     <span class="fa fa-id-card" aria-hidden="true" ></span>
                    </div>
                    <input type="text" class="form-control" onmouseover="this.focus();" placeholder="Student ID" name = "nim" required>
                </div>
                </div>
              </div>
      </td>
         

          <button type="submit" class="btn" name = "register" style ="margin-left: 20px">{{button_text}}</button>

          
        
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