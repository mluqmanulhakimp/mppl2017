<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {

	public function getpeminjaman()
	{
	    $query =  $this->db->query("
	    	select l.loan_id as id, l.item_code as kode, s.item_id as id, m.member_name as nama, l.loan_date as peminjaman, l.due_date as tenggat, l.return_date as pengembalian
	    	from loan l, member m, stock_take_item s
	    	where l.member_id = m.member_id
	    	and s.item_code = l.item_code
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
		$query =  $this->db->query("
			SELECT l.loan_id AS id, l.item_code AS kode, s.item_id as id, m.member_name AS nama, l.loan_date AS peminjaman, l.due_date AS tenggat, l.return_date AS pengembalian
	    	FROM loan l, member m, stock_take_item s
	    	WHERE l.member_id = m.member_id
	    	and s.item_code = l.item_code
	    	AND m.member_name LIKE '%".$keyword."%'
	    	ORDER BY peminjaman DESC
	    ");
		return $query->result_array();
	}

	public function searchbuku($cari){
		$query =  $this->db->query("
			SELECT *
			FROM stock_take_item
			WHERE title LIKE '%".$cari."%'
			
	    ");
		return $query->result_array();
	}
}