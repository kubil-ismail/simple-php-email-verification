<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{
    /**
     * Default controller
     *
     */

    var $API = "";

    public function __construct()
    {
        parent::__construct();

        $this->API = getenv('APP_REST_URL');
    }


    //  Index Page
    public function index()
    {
        // Use notif
        notif('success','Welcome to kubicode', 'This is the message from Home/index');
        
        // Data for send to view
        $data['title'] = 'Home | Kubi Code';
        
        // Load view
        $this->load->view('layouts/header',$data);
        $this->load->view('home/index');
        $this->load->view('layouts/footer');
    }

    // Display Table
    public function send()
    {
        // Konfigurasi PHP
        ini_set("SMTP", "ssl://smtp.gmail.com");
        ini_set("smtp_port", "465");
        
        // Kode unik
        $kode = uniqid();
        // Pesan
        $msg = "Hai " . $this->input->post('email') . " Ini adalah kode verifikasi kamu, " .$kode." Kamu bisa klik disini , ".base_url('verif/').$kode;
        $msg = wordwrap($msg, 70);
        // Kirim Email
        if(mail($this->input->post('email'), "Verifikasi Email", $msg)){
            $data = array(
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'code'     => $kode,
                'status'   => 0
            );

            $this->db->insert('user', $data);
        }
        // Notifikasi
        notif('success', 'Email sukses dikirim', 'berhasil di kirim, silahkan cek email anda','/');
    }

    // Verif
    public function verif($kode) {
        $query = $this->db->get_where('user', array('code' => $kode, 'status' => 0));
        if($query->num_rows() === 1) {
            // Set account active
            $data = array(
                'status' => 1            
            );
            $this->db->where('id', $query->row()->id);
            $this->db->update('user', $data);

            // Notifikasi
            notif('success', 'Akun anda sudah aktif', 'akun anda aktif terimakasih');
            echo "Hai ". $query->row()->email. " Terimakasih telah menggunakan web kami";
        } else {
            // Notifikasi
            notif('error', 'Akun tidak dapat di temukan', 'akun anda tidak tersedia');
        }
        
    }

    // 404 Not Found
    public function page_not_found()
    {
        $this->load->view('errors/404');
    }
    
}
