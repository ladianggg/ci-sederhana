<?php
class Anggota extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_anggota');
    }
     
    public function index(){
        $this->select();       
    }

    public function select(){
        $data['judul'] = "Data Anggota Perpustakaan";
        $data['anggota'] = $this->m_anggota->tampil();
        $this->load->view('template/header', $data);
        $this->load->view('anggota/view_data', $data);
        $this->load->view('template/footer');
    }

    public function tambah(){
        $data['judul'] = "Tambah Data Anggota Perpustakaan";
        $this->load->view('template/header', $data);
        $this->load->view('anggota/form_tambah');
        $this->load->view('template/footer');
    }

    public function insert(){
        $anggota = $this->input->post('anggota');
        $alamat = $this->input->post('alamat');
        $this->m_anggota->save($anggota, $alamat);
        redirect('anggota');
    }

    public function get_edit(){
        $id = $this->uri->segment(3);
        $hasil = $this->m_anggota->pilih_anggota($id);
        $i = $hasil->row_array();
        $data = array(
            'anggota'   => $i['anggota'],
            'alamat'    => $i['alamat'],
            'idanggota' => $i['idanggota']
        );

        $data['judul'] = "Ubah Data Anggota Perpustakaan";
        $this->load->view('template/header', $data);
        $this->load->view('anggota/form_ubah', $data);
        $this->load->view('template/footer');
    }

    public function update(){
        $id = $this->input->post('idanggota');
        $anggota = $this->input->post('anggota');
        $alamat = $this->input->post('alamat');
        $this->m_anggota->edit($id, $anggota, $alamat);
        redirect('anggota');
        // echo "$id.$alamat.$anggota";
    }

    public function hapus() {
        $id = $this->uri->segment(3);
        // echo "hapus" . $id;
        $this->m_anggota->delete($id);
        redirect('anggota');
    }
}
?>
