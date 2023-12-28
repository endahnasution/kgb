    <?php

defined('BASEPATH') or exit('No direct script access allowed');

class Master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Master_model');
    }

    public function data_pegawai()
    {
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $data['pegawai'] = $this->Master_model->getPegawai();
        $this->template->load('layouts/admin_template', 'admin/data_pegawai',$data);
    }

    public function tambah_pegawai()
        {
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $data = konfigurasi('Form Tambah Pegawai',"ap");
            $this->template->load('layouts/admin_template', 'admin/form_pegawai',$data);
            
        }

        public function simpan_pegawai()
        {
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $nama =  $this->input->post('nama');
            $jabatan =  $this->input->post('jabatan');
            $nip =  $this->input->post('nip');
            $pangkat =  $this->input->post('pangkat');
            $golongan =  $this->input->post('golongan');
            $ppk = $this->input->post('ppk');
    
        
            $data = array (
                'idPegawai' => $id,
                'nama' => $nama,
                'jabatan' => $jabatan,
                'nip' => $nip,
                'pangkat' => $pangkat,
                'golongan' => $golongan,
                'ppk' => $ppk
            );


            $this->db->insert('tbl_pegawai',$data);

        

        $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
        redirect('admin/Master/data_pegawai', 'refresh');

            
        }
        
        public function editPegawai(){
            $id = $this->uri->segment(4);
        $data = konfigurasi('Form Edit Surat', "ap");
        $data['pegawai'] = $this->Master_model->getPegawaiId($id);
        $this->template->load('layouts/admin_template', 'admin/edit_pegawai', $data);
            
        }

        public function ubahPegawai(){
        $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $nip = $this->input->post('nip');
        $pangkat = $this->input->post('pangkat');
        $golongan = $this->input->post('golongan');
        $substansi = $this->input->post('substansi');
        $role = $this->input->post('role');
        $activated = $this->input->post('activated');

 
            $data = array (
                'idPegawai' => $id,
                'nama' => $nama,
                'jabatan' => $jabatan,
                'nip' => $nip,
                'pangkat' => $pangkat,
                'golongan' => $golongan,
                'substansi' => $substansi,
                'id_role' => $role,
                'activated' => $activated
            );


            $this->Master_model->updatePegawai($data);
            redirect('admin/Master/data_pegawai');
        }
    

public function hapus_dataPegawai(){
    $data = konfigurasi('Pilih Surat Tugas', 'ap');
        $id = $this->input->post('idPg');
        $this->Master_model->hapus_dataPegawai($id);
        redirect('admin/Master/data_pegawai');
        }



    public function data_sarana()
    {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
        $data['sarana'] = $this->Master_model->getSarana();
        $this->template->load('layouts/admin_template', 'admin/data_sarana',$data);
    }

 public function tambah_sarana()
        {
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $data = konfigurasi('Form Tambah Sarana',"as");
            $this->template->load('layouts/admin_template', 'admin/form_sarana',$data);
            
        }

        public function simpan_sarana()
        {
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $nama =  $this->input->post('namas');
            $alamat =  $this->input->post('alamats');
            $jenis =  $this->input->post('kategori'); 
            $produk = $this->input->post('produk');
            $kota =  $this->input->post('kota'); 
            $kecamatan =  $this->input->post('kecamatan'); 
            $kelurahan = $this->input->post('kelurahan'); 
            $kategori = $this->input->post('komoditi');     
            
            $data = array(
                'namaSarana' => $nama,
                'alamatSarana' => $alamat,
                'jenisSarana' => $jenis,
                'produkSarana' => $produk,
                'kotaSarana' => $kota,
                'kecamatanSarana' => $kecamatan,
                'kelurahanSarana' => $kelurahan,
                'kategoriSarana' => $kategori
                );  

            $this->db->insert('tbl_sarana',$data);

        

        $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
        redirect('admin/Master/data_sarana', 'refresh');

            
        }
        
               public function editSarana(){
            $id = $this->uri->segment(4);
        $data = konfigurasi('Form Edit Surat', "ap");
        $data['sarana'] = $this->Master_model->getSaranaId($id);
        $this->template->load('layouts/admin_template', 'admin/edit_sarana', $data);
            
        }

        public function ubahSarana(){
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $id = $this->input->post('id');
            $ns =  $this->input->post('nama');
            $als =  $this->input->post('alamat');
            $jenis =  $this->input->post('jenis');
            $produk =  $this->input->post('produk');
            $kota =  $this->input->post('kota');
            $kecamatan =  $this->input->post('kecamatan');
            $kelurahan =  $this->input->post('kelurahan');
            $kategori =  $this->input->post('kategori');
            
            
            $data1 = array(
                'idSarana' => $id,
                'namaSarana' => $ns,
                'alamatSarana' => $als,
                'jenisSarana' => $jenis,
                'produkSarana' => $produk,
                'kotaSarana' => $kota,
                'kecamatanSarana' => $kecamatan,
                'kelurahanSarana' => $kelurahan,
                'kategoriSarana' => $kategori
                );  

            $this->Master_model->updateSarana($data1);
            redirect('admin/Master/data_sarana');
        }
    

        public function hapus_dataSarana(){
        $id = $this->input->post('idHapus');
        $this->Master_model->hapus_dataSarana($id);
        redirect('admin/Master/data_sarana');
        }


public function data_anggaran()
    {
$data = konfigurasi('Pilih Surat Tugas', 'ap');
$data['ppk'] = $this->Master_model->getPpk();
        $data['anggaran'] = $this->Master_model->getAnggaran();
        $this->template->load('layouts/admin_template', 'admin/data_anggaran',$data);
        
    }

 public function tambah_anggaran()
        {
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $data = konfigurasi('Form Tambah Sarana',"ag");
            $data['ppk'] = $this->Master_model->getPpk();
            $this->template->load('layouts/admin_template', 'admin/form_anggaran',$data);
            
        }

        public function simpan_anggaran()
        {
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $ma =  $this->input->post('makag');
            $da =  $this->input->post('diviag');
            $pagua =  $this->input->post('paguag');
            $ppk = $this->input->post('ppk');
            // $ra =  $this->input->post('realisasiag');
                        
            $data = array(
                'mak' => $ma,
                'jenisSubstansi' => $da,
                'pagu' => $pagua,
                'idPpk'=>$ppk
                // 'realisasi' => $ra
                );  

            $this->db->insert('tbl_anggaran2022',$data);

        

        $this->session->set_flashdata('success', 'Data Berhasil Dimasukkan');
        redirect('admin/Master/data_anggaran', 'refresh');

            
        }
        
        public function editAnggaran(){
            $id = $this->uri->segment(4);
        $data = konfigurasi('Form Edit Surat', "ap");
        $data['ppk'] = $this->Master_model->getPpk();
        $data['anggaran'] = $this->Master_model->getAnggaranId($id);
        $this->template->load('layouts/admin_template', 'admin/edit_anggaran', $data);
            
        }

        public function ubahAnggaran(){
            $data = konfigurasi('Pilih Surat Tugas', 'ap');
            $id = $this->input->post('id');
             $nama =  $this->input->post('nama');
            $mak =  $this->input->post('mak');
            $kegiatan =  $this->input->post('kegiatan');
            $substansi =  $this->input->post('substansi');
            $kode =  $this->input->post('kode');
            $pagu =  $this->input->post('pagu');
            $ppk =  $this->input->post('ppk');
            
            $data = array(
                'idAnggaran' => $id,
                'namaAnggaran' =>$nama,
                'mak' => $mak,
               'jenisSubstansi'  => $substansi,
                'uraianKegiatan' => $kegiatan,
                'kode' => $kode,
                'pagu' => $pagu,
                'idPpk' =>$ppk
                // 'realisasi' => $ra
                );  

            $this->Master_model->updateAnggaran($data);
            redirect('admin/Master/data_anggaran');
        }
    

        public function hapus_dataAnggaran(){
        $id = $this->input->post('idHapus');
        $this->Master_model->hapus_dataAnggaran($id);
        redirect('admin/Master/data_anggaran');
        }

}

