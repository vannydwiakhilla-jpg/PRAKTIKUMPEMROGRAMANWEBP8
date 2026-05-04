<?php
class M_pembayaran {
    private $conn;
    public function __construct($db){
        $this->conn = $db->conn;
    }

    public function getAll(){
        $res = $this->conn->query("SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");
        $data = [];
        while($row = $res->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function insert($data){
        $stmt = $this->conn->prepare("INSERT INTO pembayaran (id_reservasi,jumlah_bayar,metode_pembayaran,bukti_pembayaran) VALUES (?,?,?,?)");
        $stmt->bind_param("siss",$data['id_reservasi'],$data['jumlah_bayar'],$data['metode_pembayaran'],$data['bukti_pembayaran']);
        return $stmt->execute();
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM pembayaran WHERE id_pembayaran=?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }

    public function getById($id){
        $stmt = $this->conn->prepare("SELECT * FROM pembayaran WHERE id_pembayaran=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function update($id,$data){
        $stmt = $this->conn->prepare("UPDATE pembayaran SET id_reservasi=?, jumlah_bayar=?, metode_pembayaran=?, bukti_pembayaran=? WHERE id_pembayaran=?");
        $stmt->bind_param("sissi",$data['id_reservasi'],$data['jumlah_bayar'],$data['metode_pembayaran'],$data['bukti_pembayaran'],$id);
        return $stmt->execute();
    }
}
