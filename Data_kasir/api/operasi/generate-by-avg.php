<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/employees.php';

$database = new Database();
$db = $database->getConnection();
$item = new Employee($db);
$item->generateByAVG();

if ($item->waktu_kedatangan !== null) {
   $formattedWaktu_Kedatangan = date('i:s', strtotime($item->waktu_kedatangan));
   $formattedWaktu_selesai = date('i:s', strtotime($item->waktu_selesai));

    $dataArr = array(
        "waktu_kedatangan" => "Jika awal waktu kedatangan konsumen pada: " . $formattedWaktu_Kedatangan,
        "waktu_selesai" => round($item->waktu_selesai),
        "selisih_kedatangan" => round($item->selisih_kedatangan) . " menit",
        "selisih_keluar_antrian" => "Maka selisih keluar antrian rendah: " . round($item->selisih_keluar_antrian)
    );

    http_response_code(200);
    echo json_encode($dataArr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "User not found."));
}
?>
