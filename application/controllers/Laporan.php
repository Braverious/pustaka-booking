<?php
defined('BASEPATH') or exit('No Direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Load necessary models and libraries here
        $this->load->model('ModelUser');
        $this->load->model('ModelBuku');
    }

    public function laporan_buku()
    {
        $data['judul'] = 'Laporan Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('buku/laporan_buku', $data);
        $this->load->view('template/footer');
    }

    public function cetak_laporan_buku()
    {
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

        $this->load->view('buku/laporan_print_buku', $data);
    }

    public function laporan_buku_pdf()
    {
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        // $this->load->library('dompdf_gen');
        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/pustaka-booking/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();
        $this->load->view('buku/laporan_pdf_buku', $data);

        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; // tipe format kertas potrait atau landscape
        $html = $this->output->get_output();
        $dompdf->set_paper($paper_size, $orientation);

        // Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_buku.pdf", array('Attachment' => 0));
        // nama file pdf yang dihasilkan
    }

    public function export_excel()
    {
        $data = array(
            'title' => 'Laporan Buku',
            'buku' => $this->ModelBuku->getBuku()->result_array()
        );
        $this->load->view('buku/export_excel_buku', $data);
    }

    public function laporan_Anggota()
    {
        $data['judul'] = 'Laporan Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->cekData()->result_array();

        // Load views
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('anggota/laporan_anggota', $data);
        $this->load->view('template/footer');
    }

	public function cetak_laporan_anggota()
    {
        $data['anggota'] = $this->ModelUser->cekData()->result_array();

        // Load view for printing
        $this->load->view('anggota/laporan_print_anggota', $data);
    }

    public function laporan_anggota_pdf()
    {
        $data['anggota'] = $this->ModelUser->cekData()->result_array();

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/pustaka-booking/application/third_party/dompdf/autoload.inc.php";

        $dompdf = new Dompdf\Dompdf();

        $this->load->view('anggota/laporan_pdf_anggota', $data);

        $paper_size = 'A4'; 
        $orientation = 'landscape'; 
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan_data_anggota.pdf", array('Attachment' => 0));
    }

    public function export_excel_anggota()
    {
        $data = array(
            'title' => 'Laporan Anggota',
            'anggota' => $this->ModelUser->cekData()->result_array()
        );

        // Load view for Excel export
        $this->load->view('anggota/export_excel_anggota', $data);
    }
}

    public function laporan_pinjam()
    {
        $data['judul'] = 'Laporan Data Peminjaman';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['laporan'] = $this->db->query(
            "SELECT * FROM pinjam p, detail_pinjam d, buku b, user u
         WHERE d.id_buku = b.id AND p.id_user = u.id AND p.no_pinjam = d.no_pinjam"
        )->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('pinjam/laporan_pinjam', $data);
        $this->load->view('template/footer');
    }

    public function cetak_laporan_pinjam()
    {
        $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d,
        buku b,user u where d.id_buku=b.id and p.id_user=u.id
        and p.no_pinjam=d.no_pinjam")->result_array();
        $this->load->view('pinjam/laporan-print-pinjam', $data);
    }

    public function laporan_pinjam_pdf()
    {
        $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d, buku b,user u where d.id_buku=b.id and p.id_user=u.id and p.no_pinjam=d.no_pinjam")->result_array();
        // $this->load->library('dompdf_gen');

        $sroot = $_SERVER['DOCUMENT_ROOT'];
        include $sroot . "/pustaka-booking/application/third_party/dompdf/autoload.inc.php";
        $dompdf = new Dompdf\Dompdf();

        $this->load->view('pinjam/laporan_pinjam_pdf', $data);
        $paper_size = 'A4'; // ukuran kertas
        $orientation = 'landscape'; //tipe format kertas potrait atau landscape
        $html = $this->output->get_output();

        $dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("laporan data peminjaman.pdf", array('Attachment' => 0));
        // nama file pdf yang di hasilkan
    }

    public function export_excel_pinjam()
    {
        $data = array(
            'title' => 'Laporan Data Peminjaman Buku',
            'laporan' => $this->db->query("select * from pinjam p,detail_pinjam d,
 buku b,user u where d.id_buku=b.id and p.id_user=u.id

 
and p.no_pinjam=d.no_pinjam")->result_array()
        );
        $this->load->view('pinjam/export-excel-pinjam', $data);
    }
}
