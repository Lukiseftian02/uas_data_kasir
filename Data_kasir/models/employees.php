<?php
class Employee {
    // Connection
    private $conn;
    // Table
    private $db_table = "db_table";
    // Columns
    public $id;
    public $waktu_kedatangan;
    public $selisih_kedatangan;
    public $waktu_awal_pelayanan;
    public $selisih_pelayanan_kasir;
    public $waktu_selesai;
    public $selisih_keluar_antrian;

    // Db connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // GET ALL
    public function getEmployees() {
        $sqlQuery = "SELECT id, waktu_kedatangan, selisih_kedatangan, waktu_awal_pelayanan, selisih_pelayanan_kasir, waktu_selesai, selisih_keluar_antrian FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createEmployee() {
        $sqlQuery = "INSERT INTO " . $this->db_table . "
            SET
            waktu_kedatangan = :waktu_kedatangan,
            selisih_kedatangan = :selisih_kedatangan,
            waktu_awal_pelayanan = :waktu_awal_pelayanan,
            selisih_pelayanan_kasir = :selisih_pelayanan_kasir,
            waktu_selesai = :waktu_selesai,
            selisih_keluar_antrian = :selisih_keluar_antrian";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        // (Tetapkan sanitize sesuai kebutuhan)

        // bind data
        $stmt->bindParam(":waktu_kedatangan", $this->waktu_kedatangan);
        $stmt->bindParam(":selisih_kedatangan", $this->selisih_kedatangan);
        $stmt->bindParam(":waktu_awal_pelayanan", $this->waktu_awal_pelayanan);
        $stmt->bindParam(":selisih_pelayanan_kasir", $this->selisih_pelayanan_kasir);
        $stmt->bindParam(":waktu_selesai", $this->waktu_selesai);
        $stmt->bindParam(":selisih_keluar_antrian", $this->selisih_keluar_antrian);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function updateEmployee() {
        $sqlQuery = "UPDATE " . $this->db_table . "
            SET
            waktu_kedatangan = :waktu_kedatangan,
            selisih_kedatangan = :selisih_kedatangan,
            waktu_awal_pelayanan = :waktu_awal_pelayanan,
            selisih_pelayanan_kasir = :selisih_pelayanan_kasir,
            waktu_selesai = :waktu_selesai,
            selisih_keluar_antrian = :selisih_keluar_antrian
            WHERE
            id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        // (Tetapkan sanitize sesuai kebutuhan)

        // bind data
        $stmt->bindParam(":waktu_kedatangan", $this->waktu_kedatangan);
        $stmt->bindParam(":selisih_kedatangan", $this->selisih_kedatangan);
        $stmt->bindParam(":waktu_awal_pelayanan", $this->waktu_awal_pelayanan);
        $stmt->bindParam(":selisih_pelayanan_kasir", $this->selisih_pelayanan_kasir);
        $stmt->bindParam(":waktu_selesai", $this->waktu_selesai);
        $stmt->bindParam(":selisih_keluar_antrian", $this->selisih_keluar_antrian);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // DELETE
   public function deleteEmployee(){
    $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = :id";
    $stmt = $this->conn->prepare($sqlQuery);
    $this->id = htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(":id", $this->id);

    if($stmt->execute()){
        return true;
    }
    return false;
}
public function generateByAVG(){
    $sqlQuery = "SELECT 
    AVG(waktu_kedatangan) AS r_waktu_kedatangan,
    AVG(waktu_selesai) AS r_waktu_selesai,
    AVG(selisih_kedatangan) AS r_selisih_kedatangan, 
    AVG(selisih_keluar_antrian) AS r_selisih_keluar_antrian
    FROM ". $this->db_table;
    
    $stmt = $this->conn->prepare($sqlQuery);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $dataRow = $stmt->fetch();

    $this->waktu_kedatangan = $dataRow['r_waktu_kedatangan'];
    $this->waktu_selesai = $dataRow['r_waktu_selesai'];
    $this->selisih_kedatangan = $dataRow['r_selisih_kedatangan'];
    $this->selisih_keluar_antrian = $dataRow['r_selisih_keluar_antrian'];
}
}

?>
