<?php
require_once __DIR__ . '/../models/M_pembayaran.php';

class Dashboard {
    private $model;

    public function __construct($db){
        if (!isset($_SESSION['login'])){
            redirect_to('auth');
        }
        $this->model = new M_pembayaran($db);
    }

    public function index(){
        $pembayaran = $this->model->getAll();
        $edit = false;
        $dataEdit = null;

        if (isset($_GET['edit'])){
            $edit = true;
            $dataEdit = $this->model->getById($_GET['edit']);
        }

        include __DIR__ . '/../views/dashboard/index.php';
    }

    public function simpan(){
        $nama_file = '';

        if (isset($_FILES['bukti']) && $_FILES['bukti']['name'] != ''){
            $nama_file = time().'_'.basename($_FILES['bukti']['name']);
            move_uploaded_file($_FILES['bukti']['tmp_name'], __DIR__ . '/../../upload/' . $nama_file);
        }

        $data = [
            'id_reservasi' => $_POST['id_reservasi'],
            'jumlah_bayar' => (int)$_POST['jumlah'],
            'metode_pembayaran' => $_POST['metode'],
            'bukti_pembayaran' => $nama_file
        ];

        $this->model->insert($data);
        redirect_to('dashboard');
    }

    public function update(){
        $id = (int)$_POST['id'];
        $lama = $this->model->getById($id);

        if (isset($_FILES['bukti']) && $_FILES['bukti']['name'] != ''){
            $nama_file = time().'_'.basename($_FILES['bukti']['name']);
            move_uploaded_file($_FILES['bukti']['tmp_name'], __DIR__ . '/../../upload/' . $nama_file);

            if ($lama && $lama['bukti_pembayaran']){
                $old = __DIR__ . '/../../upload/' . $lama['bukti_pembayaran'];
                if (file_exists($old)) unlink($old);
            }
        } else {
            $nama_file = $lama['bukti_pembayaran'];
        }

        $data = [
            'id_reservasi' => $_POST['id_reservasi'],
            'jumlah_bayar' => (int)$_POST['jumlah'],
            'metode_pembayaran' => $_POST['metode'],
            'bukti_pembayaran' => $nama_file
        ];

        $this->model->update($id,$data);
        redirect_to('dashboard');
    }

    public function home(){

        $allData = $this->model->getAll();

        $data = [
            'total' => count($allData),
            'totalBayar' => 0,
            'pembayaran' => $allData
        ];

        foreach($allData as $d){
            $data['totalBayar'] += $d['jumlah_bayar'];
        }

        // 🔥 PENTING BIAR VARIABLE BISA DIPAKAI DI VIEW
        extract($data);

        include __DIR__ . '/../views/dashboard/home.php';
    }

    public function hapus($id){
        $this->model->delete((int)$id);
        redirect_to('dashboard');
    }
}