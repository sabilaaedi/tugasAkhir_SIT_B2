<?php
    require_once( "../nusoap-0.9.5/lib/nusoap.php");
    $server = new soap_server();
    $server->configureWSDL('tampil', 'urn:tampil');
    $server->register('fungsiTampil',
        array('id_mobil' => 'xsd:string'),
        array('id_mobil'=>'xsd:Array'),
        'urn:tampil','urn:tampilAction');
	$server->register('fungsiMerk',
        array('merk' => 'xsd:string'),
        array('merk'=>'xsd:Array'),
        'urn:tampil','urn:tampilAction');
	$server->register('fungsiSeat',
        array('jumlah_seat' => 'xsd:string'),
        array('jumlah_seat'=>'xsd:Array'),
        'urn:tampil','urn:tampilAction');
    function dbConnect($query){
        try{
            $connect = mysql_connect("localhost","root","");
            $db = mysql_select_db("rental_mobil");
            return mysql_query($query);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function fungsiTampil(){
        $res = dbConnect("SELECT id_mobil, jumlah_seat, merk, thn_buat, warna, harga FROM mobil");
   
		while ($data = mysql_fetch_array($res))
		{
			$result[] = array('id_mobil' => $data['id_mobil'], 'jumlah_seat' => $data['jumlah_seat'], 'merk' => $data['merk'], 
			'thn_buat' => $data['thn_buat'], 'warna' => $data['warna'], 'warna' => $data['warna'], 'harga' => $data['harga']);
		}
		return $result;
    }
	function fungsiMerk($merk){
		if(empty($merk))
            return 'Please fill all the required fields';

        $merk = strip_tags(mysql_real_escape_string($merk));
        $res = dbConnect("SELECT id_mobil, jumlah_seat, merk, thn_buat, warna, harga FROM mobil where merk like '$merk%'");
   
		while ($data = mysql_fetch_array($res))
		{
			$result[] = array('id_mobil' => $data['id_mobil'], 'jumlah_seat' => $data['jumlah_seat'], 'merk' => $data['merk'], 
			'thn_buat' => $data['thn_buat'], 'warna' => $data['warna'], 'warna' => $data['warna'], 'harga' => $data['harga']);
		}
		return $result;
    }
	function fungsiSeat($jumlah_seat){
		if(empty($jumlah_seat))
            return 'Please fill all the required fields';

        $jumlah_seat = strip_tags(mysql_real_escape_string($jumlah_seat));
        $res = dbConnect("SELECT id_mobil, jumlah_seat, merk, thn_buat, warna, harga FROM mobil where jumlah_seat='$jumlah_seat'");
   
		while ($data = mysql_fetch_array($res))
		{
			$result[] = array('id_mobil' => $data['id_mobil'], 'jumlah_seat' => $data['jumlah_seat'], 'merk' => $data['merk'], 
			'thn_buat' => $data['thn_buat'], 'warna' => $data['warna'], 'warna' => $data['warna'], 'harga' => $data['harga']);
		}
		return $result;
    }
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)
        ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);
