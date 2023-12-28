<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
	}


    public function getMonitoring()
	{
		$this->db->select('tbl_sarana.idSarana, tbl_sarana.namaSarana, tbl_pegawai.nama, tbl_surattl.tglPeriksa,tbl_pegawai.idPegawai,tbl_surattl.idTl, tbl_peringatan.idPeringatan');
		$this->db->from('tbl_surattl');
        $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
        $this->db->join('tbl_peringatan', 'tbl_surattl.idTl = tbl_peringatan.idTl');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.idPegawai = tbl_peringatan.idPetugas');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMonitoringId($id)
	{
		$this->db->select('tbl_sarana.idSarana, tbl_sarana.namaSarana, tbl_pegawai.nama, tbl_surattl.tglPeriksa,tbl_pegawai.idPegawai,tbl_surattl.idTl, tbl_peringatan.idPeringatan');
		$this->db->from('tbl_surattl');
        $this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
        $this->db->join('tbl_peringatan', 'tbl_surattl.idTl = tbl_peringatan.idTl');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.idPegawai = tbl_peringatan.idPetugas');
		$this->db->where('tbl_peringatan.idPeringatan',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getRiwayatId($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_monitoring');
        $this->db->join('tbl_peringatan', 'tbl_peringatan.idPeringatan = tbl_monitoring.idPeringatan');
		$this->db->where('tbl_peringatan.idPeringatan',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getRiwayatMonitoring($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_monitoring');
		$this->db->where('tbl_monitoring.idMonitoring',$id);
		$query = $this->db->get();
		return $query->result();
	}

    public function hapus_monitoring($id){
        $this->db->delete("tbl_peringatan",array("idPeringatan"=>$id));
      }

	  public function updateMonitoring($data){
		$this->db->set('tbl_peringatan.idPetugas', $data['idPegawai']); 
		$this->db->where('tbl_peringatan.idPeringatan',$data['idPeringatan']);
		$query = $this->db->update('tbl_peringatan');
      }

	  public function updateRiwayatMonitoring($data){
		$this->db->set('tbl_monitoring.statusMonitoring', $data['statusMonitoring']); 
		$this->db->set('tbl_monitoring.tanggalMonitoring', $data['tanggalMonitoring']); 
		$this->db->set('tbl_monitoring.kesesuaianMonitoring', $data['kesesuaianMonitoring']); 
		$this->db->set('tbl_monitoring.justifikasiMonitoring', $data['justifikasiMonitoring']); 
		$this->db->where('tbl_monitoring.idMonitoring',$data['idMonitoring']);
		$query = $this->db->update('tbl_monitoring');
      }


	public function getSarana()
	{
		$this->db->select('tbl_sarana.idSarana,tbl_surattl.idTl, tbl_sarana.namaSarana');
		$this->db->from('tbl_surattl');
		$this->db->join('tbl_sarana', 'tbl_surattl.idSarana = tbl_sarana.idSarana');
        $this->db->join('tbl_peringatan', 'tbl_surattl.idTl = tbl_peringatan.idTl', "left");
		$this->db->where('tbl_peringatan.idTl', null);
		$query = $this->db->get();
		return $query->result();
	}

	public function hapus_riwayat($id){
        $this->db->delete("tbl_monitoring",array("idMonitoring"=>$id));
      }

	// public function getSuratTugasCapa()
	// {
	// 	$this->db->select('tbl_surattugas.noSuratTugas, tbl_surattugas.idSurat');
	// 	$this->db->from('tbl_surattugas');
	// 	$this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
	// 	$this->db->join('tbl_surattl', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
	// 	$this->db->join('tbl_peringatan', 'tbl_surattl.idTl = tbl_peringatan.idTl');
	// 	$this->db->group_by('tbl_surattugas.noSuratTugas');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// public function getTl($id)
	// {
	// 	$this->db->select('tbl_surattl.idTl');
	// 	$this->db->from('tbl_surattl');
	// 	$this->db->join('tbl_lhk', 'tbl_lhk.idSuratTugas = tbl_surattl.idSuratTugas');
	// 	$this->db->join('tbl_surattugas ', 'tbl_lhk.idSuratTugas = tbl_surattugas.idSurat');
	// 	$this->db->where('tbl_surattugas.idSurat', $id);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
}
