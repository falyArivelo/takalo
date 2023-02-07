<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BaseController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('id')) {
            $this->load->view('pages/accueil');
        } else {
            $this->load->view('pages/login');
        }
    }

    public function index()
    {
        $this->load->view('pages/login');
    }
}
