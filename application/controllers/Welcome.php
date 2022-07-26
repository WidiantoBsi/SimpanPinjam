<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status')!= "Admin" or $this->session->userdata('username')== ""){
			redirect(base_url().'Logout');
		}
	}

	function index(){
		$tgl = date('Y');
		$data['Total'] = $this->M_DBWD->hitungJumlah($tgl); 
		$data['Dbsimpan'] = $this->M_DBWD->get_data('angsuran')->result();
		$this->load->view('Header');
		$this->load->view('Dashboard',$data);
		$this->load->view('footer');
	}

	function Anggota(){
		$data['anggota'] = $this->M_DBWD->get_data('anggota')->result();
		$data['IDAgt']=$this->M_DBWD->KodeAngota('6');
		$this->load->view('Header');
		$this->load->view('Anggota',$data);
		$this->load->view('footer');
	}

	function AddAnggota(){
		$ID = $this->input->post('ID');
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Email = $this->input->post('email');
		$Tgl_lhir = $this->input->post('Tgl_Lahir');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		$Almt = $this->input->post('Alamat');

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = 'foto'.time();

		$this->load->library('upload',$config);
		if($this->upload->do_upload('foto')){
			$image = $this->upload->data();
			$data = array(
				'Id_Anggota' => $ID,
				'NIP' => $NIP,
				'NamaAnggota' => $Nama,
				'Email' => $Email,
				'Tanggal' => $Tgl_lhir,
				'JenisKelamin' => $JK,
				'NoHp' => $NoHp,
				'Alamat' => $Almt,
				'Photo' => $image['file_name']
			);
			$this->M_DBWD->insert_data($data,'anggota');
			$this->session->set_flashdata('alert','Berhasil');
			redirect(base_url().'Anggota');
		}else {
			$this->session->set_flashdata('alert','GagalUpload');
			redirect(base_url().'Anggota');
		}
	}

	function EditAnggota(){
		$ID = $this->input->post('ID');
		$NIP = $this->input->post('NIP');
		$Nama = $this->input->post('Nama');
		$Email = $this->input->post('email');
		$Tgl_lhir = $this->input->post('Tgl_Lahir');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		$Almt = $this->input->post('Alamat');

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = 'foto'.time();

		$this->load->library('upload',$config);
		$image = $this->upload->data();
		$where = array('Id_Anggota' => $ID);
		$data = array(
			'NIP' => $NIP,
			'NamaAnggota' => $Nama,
			'Email' => $Email,
			'Tanggal' => $Tgl_lhir,
			'JenisKelamin' => $JK,
			'NoHp' => $NoHp,
			'Alamat' => $Almt
		);
		if($this->upload->do_upload('foto')){
              //proses upload Gambar
			$image = $this->upload->data();
			$where = array('Id_Anggota' => $ID);
			$db = $this->M_DBWD->edit_data($where,'anggota')->result();
		foreach ($db as $row){ //Hapus Photo di folder
			unlink("assets/upload/".$row->Photo);
		}

		$where = array('Id_Anggota' => $ID);
		$data = array(
			'NIP' => $NIP,
			'NamaAnggota' => $Nama,
			'Email' => $Email,
			'Tanggal' => $Tgl_lhir,
			'JenisKelamin' => $JK,
			'NoHp' => $NoHp,
			'Alamat' => $Almt,
			'Photo' => $image['file_name']
		);
		$this->M_DBWD->update_data('anggota',$data,$where);
	}
	else {
		$this->session->set_flashdata('alert','GagalUpload');
		redirect(base_url().'Anggota');
	} 
	$this->M_DBWD->update_data('anggota',$data,$where);
	$this->session->set_flashdata('alert','Berhasil');
	redirect(base_url().'Anggota');
}

function HapusAnggota(){
	$id = $this->input->post('ID');//id Anggota
	$where = array('Id_Anggota' => $id);
	$db = $this->M_DBWD->edit_data($where,'anggota')->result();
		foreach ($db as $row){ //Hapus Photo di folder
			unlink("assets/upload/".$row->Photo);
		}
		$this->M_DBWD->delete_data($where,'anggota'); // Hapus data Anggota
		redirect('Anggota');
	}

	function Admin(){
		$data['admin'] = $this->M_DBWD->get_data('db_admin')->result();
		$data['IDAgt']=$this->M_DBWD->KodeAdm();
		$this->load->view('Header');
		$this->load->view('Admin',$data);
		$this->load->view('footer');
	}

	function AddAdmin(){
		$ID = $this->input->post('ID');
		$Nama = $this->input->post('Nama');
		$Email = $this->input->post('email');
		$Bagian = $this->input->post('Bagian');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		
		$data = array(
			'Id_Admin' => $ID,
			'Bagian' => $Bagian,
			'Nama' => $Nama,
			'Email' => $Email,
			'JenisKelamin' => $JK,
			'NoHp' => $NoHp
		);
		$this->M_DBWD->insert_data($data,'db_admin');
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Admin');
	}

	function EditAdmin(){
		$ID = $this->input->post('ID');
		$Nama = $this->input->post('Nama');
		$Email = $this->input->post('email');
		$Bagian = $this->input->post('Bagian');
		$JK = $this->input->post('JK');
		$NoHp = $this->input->post('NoHp');
		
		$where = array('Id_Admin' => $ID);
		$data = array(
			'Bagian' => $Bagian,
			'Nama' => $Nama,
			'Email' => $Email,
			'JenisKelamin' => $JK,
			'NoHp' => $NoHp
		);
		$this->M_DBWD->update_data('db_admin',$data,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Admin');
	}

	function HapusAdmin(){
		$id = $this->input->post('ID');
		$where = array('Id_Admin' => $id);
		$this->M_DBWD->delete_data($where,'db_admin'); // Hapus data Anggota
		redirect('Admin');
	}

	function Pinjaman(){
		$data['KtPinjaman'] = $this->M_DBWD->get_data('jenis_pinjaman')->result();
		$this->load->view('Header');
		$this->load->view('Pinjaman',$data);
		$this->load->view('footer');
	}

	function AddPinjaman(){
		$Jumlah = $this->input->post('Jumlah');
		
		$data = array('Jumlah' => $Jumlah);

		$this->M_DBWD->insert_data($data,'jenis_pinjaman');
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Pinjaman');
	}

	function EditPinjaman(){
		$id = $this->input->post('ID');
		$Jumlah = $this->input->post('Jumlah');
		
		$where = array('Id_Jenis' => $id);
		$data = array('Jumlah' => $Jumlah);

		$this->M_DBWD->update_data('jenis_pinjaman',$data,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Pinjaman');		
	}

	function HapusPinjaman(){
		$id = $this->input->post('ID');
		$where = array('Id_Jenis' => $id);
		$this->M_DBWD->delete_data($where,'jenis_pinjaman'); // Hapus data Simpanan
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Pinjaman');
	}

	function Simpanan(){
		$data['KtSimpan'] = $this->M_DBWD->get_data('jenis_simpanan')->result();
		$data['Tabungan'] = $this->M_DBWD->get_data('db_tabungan')->result();
		$this->load->view('Header');
		$this->load->view('Simpanan',$data);
		$this->load->view('footer');
	}

	function AddSimpanan(){
		$Nama = $this->input->post('Nama');
		
		$data = array('Nama' => $Nama);

		$this->M_DBWD->insert_data($data,'jenis_simpanan');
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Simpanan');
	}

	function EditSimpanan(){
		$id = $this->input->post('ID');
		$Nama = $this->input->post('Nama');
		$Jumlah = $this->input->post('Jumlah');
		$Ket = $this->input->post('Ket');

		$where = array('Id_Simpanan' => $id);
		$data = array('Nama' => $Nama);

		$this->M_DBWD->update_data('jenis_simpanan',$data,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Simpanan');
	}

	function HapusSimpanan(){
		$id = $this->input->post('ID');

		$where = array('Id_Simpanan' => $id);
		
		$this->M_DBWD->delete_data($where,'jenis_simpanan'); // Hapus data Simpanan
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Simpanan');
	}

	//Data Pengajuan
	function Pengajuan(){
		$data['Dbpinjam'] = $this->M_DBWD->get_data('db_pengajuan')->result();
		$this->load->view('Header');
		$this->load->view('Pengajuan',$data);
		$this->load->view('footer');
	}

	function AddPengajuan(){ //Proses Pengajuan
		$Id_Admin = $this->session->userdata('id');
		$IdNo = $this->M_DBWD->Id_Pinjaman('6');
		$ID = $this->input->post('ID');
		$IDAgt = $this->input->post('Id_Anggota');
		$Verivikasi = $this->input->post('Cek');
		$Jumlah = $this->input->post('Jumlah');
		$Tanggal = date('Y-m-d H:i:s');

		if ($Verivikasi=="Y") {
		$data = array(
			'Id_Pinjaman' => $IdNo, 
			'Id_Anggota' => $IDAgt,
			'Tanggal' => $Tanggal,
			'Jumlah' => $Jumlah
		);

		$where = array('Id_Pengajuan' => $ID);
		$data2 = array(
			'Id_Admin' => $Id_Admin, 
			'Verivikasi' => $Verivikasi
		);

		$this->M_DBWD->insert_data($data,'pinjaman');
		$this->M_DBWD->update_data('db_pengajuan',$data2,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Pengajuan');
		}else{
		$where = array('Id_Pengajuan' => $ID);
		$data2 = array(
			'Id_Admin' => $Id_Admin, 
			'Verivikasi' => $Verivikasi
		);
		$this->M_DBWD->update_data('db_pengajuan',$data2,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Pengajuan');
		}
	}

	function Tabungan(){ //db Simpanan
		$data['anggota'] = $this->M_DBWD->get_data('anggota')->result();
		$data['Dbjenis'] = $this->M_DBWD->get_data('jenis_simpanan');
		$this->load->view('Header');
		$this->load->view('Tabungan',$data);
		$this->load->view('footer');
	}

	function AddTabungan(){
		$IdNo = $this->M_DBWD->Id_Laporan('4');
		$Jumlah = $this->input->post('Jumlah');
		$Id_Anggota = $this->input->post('ID');
		$Id_Jenis = $this->input->post('Jenis');
		$Tgl = date('Y-m-d H:i:s');

		$where = array('Id_Anggota' => $Id_Anggota);
		$db = $this->M_DBWD->edit_data($where,'db_tabungan');
		$dt = $db->num_rows();
		if ($dt>0) {
		$DB = $this->M_DBWD->edit_data($where,'db_tabungan')->result();
		foreach($DB as $w){
			$Jml = $w->Jumlah;
		}
		$Ttl =  $Jml+$Jumlah; 

		$data = array(
			'Id_Jenis' => $Id_Jenis,
			'Tanggal' => $Tgl,
			'Jumlah' => $Ttl
		);
		$this->M_DBWD->update_data('db_tabungan',$data,$where);
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Tabungan');
		}else{
		$data = array(
			'Id_Tabungan' => $IdNo,
			'Id_Anggota' => $Id_Anggota,
			'Id_Jenis' => $Id_Jenis,
			'Tanggal' => $Tgl,
			'Jumlah' => $Jumlah
		);
		$this->M_DBWD->insert_data($data,'db_tabungan');
		$this->session->set_flashdata('alert','Berhasil');
		redirect(base_url().'Tabungan');
		}
	}

}
