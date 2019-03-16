<?php 
 
class Admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
		$this->load->model('admin_model');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
 
	function index(){
		$this->load->view('admin/dashboard');
	}

	function galeri(){
		$data = array('data_galeri' => $this->admin_model->ambil_galeri()->result_array(),);
		$this->load->view('admin/galeri', $data);
	}

	function tambah_galeri(){
		$this->load->view('admin/tambah_galeri');
	}

	function simpan_galeri(){
        $id_galeri  = '';
        $deskripsi     = $this->input->post('deskripsi');

        //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'galeri';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('berkas');
        $data_image = $this->upload->data('file_name');
        $location   = 'galeri/';
        $pict       = $location.$data_image;


        $data=array(
            'id_galeri'=>$id_galeri,
            'berkas'=> $pict,
            'deskripsi'=>$deskripsi
            );
        //simpan data 
        $this->admin_model->simpan('galeri', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('admin/galeri');
    }

    function edit_galeri($kode = 0){
	    $row = $this->admin_model->edit_galeri("where galeri.`id_galeri`  = '$kode'")->result_array();

	    $data = array(
	      'id_galeri' => $row[0]['id_galeri'],
	      'berkas' => $row[0]['berkas'],
	      'deskripsi' => $row[0]['deskripsi'],
	    );
	    $this->load->view('admin/edit_galeri', $data);
  	}

  	function update_galeri(){

  		//upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'galeri';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('berkas');
        $data_image = $this->upload->data('file_name');
        $location   = 'galeri/';
        $pict       = $location.$data_image;

	    $data = array(
	      'id_galeri' => $this->input->post('id_galeri'),
	      'berkas' =>$pict,
	      'deskripsi' => $this->input->post('deskripsi'),
	      );

	    $res = $this->admin_model->update_galeri($data);
	    if($res=1){
	      header('location:'.base_url().'admin/galeri');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_galeri($kode = 0){
	    $result = $this->admin_model->Hapus('galeri',array('id_galeri' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/galeri');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function ekstrakulikuler(){
		$data = array('data_ekstrakulikuler' => $this->admin_model->ambil_ekstrakulikuler()->result_array(),);
		$this->load->view('admin/ekstrakulikuler', $data);
	}

	function tambah_ekstrakulikuler(){
		$this->load->view('admin/tambah_ekstrakulikuler');
	}

	function simpan_ekstrakulikuler(){
	    $id_ekstrakulikuler	= '';
	    $nama= $_POST['nama']; 
	    $deskripsi= $_POST['deskripsi'];

	    $data = array(  
	      'id'=> $id_ekstrakulikuler,
	      'nama'=> $nama,
	      'deskripsi'=> $deskripsi,
	      );

	    $this->admin_model->simpan('ekstrakulikuler', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/ekstrakulikuler');
  	}

  	function edit_ekstrakulikuler($kode = 0){
	    $row = $this->admin_model->edit_ekstrakulikuler("where ekstrakulikuler.`id`  = '$kode'")->result_array();

	    $data = array(
	      'id' => $row[0]['id'],
	      'nama' => $row[0]['nama'],
	      'deskripsi' => $row[0]['deskripsi'],
	    );
	    $this->load->view('admin/edit_ekstrakulikuler', $data);
  	}

  	function update_ekstrakulikuler(){
	    $data = array(
	      'id' => $this->input->post('id'),
	      'nama' => $this->input->post('nama'),
	      'deskripsi' => $this->input->post('deskripsi'),
	      );

	    $res = $this->admin_model->update_ekstrakulikuler($data);
	    if($res=1){
	      header('location:'.base_url().'admin/ekstrakulikuler');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_ekstrakulikuler($kode = 0){
	    $result = $this->admin_model->Hapus('ekstrakulikuler',array('id' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/ekstrakulikuler');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function mapel(){
		$data = array('data_mapel' => $this->admin_model->ambil_mapel()->result_array(),);
		$this->load->view('admin/mapel', $data);
	}

	function tambah_mapel(){
		$this->load->view('admin/tambah_mapel');
	}

	function simpan_mapel(){
	    $id_mapel	= '';
	    $mapel= $_POST['mapel']; 

	    $data = array(  
	      'id_mapel'=> $id_mapel,
	      'nama'=> $mapel,
	      );

	    $this->admin_model->simpan('mapel', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/mapel');
  	}

  	function edit_mapel($kode = 0){
	    $row = $this->admin_model->edit_mapel("where mapel.`id_mapel`  = '$kode'")->result_array();

	    $data = array(
	      'id_mapel' => $row[0]['id_mapel'],
	      'nama' => $row[0]['nama'],
	    );
	    $this->load->view('admin/edit_mapel', $data);
  	}

  	function update_mapel(){
	    $data = array(
	      'id_mapel' => $this->input->post('id_mapel'),
	      'nama' => $this->input->post('nama'),
	      );

	    $res = $this->admin_model->update_mapel($data);
	    if($res=1){
	      header('location:'.base_url().'admin/mapel');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function hapus_mapel($kode = 0){
	    $result = $this->admin_model->Hapus('mapel',array('id_mapel' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/mapel');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function guru(){
		$data = array('data_guru' => $this->admin_model->ambil_guru()->result_array(),);
		$this->load->view('admin/guru', $data);
	}

	function tambah_guru(){
		$data = array('data_mapel' => $this->admin_model->ambil_mapel()->result_array(),);
		$this->load->view('admin/tambah_guru', $data);
	}

	function simpan_guru(){
	    $id_guru	= '';
	    $nip= $_POST['nip']; 
	    $nama= $_POST['nama']; 
	    $jenis_kelamin= $_POST['jenis_kelamin']; 
	    $umur= $_POST['umur']; 
	    $alamat= $_POST['alamat'];
	    $id_mapel= $_POST['mapel']; 

	    $data = array(  
	      'id_guru'=> $id_guru,
	      'nip'=> $nip,
	      'nama'=> $nama,
	      'jenis_kelamin'=> $jenis_kelamin,
	      'umur'=> $umur,
	      'alamat'=> $alamat,
	      'id_mapel'=> $id_mapel,
	      );

	    $this->admin_model->simpan('guru', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    redirect('admin/guru');
  	}

  	function hapus_guru($kode = 0){
	    $result = $this->admin_model->Hapus('guru',array('id_guru' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/guru');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_guru($kode = 0){
	    $row = $this->admin_model->edit_guru("where guru.`id_guru`  = '$kode'")->result_array();

	    $data = array(
	      'id_guru' => $row[0]['id_guru'],
	      'nip' => $row[0]['nip'],
	      'nama' => $row[0]['nama'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'umur' => $row[0]['umur'],
	      'alamat' => $row[0]['alamat'],
	      'id_mapel' => $row[0]['id_mapel'],
	    );

	    $this->load->view('admin/edit_guru', $data);
  	}

  	function update_guru(){
	    $data = array(
	      'id_guru' => $this->input->post('id_guru'),
	      'nip' => $this->input->post('nip'),
	      'nama' => $this->input->post('nama'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'umur' => $this->input->post('umur'),
	      'alamat' => $this->input->post('alamat'),
	      'id_mapel' => $this->input->post('id_mapel'),
	      );

	    $res = $this->admin_model->update_guru($data);
	    if($res=1){
	      header('location:'.base_url().'admin/guru');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function siswa_i(){
		$data = array('siswa_i' => $this->admin_model->ambil_siswa_i()->result_array(),);
		$this->load->view('admin/siswa_i', $data);
	}

	function tambah_siswa_i(){
		$this->load->view('admin/tambah_siswa_i');
	}

	function simpan_siswa(){
	    $id_siswa	= '';
	    $nis= $_POST['nis']; 
	    $nama= $_POST['nama']; 
	    $jenis_kelamin= $_POST['jenis_kelamin']; 
	    $angkatan= $_POST['angkatan']; 
	    $alamat= $_POST['alamat'];
	    $kelas= $_POST['kelas']; 

	    if($kelas == 'Kelas I'){
	    	$kelasnya = 'I';
	    }elseif($kelas == 'Kelas II'){
	    	$kelasnya = 'II';
	    }else{
	    	$kelasnya = 'III';	
	    }

	    $data = array(  
	      'id_siswa'=> $id_siswa,
	      'nis'=> $nis,
	      'nama'=> $nama,
	      'jenis_kelamin'=> $jenis_kelamin,
	      'angkatan'=> $angkatan,
	      'alamat'=> $alamat,
	      'kelas'=> $kelasnya,
	      );

	    $this->admin_model->simpan('siswa', $data);
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Ditambahkan
	    	</div>");
	    if($kelas == 'Kelas I'){
	   		 redirect('admin/siswa_i');
	    }elseif($kelas == 'Kelas II'){
	   		 redirect('admin/siswa_ii');
	    }else{
	    	 redirect('admin/siswa_iii');
	    }
  	}

  	function hapus_siswa_i($kode = 0){
	    $result = $this->admin_model->Hapus('siswa',array('id_siswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/siswa_i');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_siswa_i($kode = 0){
	    $row = $this->admin_model->edit_siswa("where siswa.`id_siswa`  = '$kode'")->result_array();

	    $data = array(
	      'id_siswa' => $row[0]['id_siswa'],
	      'nis' => $row[0]['nis'],
	      'nama' => $row[0]['nama'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'angkatan' => $row[0]['angkatan'],
	      'alamat' => $row[0]['alamat'],
	      'kelas' => $row[0]['kelas'],
	    );

	    $this->load->view('admin/edit_siswa_i', $data);
  	}

  	function update_siswa_i(){
	    $data = array(
	      'id_siswa' => $this->input->post('id_siswa'),
	      'nis' => $this->input->post('nis'),
	      'nama' => $this->input->post('nama'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'angkatan' => $this->input->post('angkatan'),
	      'alamat' => $this->input->post('alamat'),
	      'kelas' => $this->input->post('kelas'),
	      );

	    $res = $this->admin_model->update_siswa($data);
	    if($res=1){
	      header('location:'.base_url().'admin/siswa_i');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function siswa_ii(){
		$data = array('siswa_ii' => $this->admin_model->ambil_siswa_ii()->result_array(),);
		$this->load->view('admin/siswa_ii', $data);
	}

	function tambah_siswa_ii(){
		$this->load->view('admin/tambah_siswa_ii');
	}

  	function hapus_siswa_ii($kode = 0){
	    $result = $this->admin_model->Hapus('siswa',array('id_siswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/siswa_ii');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_siswa_ii($kode = 0){
	    $row = $this->admin_model->edit_siswa("where siswa.`id_siswa`  = '$kode'")->result_array();

	    $data = array(
	      'id_siswa' => $row[0]['id_siswa'],
	      'nis' => $row[0]['nis'],
	      'nama' => $row[0]['nama'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'angkatan' => $row[0]['angkatan'],
	      'alamat' => $row[0]['alamat'],
	      'kelas' => $row[0]['kelas'],
	    );

	    $this->load->view('admin/edit_siswa_ii', $data);
  	}

  	function update_siswa_ii(){
	    $data = array(
	      'id_siswa' => $this->input->post('id_siswa'),
	      'nis' => $this->input->post('nis'),
	      'nama' => $this->input->post('nama'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'angkatan' => $this->input->post('angkatan'),
	      'alamat' => $this->input->post('alamat'),
	      'kelas' => $this->input->post('kelas'),
	      );

	    $res = $this->admin_model->update_siswa($data);
	    if($res=1){
	      header('location:'.base_url().'admin/siswa_ii');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function siswa_iii(){
		$data = array('siswa_iii' => $this->admin_model->ambil_siswa_iii()->result_array(),);
		$this->load->view('admin/siswa_iii', $data);
	}

	function tambah_siswa_iii(){
		$this->load->view('admin/tambah_siswa_iii');
	}

  	function hapus_siswa_iii($kode = 0){
	    $result = $this->admin_model->Hapus('siswa',array('id_siswa' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/siswa_iii');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_siswa_iii($kode = 0){
	    $row = $this->admin_model->edit_siswa("where siswa.`id_siswa`  = '$kode'")->result_array();

	    $data = array(
	      'id_siswa' => $row[0]['id_siswa'],
	      'nis' => $row[0]['nis'],
	      'nama' => $row[0]['nama'],
	      'jenis_kelamin' => $row[0]['jenis_kelamin'],
	      'angkatan' => $row[0]['angkatan'],
	      'alamat' => $row[0]['alamat'],
	      'kelas' => $row[0]['kelas'],
	    );

	    $this->load->view('admin/edit_siswa_iii', $data);
  	}

  	function update_siswa_iii(){
	    $data = array(
	      'id_siswa' => $this->input->post('id_siswa'),
	      'nis' => $this->input->post('nis'),
	      'nama' => $this->input->post('nama'),
	      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	      'angkatan' => $this->input->post('angkatan'),
	      'alamat' => $this->input->post('alamat'),
	      'kelas' => $this->input->post('kelas'),
	      );

	    $res = $this->admin_model->update_siswa($data);
	    if($res=1){
	      header('location:'.base_url().'admin/siswa_iii');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function artikel(){
		$data = array('data_artikel' => $this->admin_model->ambil_artikel()->result_array(),);
		$this->load->view('admin/artikel', $data);
	}

	function tambah_artikel(){
		$this->load->view('admin/tambah_artikel');
	}

	function detail_artikel($kode = 0){
	    $row = $this->admin_model->edit_artikel("where artikel.`id_artikel`  = '$kode'")->result_array();

	    $data = array(
	      'id_artikel' => $row[0]['id_artikel'],
	      'judul' => $row[0]['judul'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	      'penulis' => $row[0]['penulis'],
	      'tanggal' => $row[0]['tanggal'],
	    );

	    $this->load->view('admin/detail_artikel', $data);
  	}

  	function simpan_artikel(){
        $id_artikel  = '';
        $judul     = $this->input->post('judul');
        $isi     = $this->input->post('isi');
        $penulis     = $this->input->post('penulis');
		$tanggal =  date('Y-m-d');

        //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'artikel';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'artikel/';
        $pict       = $location.$data_image;


        $data=array(
            'id_artikel'=>$id_artikel,
            'judul'=>$judul,
            'isi'=>$isi,
            'gambar'=> $pict,
            'penulis'=>$penulis,
            'tanggal'=>$tanggal
            );
        //simpan data 
        $this->admin_model->simpan('artikel', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('admin/artikel');
    }

    function hapus_artikel($kode = 0){
	    $result = $this->admin_model->Hapus('artikel',array('id_artikel' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/artikel');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_artikel($kode = 0){
	    $row = $this->admin_model->edit_artikel("where artikel.`id_artikel`  = '$kode'")->result_array();

	    $data = array(
	      'id_artikel' => $row[0]['id_artikel'],
	      'judul' => $row[0]['judul'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	      'penulis' => $row[0]['penulis'],
	      'tanggal' => $row[0]['tanggal'],
	    );

	    $this->load->view('admin/edit_artikel', $data);
  	}

  	function update_artikel(){
  		$tanggal =  date('Y-m-d');

  		 //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'artikel';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'artikel/';
        $pict       = $location.$data_image;

	    $data = array(
	      'id_artikel' => $this->input->post('id_artikel'),
	      'judul' => $this->input->post('judul'),
	      'isi' => $this->input->post('isi'),
	      'gambar' => $pict,
	      'penulis' => $this->input->post('penulis'),
	      'tanggal' => $tanggal,
	      );

	    $res = $this->admin_model->update_artikel($data);
	    if($res=1){
	      header('location:'.base_url().'admin/artikel');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}

	function profil(){
		$data = array('data_profil' => $this->admin_model->ambil_profil()->result_array(),);
		$this->load->view('admin/profil', $data);
	}

	function tambah_profil(){
		$this->load->view('admin/tambah_profil');
	}

	function detail_profil($kode = 0){
	    $row = $this->admin_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('admin/detail_profil', $data);
  	}

  	function simpan_profil(){
        $id_profil  = '';
        $judul     = $this->input->post('judul');
        $isi     = $this->input->post('isi');

        //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'profil';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'profil/';
        $pict       = $location.$data_image;


        $data=array(
            'id_profil'=>$id_profil,
            'nama'=>$judul,
            'isi'=>$isi,
            'gambar'=> $pict
            );
        //simpan data 
        $this->admin_model->simpan('profil', $data);

        $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
        redirect('admin/profil');
    }

    function hapus_profil($kode = 0){
	    $result = $this->admin_model->Hapus('profil',array('id_profil' => $kode));
	    if($result == 1){
	      header('location:'.base_url().'admin/profil');
	    $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Dihapus
	    	</div>");
		}
	}

	function edit_profil($kode = 0){
	    $row = $this->admin_model->edit_profil("where profil.`id_profil`  = '$kode'")->result_array();

	    $data = array(
	      'id_profil' => $row[0]['id_profil'],
	      'nama' => $row[0]['nama'],
	      'isi' => $row[0]['isi'],
	      'gambar' => $row[0]['gambar'],
	    );

	    $this->load->view('admin/edit_profil', $data);
  	}

  	function update_profil(){
  		$tanggal =  date('Y-m-d');

  		 //upload file
        $config['max_size']=2048;
        $config['allowed_types']="jpg|jpeg|png";
        $config['remove_spaces']=TRUE;
        $config['overwrite']=TRUE;
        $config['upload_path']=FCPATH.'profil';

        $this->load->library('upload');
        $this->upload->initialize($config);

        //ambil data image
        $this->upload->do_upload('gambar');
        $data_image = $this->upload->data('file_name');
        $location   = 'profil/';
        $pict       = $location.$data_image;

	    $data = array(
	      'id_profil' => $this->input->post('id_profil'),
	      'nama' => $this->input->post('judul'),
	      'isi' => $this->input->post('isi'),
	      'gambar' => $pict,
	      );

	    $res = $this->admin_model->update_profil($data);
	    if($res=1){
	      header('location:'.base_url().'admin/profil');
	      $this->session->set_flashdata("sukses", "
	    	<div class='alert alert-success alert-block'> <a class='close' data-dismiss='alert' href='#'>×</a> <h4 class='alert-heading'>Sukses!</h4> Data Berhasil Diedit
	    	</div>");
	    }
	}
}