<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>SIT-Rental Mobil</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <?php
        include "header.php";
      ?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <form action="" method="post">  
              <div class="form-panel">
          	<h1><i class="fa fa-angle-right"></i> Lihat Data Semua Supir Berdasarkan Lokasi</h1>
          	 <div class="row mt">
          		  <div class="col-lg-12">
					<h3>Pilih lokasi supir</h3>
              <div class="col-sm-2">        
                              <select class="form-control" name="alamat">
                                <option></option>
								<option>Magelang</option>
                                <option>Ponorogo</option>
                                <option>Yogyakarta</option>
                                <option>Klaten</option>
                                <option>Bantul</option>
                                <option>Sleman</option>
                                <option>Solo</option>                                
                                <option>Kulonprogo</option>
                              </select>
                              </div>
              <input class="btn btn-danger" name="submit" type="submit" value="Lihat"/>
          		</div>
          	</div>

  <?php    
  echo "<div class = 'row'>
    <div class = 'col-md-8 col-md-offset-0' style='padding-top:20px'> ";
    try{
          require_once("../nusoap-0.9.5/lib/nusoap.php"); 
          $client = new nusoap_client("http://localhost/dashgum/Theme/driver-server.php?wsdl");
          if (isset($_POST['submit'])) {
          $response = $client->call('fungsiDriverLokasi', array('alamat' => $_POST['alamat']));
              if (is_array($response)){
                       echo "<table class = 'table'>
                               <tr>
                                  <td>Id Driver</td>
                                  <td>Nama Lengkap</td>
                                  <td>Alamat</td>
                                  <td>Jenis Kelamin</td> 
                                  <td>Telepon</td>
                              </tr>";
          foreach($response as $data){
            echo "
                              <tr>
                                  <td>".$data['id_driver']."</td>
                                  <td>".$data['nama']."</td>
                                  <td>".$data['alamat']."</td>
                                  <td>".$data['jk']."</td>  
                                  <td>".$data['telepon']."</td>
                              </tr>";
          }
          echo "</table>";

              } else echo "<p>Data tidak ditemukan</p>";
      }
    } catch(SoapFault $e){
          echo $e->getMessage();}
  
    echo "</div>
    </div>";
?>
               

                </div>
          	   </div>
			       </form>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <?php
        include "footer.php";
      ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>



