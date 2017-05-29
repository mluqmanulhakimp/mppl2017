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

	// public function home(){
	// 	$this->load->view('home', array('data' => $data));
	// }

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

	public function admindatabukupage(){
        $config['base_url']=base_url()."index.php/ctr/admindatabukupage";
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
        $this->load->view('admin_data_buku', $data);
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

	public function search_peminjaman(){
	    $keyword = $this->input->get('cari');
	    $data = $this->mymodel->searchpeminjaman($keyword);
	    $this->load->view('homesearch', array('data' => $data));
	}

	public function search_buku(){
		$cari = $this->input->get('cari');
		// echo $cari;
		$search = $this->mymodel->searchbuku($cari);
		$this->load->view('data_bukusearch', array('data' => $search));
	}

	public function grafikpeminjaman(){
		$data = $this->mymodel->getdetailbuku("
	    	select kode, judul, count(judul) AS total
			from (select a.item_code as kode, b.title as judul FROM loan a, stock_take_item b WHERE a.item_code=b.item_code) as peminjaman
			group by judul
			order by total desc
			limit 0,15
	    ");
		$this->load->view('grafik_peminjaman', array('data' => $data));
	}
}