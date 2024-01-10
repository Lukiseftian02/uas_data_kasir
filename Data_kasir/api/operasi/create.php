<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

        include_once '../../config/database.php';
        include_once '../../models/employees.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Employee($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->waktu_kedatangan = $data->waktu_kedatangan;
    $item->selisih_kedatangan = $data->selisih_kedatangan;
    $item->waktu_awal_pelayanan = $data->waktu_awal_pelayanan;
    $item->selisih_pelayanan_kasir = $data->selisih_pelayanan_kasir;
    $item->waktu_selesai = $data->waktu_selesai;
    $item->selisih_keluar_antrian = $data->selisih_keluar_antrian;
   

         if($item->createEmployee()){
        echo json_encode(['message'=>'Data Customer Berhasil Ditambahkan.']);
    } else{
        echo json_encode(['message'=>'Data Customer Gagal .']);
    }
?>