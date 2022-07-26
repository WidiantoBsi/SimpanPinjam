<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status')!= "Pengguna" or $this->session->userdata('username')== ""){
			redirect(base_url().'Logout');
		}
	}

	function index(){
		$Id_Anggota = $this->session->userdata('id');
		$where = array('Id_Anggota' => $Id_Anggota);
		$data['angsuran'] = $this->M_DBWD->edit_data($where,'angsuran')->result();
		$data['Ttlangsuran'] = $this->M_DBWD->edit_data($where,'pinjaman')->result();
		//Tampilan List Panel Dashboard
		$data['SubTotal'] = $this->M_DBWD->TotalPinjaman($Id_Anggota);
		$data['Angsuran'] = $this->M_DBWD->TotalAngsuran($Id_Anggota); 
		$data['TotalSimpan'] = $this->M_DBWD->TotalSimpanan($Id_Anggota);
		$data['TtlSimpan'] = $this->M_DBWD->JmlSimpanan($Id_Anggota);
		$data['Ttlpinjam'] = $this->M_DBWD->edit_data($where,'pinjaman')->num_rows();
		$this->load->view('Anggota/Header');
		$this->load->view('Anggota/Dashboard',$data);
		$this->load->view('footer');
	}

	function Simpanan(){
		$Id = $this->session->userdata('id');
		$where = array('Id_Pengguna' => $Id);
		$whe = array('Id_Anggota' => $Id); 
		$data['SubTotal'] = $this->M_DBWD->TotalSimpanan($Id);
		$data['Tabungan'] = $this->M_DBWD->edit_data($where,'db_laporan')->result();
		$data['TtlTabungan'] = $this->M_DBWD->edit_data($whe, 'db_tabungan')->result();
		$this->load->view('Anggota/Header');
		$this->load->view('Anggota/Simpanan',$data);
		$this->load->view('footer');
	}

	function EditSimpanan(){
		$IdNo = $this->M_DBWD->Id_Laporan('3');
		$Jumlah = $this->input->post('Jumlah');
		$Id_Anggota = $this->session->userdata('id');
		$Tgl = date('Y-m-d H:i:s');

		$where = array('Id_Anggota' => $Id_Anggota);
		$DB = $this->M_DBWD->edit_data($where,'db_tabungan')->result();
		foreach($DB as $w){
			$Jml = $w->Jumlah;
		}
		$Ttl = $Jml-$Jumlah; 

		$data = array(
			'Id_Laporan' => $IdNo,
			'Id_Pengguna' => $Id_Anggota,
			'Tanggal' => $Tgl,
			'Jumlah' => $Jumlah,
			'Total' => $Ttl
		);

		$this->M_DBWD->insert_data($data,'db_laporan');
		// Ubdate Simpanan
		$where = array('Id_Anggota' => $Id_Anggota);
		$data2 = array('Jumlah' => $Ttl);

		$this->M_DBWD->update_data('db_tabungan',$data2,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'DataSimpanan/');
	}

	//Data Pijaman Anggota
	function Pinjaman(){
		//ganti dengan add pinjaman
		$Id = $this->session->userdata('id');
		$where = array('Id_Anggota' => $Id);
		$data['Dbpinjam'] = $this->M_DBWD->edit_data($where,'db_pengajuan')->result();
		$data['anggota'] = $this->M_DBWD->get_data('anggota')->result();
		$data['Jenis'] = $this->M_DBWD->get_Jenis();
		$this->load->view('Anggota/Header');
		$this->load->view('Anggota/Pinjaman',$data);
		$this->load->view('footer');
	}

	function AddPinjaman(){ //TopUp Pinjaman
		$IdNo = $this->M_DBWD->Id_Angsuran('4');
		$Jumlah = $this->input->post('Jumlah');
		$Id_Anggota = $this->session->userdata('id');
		$Tgl = date('Y-m-d H:i:s');
		$Cicil = $this->input->post('Pinjaman');
		$Ttl = $Cicil-$Jumlah;

		$data = array(
			'Id_Angsuran' => $IdNo,
			'Id_Anggota' => $Id_Anggota,
			'Tanggal' => $Tgl,
			'Jumlah' => $Jumlah
		);

		$this->M_DBWD->insert_data($data,'angsuran');

		$where = array('Id_Anggota' => $Id_Anggota);
		$data2 = array('Jumlah' => $Ttl);

		$this->M_DBWD->update_data('pinjaman',$data2,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Dashboard');
	}

	function AddPengajuan(){
		$IdNo = $this->M_DBWD->Id_Pengajuan('6');
		$Id_Pinjaman = $this->input->post('Jenis');
		$Id_Anggota = $this->session->userdata('id');
		$Keterangan = $this->input->post('Ket');
		$Tgl = date('Y-m-d H:i:s');

		$data = array(
			'Id_Pengajuan' => $IdNo,
			'Id_Anggota' => $Id_Anggota,
			'Id_Pinjaman' => $Id_Pinjaman,
			'Tanggal' => $Tgl,
			'Keterangan' => $Keterangan
		);

		$this->M_DBWD->insert_data($data,'db_pengajuan');
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'DataPinjaman/');
	}

	function HapusPengajuan(){
		$id = $this->input->post('ID');
		$where = array('Id_Pinjaman' => $id);
		$this->M_DBWD->delete_data($where,'db_pengajuan'); // Hapus data Pengajuan
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'DataPinjaman/');
	}

}
?>