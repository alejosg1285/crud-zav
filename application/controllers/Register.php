<?php
    /**
     * Created by PhpStorm.
     * User: Alejandro Saa Garcia
     * Date: 5/09/2019
     * Time: 8:02 PM
     */

    class Register extends CI_Controller
    {
        /**
         * Register constructor.
         */
        public function __construct() {
            parent::__construct();

            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->library('table');
            $this->load->model('Model_register');
        }

        protected function validationRules() {
            $this->form_validation->set_rules('name', 'Nombre', 'trim|required', ['required' => 'El {field} es obligatorio']);
            $this->form_validation->set_rules('email', 'Correo', 'trim|valid_email|required', ['required' => 'El {field} es obligatorio', 'valid_email' => 'El {field} no es valido']);
            $this->form_validation->set_rules('mobile_phone', 'Celular', 'trim|numeric|required', ['required' => 'El {field} es requerido', 'numeric' => 'El {field} permite solo numeros']);
            $this->form_validation->set_rules('reason', 'Motivo de visita', 'required|callback_validar_select');
        }

        public function validar_select($value)
        {
            if(strcmp($value, '') === 0) {
                $this->form_validation->set_message('validar_select', 'Por favor seleccione una opci&aocute;n valida.');

                return false;
            }
            else {
                return true;
            }
        }

        public function index() {
            $data['title'] = 'Registros';
            $data['data'] = json_encode($this->Model_register->getRegistered());

            //echo $this->table->generate($data);
            $this->load->view('view_list', $data);
        }

        public function add() {
            $data['title'] = 'Nuevo Registro';

            $this->load->view('view_new', $data);
        }

        public function save() {
            if ($this->input->post()) {
                $this->validationRules();

                $data = $this->input->post();

                if ($this->form_validation->run()) {
                    $added = $this->Model_register->save_register();

                    if ($added) {
                        redirect('register', 'refresh');
                    } else {
                        echo '<div class="card-panel red lighten-1">This is a card panel with a teal lighten-2 class</div>';
                    }
                } else {
                    $data['title'] = 'Nuevo Registro';

                    $this->load->view('view_new', $data);
                }
            }
        }

        public function delete() {
            if ($this->input->post()) {
                $deleted = $this->Model_register->delete_register();

                if ($deleted) {
                    redirect('register', 'refresh');
                } else {
                    echo '<div class="card-panel red lighten-1">Se ha presentado un error al eliminar el registro</div>';
                }
            }
        }
    }