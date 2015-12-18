<?php
    require_once( "../nusoap-0.9.5/lib/nusoap.php");
    $server = new soap_server();
    $server->configureWSDL('driver', 'urn:driver');
	$server->register('fungsiDriverLokasi',
        array('alamat' => 'xsd:string'),
        array('alamat'=>'xsd:Array'),
        'urn:driver','urn:driverAction');
    function dbConnect($query){
        try{
            $connect = mysql_connect("localhost","root","");
            $db = mysql_select_db("rental_mobil");
            return mysql_query($query);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
	function fungsiDriverLokasi($alamat){
		if(empty($alamat))
            return 'Please fill all the required fields';

        $alamat = strip_tags(mysql_real_escape_string($alamat));
        $res = dbConnect("SELECT id_driver, nama, alamat, jk, telepon FROM driver where alamat = '$alamat'");
   
        while ($data = mysql_fetch_array($res))
        {
            $result[] = array('id_driver' => $data['id_driver'], 'nama' => $data['nama'], 'alamat' => $data['alamat'], 
            'jk' => $data['jk'], 'telepon' => $data['telepon']);
        }
        return $result;
    }
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)
        ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);
