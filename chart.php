<?php
$koneksi = new mysqli("localhost","root","","evote");

$ambil1 = $koneksi->query("SELECT suara FROM suara where id = 1");
$isi1 = $ambil1->fetch_row();

$ambil2 = $koneksi->query("SELECT suara FROM suara where id = 2");
$isi2 = $ambil2->fetch_row();

$dataPoints = array( 
	array("label"=>"Paslon 1", "y"=>$isi1[0]),
	array("label"=>"Paslon 2", "y"=>$isi2[0]),
	
)
 ?>

<html>
<head>
<title>Evote</title>

    <link rel="stylesheet" href="bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png"/>
    <link rel="stylesheet" href="css/recap.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Cabin|Cinzel|Gudea|Supermercado+One&display=swap" rel="stylesheet">
    
<script>
      window.onload = function() {
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
          text: "Rekap Pemilihan"
        },
        subtitles: [{
          text: "2020"
        }],
        data: [{
          type: "pie",
          yValueFormatString: "0 Suara",
          indexLabel: "{label} ({y})",
          dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
      }
</script>

</head>
<body>
<div id = "navbar">
<nav class="navbar navbar-expand navbar-dark bg fixed-top">
                <a class="navbar-brand" href="landing.php"><h2>E Vote</h2></a>
               
              
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                      <a class="nav-link" href="vote.php">Vote <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="tabelhadir.php">Daftar Pemilih</a>
                    </li>
                    <li class="nav-item">
              <a class="nav-link" href="regist.php">Registrasi</a>
            </li>
                  </ul>
                
</nav>
</div>

<div id="chartContainer" 
    style="
    height: 370px; 
    width: 50%;
    margin-top:10%; 
    margin-left: 25%;
    background : rgb(17,138,101);
"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="footer">
    
        
            
            <br>
              
                   
                  <p >Product of boredom</p> 
                  <p >Created with heart by BASECAMP 217</p>
        
              
              
</div>
</body>
</html> 




