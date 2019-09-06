<?php
    /**
     * Created by PhpStorm.
     * User: Alejandro Saa Garcia
     * Date: 5/09/2019
     * Time: 10:00 PM
     */

    class Model_register extends CI_Model
    {
        protected $table = 'registros';
        /**
         * Model_register constructor.
         */
        public function __construct() {
            parent::__construct();
        }

        public function getRegistered() {
            $query = $this->db->get($this->table);

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return null;
            }
        }

        public function save_register() {
            $data = $this->input->post();

            array_splice($data, -1);

            extract($data);

            $fields = ['name' => $name, 'email' => $email, 'mobile_phone' => $mobile_phone, 'reason' => $reason, 'comment' => $comment];

            $this->db->insert($this->table, $fields);
            $numInsert = $this->db->affected_rows();

            return $numInsert > 0;
        }

        public function delete_register() {
            $data = $this->input->post();

            array_splice($data, -1);

            extract($data);

            $this->db->where('id', $id_register);
            $this->db->delete($this->table);

            $numAffected = $this->db->affected_rows();

            return $numAffected > 0;
        }
    }