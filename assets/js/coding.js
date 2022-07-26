const flashdata = $('.flash-data').data('flashdata');

if (flashdata == 'Berhasil') {
	swal("Berhasil", "Data Berhasil Di Proses..", "success")
}else if (flashdata == 'GagalUpload') {
	swal("Gagal!", "File Gagal di upload!, Pastikan Format jpg, png, jpeg dan ukuran max 2048Kb/5Gb", "info");
}else if (flashdata == 'Gagal') {
	swal("Gagal!", "Gagal Data Tidak Tersimpan!", "warning");
}