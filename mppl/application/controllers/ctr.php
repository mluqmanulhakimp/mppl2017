<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr extends CI_Controller {
	public function index(){
	    $data = $this->mymodel->getpeminjaman();   
		$this->load->view('home', array('data' => $data));
		// $this->load->view('form_login');
	}

	public function home(){
		$this->load->view('home', array('data' => $data));
	}

	public function databukupage(){
	    $data = $this->mymodel->getdatabuku('
	    	select b.id_buku as id, b.judul as judul, b.edisi as edisi, b.pengarang as pengarang, k.nama_kategori as kategori
	    	from buku b, kategori k
	    	where k.id_kategori = b.kategori
	    ');
		$this->load->view('data_buku', array('data' => $data));
	}

	public function insert_data_buku(){
		$this->load->view('form_insert_data_buku');
	}

	public function do_insert_buku(){
		$kategori = $this->mymodel->cekkategori($this->input->post('kategori'));
		$data_insert = array(
			'judul' => $this->input->post('judul'),
			'edisi' => $this->input->post('edisi'),
			'pengarang' => $this->input->post('pengarang'),
			'kategori' => $kategori,
		);
		if(($this->input->post('judul')) == '0'){
			$this->load->helper('url');
			redirect('/ctr/databukupage');
		}
		else{
			$cek = $this->mymodel->insertdata('buku',$data_insert);
			$this->load->helper('url');
			redirect('/ctr/databukupage');
		}
	}

	public function insert_data_peminjaman(){
		$this->load->view('form_insert_data_peminjaman');
	}

	public function do_insert_peminjaman(){
		$judul = $this->input->post('judul');
		$idbuku = $this->mymodel->cekidbuku($judul);
		if(is_null($idbuku)){
			echo "Judul buku tidak ditemukan!";
		}
		else{
			$id_peminjam = $this->input->post('nrp');
			$edisi = $this->input->post('edisi');
			$tanggal_peminjaman = $this->input->post('tanggal');
			$data_insert = array(
				'id_peminjam' => $id_peminjam,
				'id_buku_pinjam' => $idbuku,
				'edisi' => $edisi,
				'tanggal_peminjaman' => $tanggal_peminjaman
			);
			$this->mymodel->insertdata('peminjaman',$data_insert);
			$this->load->helper('url');
			redirect('/ctr/index');
		}
	}

	public function dikembalikan($id_peminjaman){
		$data = array('tanggal_pengembalian' => date("Y-m-d"));
		$cek = $this->mymodel->konfirmasipengembalian($data,$id_peminjaman);
		if($cek>=1){
			$this->load->helper('url');
			redirect('/ctr/index');
		}
	}

	public function delete_data($id_peminjaman){
		$where = array(
			'id_peminjaman' => $id_peminjaman
		);
		$cek = $this->mymodel->deletedata('peminjaman',$where);
		if($cek>=1){
			$this->load->helper('url');
			redirect('/ctr/index');
		}
	}

	public function delete_data_buku($id){
		$where = array(
			'id_buku' => $id
		);
		$cek = $this->mymodel->deletedata('buku',$where);
		if($cek>=1){
			$this->load->helper('url');
			redirect('/ctr/databukupage');
		}
	}

	public function edit_data_buku($idbuku){
		$buku = $this->mymodel->getdatabuku("
	    	select b.id_buku as id_buku, b.judul as judul, b.edisi as edisi, b.pengarang as pengarang, k.nama_kategori as kategori from buku b, kategori k where id_buku = '$idbuku' and b.kategori = k.id_kategori
	    ");
	    $data = array(
	    	"idbuku" => $buku[0]['id_buku'],
	    	"judul" => $buku[0]['judul'],
	    	"edisi" => $buku[0]['edisi'],
	    	"pengarang" => $buku[0]['pengarang'],
	    	"kategori" => $buku[0]['kategori'],
	    );
		$this->load->view('form_edit_data_buku', array('data' => $data));
	}

	public function do_edit_data_buku($idbuku){
		$namakategori = $this->input->post('kategori');
		$kategori = $this->mymodel->cekkategori($namakategori);
		// echo $kategori;
		if(is_null($kategori)){
			echo "Kategori yang anda cari tidak ditemukan!";
		}
		else{
			$judul = $this->input->post('judul');
			$edisi = $this->input->post('edisi');
			$pengarang = $this->input->post('pengarang');
			$data_insert = array(
				'judul' => $judul,
				'edisi' => $edisi,
				'pengarang' => $pengarang,
				'kategori' => $kategori
			);
			$this->mymodel->editdata('buku', $data_insert, $idbuku);
			$this->load->helper('url');
			redirect('/ctr/databukupage');
		}
	}

	public function search_peminjaman(){
		$cari = $this->input->get('cari');
		// echo $cari;
		$search = $this->mymodel->searchpeminjaman($cari);
		$this->load->view('home', array('data' => $search));
	}
}