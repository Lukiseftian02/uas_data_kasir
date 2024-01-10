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
$table_name = 'db_table'; // Ganti nama tabel sesuai dengan nama tabel di database Anda

if (isset($_GET['id'])) {
    $item = new Employee($db, $table_name);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getEmployees();


    if ($item->waktu_kedatangan != null) {
        $emp_arr = array(
            "id" => $item->id,
            "waktu_kedatangan" => $item->waktu_kedatangan,
            "selisih_kedatangan" => $item->selisih_kedatangan,
            "waktu_awal_pelayanan" => $item->waktu_awal_pelayanan,
            "selisih_pelayanan_kasir" => $item->selisih_pelayanan_kasir,
            "waktu_selesai" => $item->waktu_selesai,
            "selisih_keluar_antrian" => $item->selisih_keluar_antrian,
        );

        http_response_code(200);
        echo json_encode($emp_arr);
    } else {
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
} else {
    $items = new Employee($db, $table_name);
    $stmt = $items->getEmployees();

    $itemCount = $stmt->rowCount();

    if ($itemCount > 0) {
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["total"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $e = array(
                "id" => $id,
                "waktu_kedatangan" => $waktu_kedatangan,
                "selisih_kedatangan" => $selisih_kedatangan,
                "waktu_awal_pelayanan" => $waktu_awal_pelayanan,
                "selisih_pelayanan_kasir" => $selisih_pelayanan_kasir,
                "waktu_selesai" => $waktu_selesai,
                "selisih_keluar_antrian" => $selisih_keluar_antrian,
            );
            array_push($employeeArr["body"], $e);
        }

        echo json_encode($employeeArr);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "No record found."));
    }
}
?>
