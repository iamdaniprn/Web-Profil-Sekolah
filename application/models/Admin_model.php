<?php 
 
class Admin_model extends CI_Model{	

	public function ambil_galeri(){
		$query=$this->db->query("SELECT * FROM galeri");
		return $query;
	}

	public function simpan($table, $data){
		return $this->db->insert($table, $data);
	}

	public function Hapus($table,$where){
		return $this->db->delete($table,$where);
	}

	public function edit_galeri($where= "") {
		$data = $this->db->query('SELECT * FROM galeri '.$where);
		return $data;
	}

	public function update_galeri($data){
        $this->db->where('id_galeri',$data['id_galeri']);
        $this->db->update('galeri',$data);
    }	

    public function ambil_ekstrakulikuler(){
		$query=$this->db->query("SELECT * FROM ekstrakulikuler");
		return $query;
	}

	public function edit_ekstrakulikuler($where= "") {
		$data = $this->db->query('SELECT * FROM ekstrakulikuler '.$where);
		return $data;
	}

	public function update_ekstrakulikuler($data){
        $this->db->where('id',$data['id']);
        $this->db->update('ekstrakulikuler',$data);
    }

    public function ambil_mapel(){
		$query=$this->db->query("SELECT * FROM mapel");
		return $query;
	}

	public function edit_mapel($where= "") {
		$data = $this->db->query('SELECT * FROM mapel '.$where);
		return $data;
	}

	public function update_mapel($data){
        $this->db->where('id_mapel',$data['id_mapel']);
        $this->db->update('mapel',$data);
    }

    public function ambil_guru(){
		$query=$this->db->query("SELECT guru.*, mapel.`nama` as nama_mapel FROM guru JOIN mapel ON guru.`id_mapel` = mapel.`id_mapel`");
		return $query;
	}	

	public function edit_guru($where= "") {
		$data = $this->db->query('SELECT * FROM guru '.$where);
		return $data;
	}

	public function update_guru($data){
        $this->db->where('id_guru',$data['id_guru']);
        $this->db->update('guru',$data);
    }

    public function ambil_siswa_i(){
		$query=$this->db->query("SELECT * from siswa  where kelas = 'I'");
		return $query;
	}	

	public function edit_siswa($where= "") {
		$data = $this->db->query('SELECT * FROM siswa '.$where);
		return $data;
	}

	public function update_siswa($data){
        $this->db->where('id_siswa',$data['id_siswa']);
        $this->db->update('siswa',$data);
    }

    public function ambil_siswa_ii(){
		$query=$this->db->query("SELECT * from siswa  where kelas = 'II'");
		return $query;
	}

	 public function ambil_siswa_iii(){
		$query=$this->db->query("SELECT * from siswa  where kelas = 'III'");
		return $query;
	}

	public function ambil_artikel(){
		$query=$this->db->query("SELECT * from artikel");
		return $query;
	}

	public function edit_artikel($where= "") {
		$data = $this->db->query('SELECT * FROM artikel '.$where);
		return $data;
	}

	public function update_artikel($data){
        $this->db->where('id_artikel',$data['id_artikel']);
        $this->db->update('artikel',$data);
    }

    public function ambil_profil(){
		$query=$this->db->query("SELECT * from profil");
		return $query;
	}

	public function edit_profil($where= "") {
		$data = $this->db->query('SELECT * FROM profil '.$where);
		return $data;
	}

	public function update_profil($data){
        $this->db->where('id_profil',$data['id_profil']);
        $this->db->update('profil',$data);
    }

}