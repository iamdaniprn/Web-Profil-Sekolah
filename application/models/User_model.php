<?php 
 
class User_model extends CI_Model{	

	function ambil_artikel(){
        $sql1 = "select * FROM artikel order by id_artikel desc limit 4";
        $cari = $this->db->query($sql1);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_artikel[]=$baris;
            }
            return $hasil_artikel;
        }
    }

    function ambil_galeri(){
        $sql2 = "select * FROM galeri";
        $dapat = $this->db->query($sql2);
        if($dapat->num_rows()>0)
        {
	        foreach ($dapat->result() as $barishasil)
	        {
	           $hasil_galeri[]=$barishasil;
	        }  
	        return $hasil_galeri;  
        }
    }

    function ambil_kelas_1(){
		$query=$this->db->query("SELECT * from siswa where kelas = 'I';");
		return $query;
	}

	function ambil_kelas_2(){
		$query=$this->db->query("SELECT * from siswa where kelas = 'II';");
		return $query;
	}

	function ambil_kelas_3(){
		$query=$this->db->query("SELECT * from siswa where kelas = 'III';");
		return $query;
	}

	function ambil_guru(){
		$query=$this->db->query("SELECT guru.*, mapel.`nama` as nama_mapel FROM guru JOIN mapel ON guru.`id_mapel` = mapel.`id_mapel`");
		return $query;
	}

	function ambil_profil(){
        $sql1 = "select * FROM profil";
        $cari = $this->db->query($sql1);
        if($cari->num_rows()>0)
        {
            foreach($cari->result() as $baris)
            {
                $hasil_profil[]=$baris;
            }
            return $hasil_profil;
        }
    }

    function cari_artikel($where= "") {
        $data = $this->db->query('SELECT * From artikel '.$where);
        return $data->result();
    }
}