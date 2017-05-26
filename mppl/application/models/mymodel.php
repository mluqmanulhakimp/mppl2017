<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

	public function getpeminjaman()
	{
	    	// select p.id_peminjaman as id_peminjaman, b.id_buku as idbuku,p.id_peminjam as nrp, m.nama as nama, b.judul as judul, p.edisi as edisi, p.tanggal_peminjaman as tanggal
	    	// from peminjaman p, mahasiswa m, buku b
	    	// where p.tanggal_pengembalian IS NULL
	    	// and p.id_buku_pinjam = b.id_buku
	    	// and p.id_peminjam = m.nrp
	    	// order by p.tanggal_peminjaman 
	    $query =  $this->db->query("
	    	select l.loan_id as id, l.item_code as kode, m.member_name as nama, l.loan_date as peminjaman, l.due_date as tenggat, l.return_date as pengembalian
	    	from loan l, member m
	    	where l.member_id = m.member_id
	    	order by peminjaman desc
	    	limit 0,100
	    ");
	    return $query->result_array();
	}

	public function data($number,$offset){
		return $query = $this->db->get('user',$number,$offset)->result();		
	}
 
	public function jumlah_data(){
		return $this->db->get('user')->num_rows();
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

	public function getdetailbuku($where){
		$query = $this->db->query($where);
	    return $query->result_array();
	}

	public function getdatabuku($config){  
        $hasilquery=$this->db->get('stock_take_item', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	public function insertdata($tabelName,$data_insert){
		$cek = $this->db->insert($tabelName, $data_insert);
		return $cek;
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

	public function deletedata($tabelName,$where){
		$cek = $this->db->delete($tabelName,$where);
		return $cek;
	}

	public function konfirmasipengembalian($data,$id){
		$this->db->get('loan');
		$this->db->where('loan_id',$id);
		$cek = $this->db->update('loan',$data);
		return $cek;
	}

	public function searchpeminjaman($keyword){
	    	// select p.id_peminjaman as id_peminjaman, b.id_buku as idbuku,p.id_peminjam as nrp, m.nama as nama, b.judul as judul, p.edisi as edisi, p.tanggal_peminjaman as tanggal
	    	// from peminjaman p, mahasiswa m, buku b
	    	// where (p.tanggal_pengembalian IS NULL
	    	// 	   	and p.id_buku_pinjam = b.id_buku
	    	// 	   	and p.id_peminjam = m.nrp)
	    	// 	   and
	    	// 	   (b.id_buku like "$cari"
	    	// 	    or p.id_peminjam like "$cari"
	    	// 	    or m.nama like "$cari")
	    	// order by p.tanggal_peminjaman
		$query =  $this->db->query("
			select l.loan_id as id, l.item_code as kode, m.member_name as nama, l.loan_date as peminjaman, l.due_date as tenggat, l.return_date as pengembalian
	    	from loan l, member m
	    	where l.member_id = m.member_id
	    	and m.member_name = '$keyword'
	    ");
		return $query->result();
	    // $query = $this->db->loan('data',$keyword)->row();
	    // return $query;
	}

	function search($keyword){
	}
}