<?php
      include('konekse2.php');

      $no_identitas = $_POST['no_identitas'];
	  $id_mobil = "1";
      $nama = $_POST['nama'];
      $alamat = $_POST['alamat'];
      $telepon = $_POST['telepon'];
      $email = $_POST['email'];
      $tgl_sewa = $_POST['tgl_sewa'];
      $total_hari = $_POST['total_hari']; 
      $jumlah_sewa = $_POST['jumlah_sewa']; 


      $input = mysql_query("insert into penyewaan (no_identitas,id_mobil,nama,alamat,telepon,email,tgl_sewa,total_hari,jumlah_sewa)
                           values('$no_identitas', '$id_mobil', '$nama', '$alamat', '$telepon', '$email', '$tgl_sewa', '$total_hari', '$jumlah_sewa')");
        if ($input) {
            header("location: form_sukses.php");
        } else {
            echo "input gagal";
        }
  ?>
