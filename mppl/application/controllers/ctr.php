<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr extends CI_Controller {
	public function __construct(){
        parent::__construct();
        // konfigurasi helper & library
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->database();
    }

	public function index(){
	    $data = $this->mymodel->getpeminjaman();   
		$this->load->view('home', array('data' => $data));
		// $this->load->view('form_login');
	}

	public function home(){
		$this->load->view('home', array('data' => $data));
	}

	public function databukupage(){
        $config['base_url']=base_url()."index.php/ctr/databukupage";
            $config['total_rows']= $this->db->query("
            	SELECT item_id, title, item_code
				FROM stock_take_item")->num_rows();
            $config['per_page']=10;
        	$config['num_links'] = 6;
            $config['uri_segment']=3;

        $config['num_tag_open'] = '&nbsp&nbsp';
        $config['num_tag_close'] = '&nbsp&nbsp';
        $config['cur_tag_open'] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
        $config['cur_tag_close'] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
        // $config['next_tag_open'] = "<li>";
        // $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "&nbsp&nbsp&nbsp";
        // $config['prev_tagl_close'] = "</li>";
        // $config['first_tag_open'] = "<li>";
        // $config['first_tagl_close'] = "&nbsp</li>";
        $config['last_tag_open'] = "&nbsp&nbsp&nbsp";
        // $config['last_tagl_close'] = "</li>";

            $config['first_link']='<< first';
        $config['last_link']='last >>';
        $config['next_link']='next >';
        $config['prev_link']='< before';
            $this->pagination->initialize($config);
 
        // konfigurasi model dan view untuk menampilkan data
        $this->load->model('mymodel');
        $data['databuku']=$this->mymodel->getdatabuku($config);
        $this->load->view('data_buku', $data);
	}

	public function insert_data_buku(){
		$this->load->view('form_insert_data_buku');
	}

	public function detailbuku($itemid){
		$buku = $this->mymodel->getdetailbuku("
	    	select a.title as title, a.item_code as item_code, c.publish_year as publish_year, f.language_name as language_name, g.place_name as place_name, c.classification as classification, d.publisher_name as publisher_name, e.coll_type_name as jenis

	    	from stock_take_item a, item b, biblio c, mst_publisher d, mst_coll_type e, mst_language f, mst_place g

	    	where a.item_id = '$itemid'
	    		and a.item_id = b.item_id
		    	and b.biblio_id = c.biblio_id
		    	and c.publisher_id = d.publisher_id
		    	and b.coll_type_id = e.coll_type_id
		    	and c.language_id = f.language_id
		    	and c.publish_place_id = g.place_id
	    ");
	    $data = array(
	    	"judul" => $buku[0]['title'],
	    	"kode" => $buku[0]['item_code'],
	    	"tahun" => $buku[0]['publish_year'],
	    	"bahasa" => $buku[0]['language_name'],
	    	"tempat" => $buku[0]['place_name'],
	    	"klasifikasi" => $buku[0]['classification'],
	    	"penerbit" => $buku[0]['publisher_name'],
	    	"jenis" => $buku[0]['jenis']
	    );
		$this->load->view('detail_buku', array('data' => $data));
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
			'loan_id' => $id_peminjaman
		);
		$cek = $this->mymodel->deletedata('loan',$where);
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

	public function search_buku(){
		$cari = $this->input->get('cari');
		// echo $cari;
		$search = $this->mymodel->searchpeminjaman($cari);
		$this->load->view('home', array('data' => $search));
	}
}