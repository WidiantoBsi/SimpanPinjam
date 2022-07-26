<?php
defined('BASEPATH') or exit ('No Direct Script Access Allowed');

class M_DBWD extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($table,$data,$where){
		$this->db->update($table,$data,$where);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function kosongkan_data($table){
		return $this->db->truncate($table);
	}

  function get_Jenis(){
    $hasil=$this->db->query("SELECT * FROM jenis_pinjaman");
    return $hasil;
  }

	function KodeAngota($length){
		$str        = date("Ymd");//Y-m-d
		$characters = '0123456789';
		$max        = strlen($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}

	function KodeAdm(){
		$this->db->select('RIGHT(db_admin.Id_Admin,3) as kode', FALSE);
		$this->db->order_by('Id_Admin','DESC');    
		$this->db->limit(1);    
      $query = $this->db->get('db_admin');      //cek dulu apakah ada sudah ada kode di tabel.    
      if($query->num_rows() <> 0){      
       //jika kode ternyata sudah ada.      
      	$data = $query->row();      
      	$kode = intval($data->kode) + 1;    
      }
      else {      
       //jika kode belum ada      
      	$kode = 1;    
      }
      $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
      $length = '5';
      $str        = "";//Y-m-d
      $characters = '0123456789';
      $max        = strlen($characters) - 1;
      for ($i = 0; $i < $length; $i++) {
      	$rand = mt_rand(0, $max);
      	$str .= $characters[$rand];
      }
      $kodejadi = $str.$kodemax;    // hasilnya
      return $kodejadi;
  }

  function Id_Laporan($length){
  	$str        = "";
  	$characters = '0123456789';
  	$max        = strlen($characters) - 1;
  	for ($i = 0; $i < $length; $i++) {
  		$rand = mt_rand(0, $max);
  		$str .= $characters[$rand];
  	}
    $Tgl = date("Ymd");
  	return $str.$Tgl;
  }

  function Id_Angsuran($length){
    $str        = "";
    $characters = '0123456789';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
    }
    $Tgl = date("Ymd");
    return $str.$Tgl;
  }

  function Id_Pengajuan($length){
    $str        = "";
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
  }

  function Id_Pinjaman($length){
    $str        = "";
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    $Tgl = date("Ymd");
    return $str.$Tgl;
  }

  function TotalSimpanan($keyword = null){
  	if ($keyword) {
  		$this->db->like('Id_Anggota', $keyword);
  	}
    $this->db->select_sum('Jumlah');
    $query = $this->db->get('db_tabungan');
    if($query->num_rows()>0)
    {
      return $query->row()->Jumlah;
    }
    else
    {
      return 0;
    }
  }

  function JmlSimpanan($keyword = null){
    if ($keyword) {
      $this->db->like('Id_Pengguna', $keyword);
    }
    $this->db->select_sum('Jumlah');
    $query = $this->db->get('db_laporan');
    if($query->num_rows()>0)
    {
      return $query->row()->Jumlah;
    }
    else
    {
      return 0;
    }
  }

  function TotalPinjaman($keyword = null){
    if ($keyword) {
      $this->db->like('Id_Anggota', $keyword);
    }
    $this->db->select_sum('Jumlah');
    $query = $this->db->get('pinjaman');
    if($query->num_rows()>0)
    {
      return $query->row()->Jumlah;
    }
    else
    {
      return 0;
    }
  }

  function TotalAngsuran($keyword = null){
    if ($keyword) {
      $this->db->like('Id_Anggota', $keyword);
    }
    $this->db->select_sum('Jumlah');
    $query = $this->db->get('angsuran');
    if($query->num_rows()>0)
    {
      return $query->row()->Jumlah;
    }
    else
    {
      return 0;
    }
  }

  function hitungJumlah($keyword = null){
    if ($keyword) {
      $this->db->like('Tanggal', $keyword);
    }
    $this->db->select_sum('Jumlah');
    $query = $this->db->get('angsuran');
    if($query->num_rows()>0)
    {
      return $query->row()->Jumlah;
    }
    else
    {
      return 0;
    }
  }

  function format_rupiah($rp) {
  	$hasil = "Rp." . number_format($rp, 0, "", ".") . ".00";
  	return $hasil;
  }

}
?>