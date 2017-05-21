<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	public function getpeminjaman()
	{
	    $query =  $this->db->query('
	    	select p.id_peminjaman as id_peminjaman, b.id_buku as idbuku,p.id_peminjam as nrp, m.nama as nama, b.judul as judul, p.edisi as edisi, p.tanggal_peminjaman as tanggal
	    	from peminjaman p, mahasiswa m, buku b
	    	where p.tanggal_pengembalian IS NULL
	    	and p.id_buku_pinjam = b.id_buku
	    	and p.id_peminjam = m.nrp
	    	order by p.tanggal_peminjaman 
	    ');
	    return $query->result_array();
	}

	public function cekidbuku($judul){
		$this->db->select('id_buku')->from('buku')->where('judul', $judul);
		$query = $this->db->get();

		if(is_null($query)){
			$query = NULL;
			return $query;
		}
	    else{
	        return $query->row()->id_buku;
			return false;
	    }
	}

	public function insertdata($tabelName,$data_insert){
		$cek = $this->db->insert($tabelName, $data_insert);
		return $cek;
	}

	public function konfirmasipengembalian($data,$id_peminjaman){
		$this->db->get('peminjaman');
		$this->db->where('id_peminjaman',$id_peminjaman);
		$cek = $this->db->update('peminjaman',$data);
		return $cek;
	}

	public function deletedata($tabelName,$where){
		$cek = $this->db->delete($tabelName,$where);
		return $cek;
	}

	public function getdatabuku($where){
		$query = $this->db->query($where);
	    return $query->result_array();
	}

	public function cekkategori($namakategori){
		$this->db->select('id_kategori')->from('kategori')->where('nama_kategori', $namakategori);
		$query = $this->db->get();

		if(is_null($query->row()->id_kategori)){
			$query = NULL;
			return $query;
		}
	    else{
	        return $query->row()->id_kategori;
			return false;
	    }
	}

	public function editdata($tabelName,$data_insert,$idbuku){
		$this->db->where('id_buku', $idbuku);
        $cek = $this->db->update($tabelName, $data_insert);
        return $cek;
	}

	public function searchpeminjaman($cari){
		$query =  $this->db->query('
	    	select p.id_peminjaman as id_peminjaman, b.id_buku as idbuku,p.id_peminjam as nrp, m.nama as nama, b.judul as judul, p.edisi as edisi, p.tanggal_peminjaman as tanggal
	    	from peminjaman p, mahasiswa m, buku b
	    	where (p.tanggal_pengembalian IS NULL
	    		   	and p.id_buku_pinjam = b.id_buku
	    		   	and p.id_peminjam = m.nrp)
	    		   and
	    		   (b.id_buku like "$cari"
	    		    or p.id_peminjam like "$cari"
	    		    or m.nama like "$cari")
	    	order by p.tanggal_peminjaman
	    ');
		return $query->result();
	}
}