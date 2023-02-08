<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authentification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('connected')) {
            redirect('Home/objets');
        } else {
            $this->load->view('pages/login');
        }
    }

    public function login()
    {
        $this->load->model("Authentification_model");

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()  == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Authentification/index');

        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $session = $this->Authentification_model->valid_login($email, $password);
            if (count($session) > 0) {
                $sess_array = array(
                    'idMembre' => $session[0]->idMembre,
                    'email' => $session[0]->email,
                    'isAdmin' => $session[0]->isAdmin
                );

                $this->session->set_userdata('connected', $sess_array);
                
                if ($sess_array['isAdmin'] == 1) {
                    redirect('Administrateur/objets');
                }
                redirect('Authentification/secure');
                
            } else {
                $this->session->set_flashdata('error', 'something went wrong');
                redirect('Authentification/index');

            }
        }
        

    }


    public function secure()
    {
        if ($this->session->userdata('connected')) {
            redirect('Home/objets');
        } else {
            redirect('Authentification/login');
        }
    }
    public function deconnexion()
    {
        $this->session->sess_destroy();
        redirect('Authentification/index');
        // redirect(base_url('pages/login'));

    }

    // insertion

    public function inscription()
    {
        $this->load->view('pages/inscription');
    }

    public function insertMembre()
    {
        $this->load->model('Authentification_model');

        $name = $this->input->post('email');
        $pass = $this->input->post('password');
        $data = array('email' => $name, 'motDePasse' => $pass, 'isAdmin' => 0);

        $message = $this->Authentification_model->inscrire($data);
        echo $message;
    }
}
