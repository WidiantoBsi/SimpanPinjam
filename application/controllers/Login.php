<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index(){
		$this->load->view('Login');
		$this->load->view('footer');
	}

	function CekLogin(){
		$No = $this->input->post('No');
		$Email =  $this->input->post('email');
		$where = array('NoHp' => $No, 'Email' => $Email);

		$db = $this->M_DBWD->edit_data($where,'anggota')->result();
		$data = $this->M_DBWD->edit_data($where,'anggota');
		$cek = $data->num_rows();
		$Admdb = $this->M_DBWD->edit_data($where,'db_admin')->result();
		$Adm = $this->M_DBWD->edit_data($where,'db_admin');
		$dt = $Adm->num_rows();
		if ($cek > 0) { //cek data Anggota
			foreach ($db as $row) {
				$Nama = $row->NamaAnggota;
				$Id = $row->Id_Anggota;
			}
			$session = array('id' => $Id,'username' => $Nama,'status' =>'Pengguna');
			$this->session->set_userdata($session);
			redirect(base_url('Dashboard'));
		}elseif ($dt > 0) { //cek data admin
			foreach ($Admdb as $rw) {
				$Nama = $rw->Nama;
				$Id = $rw->Id_Admin;
			}
			$session = array('id' => $Id,'username' => $Nama,'status' =>'Admin');
			$this->session->set_userdata($session);
			redirect(base_url('Welcome'));
		}else{
			$this->session->set_flashdata('alert','Login Gagal! Nomor dan Email belum terdaftar!'); 
			redirect(base_url('Login'));
		}
	}

	function LogOut(){
		$session = array('id','username');
		$this->session->sess_destroy($session);
	    redirect(base_url('Login'));
	}

	function Daftar(){
		$data['IDAgt']=$this->M_DBWD->KodeAngota('6');
		$this->load->view('Register',$data);
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
			redirect(base_url().'Daftar');
		}else {
			$this->session->set_flashdata('alert','GagalUpload');
			redirect(base_url().'Daftar');
		}
	}

}

?>