<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    private $table = "lu_users";
    private $_data = array();

    public function __construct () {
        parent:: __construct();
    }

    function index($limit) {
        $offset = $this->uri->segment(3);
        if ($offset == "") {
            $offset = "0";
        }
        $stringTemporal = "SELECT lu_users.email,
                                           password,
                                           names, 
                                           user_first_surname, 
                                           user_second_surname,
                                           status
                            FROM `lu_users`
                            limit $offset, $limit;";
        return $this->db->query($stringTemporal);
    }

    function count() {
        return $this->db->count_all_result($this->table);
    }

    function validate_login($email, $pass)
    {


            $param['id_user']= "";             
            $param['email']= ""; 
            $param['names']= ""; 
            $param['user_first_surname']= ""; 
            $param['user_second_surname']= ""; 
            $param['status']= ""; 
            $param['found']= "0";

        $selectQuery = "SELECT * FROM lu_users where email='" . $email . "' and password='" . md5($pass) . "'"; 

        $selectQueryResult = $this->db->query($selectQuery); 

        if($selectQueryResult -> num_rows() > 0) {    
            $row = $selectQueryResult->row(0);         
            $param['id_user']= $row->id_user;
            $param['user_name']= $row->user_name;
            $param['email']= $row->email;
            $param['password']= $row->password;
            $param['names']= $row->names;
            $param['user_first_surname']= $row->user_first_surname;
            $param['user_second_surname']= $row->user_second_surname;
            $param['status']= $row->status;           
            $param['found']= "1";           


            $this->session->set_userdata('id_user', $param['id_user']);         
            $this->session->set_userdata('email', $param['email']);         
            $this->session->set_userdata('names', $param['names']); 
            $this->session->set_userdata('user_first_surname', $param['user_first_surname']); 
            $this->session->set_userdata('user_second_surname', $param['user_second_surname']); 
            $this->session->set_userdata('status', $param['status']);  
            $this->session->set_userdata('found', "1");  
        } 

        return $param; 

    }    

    function insert($param) {        

        $query = "INSERT into lu_users (`email`,
                                        `password`,
                                        `names`,
                                        `user_first_surname`,
                                        `user_second_surname`,
                                        `status`)"
                . "VALUES "
                . "(\"" . $param['email'] . "\", "
                . "\"" . md5($param['password']) . "\", "
                . "\"" . $param['names'] . "\", "
                . "\"" . $param['user_first_surname'] . "\", "
                . "\"" . $param['user_second_surname'] . "\", "
                . "\"" . $param['status'] . "\")";

        $succesful = $this->db->query($query);
        if ($succesful) {
            return true;
        } else {
            return false;
        }
    }

    function activate_user($hashMail)
    {
        $updateQuery = "update lu_users a , 
        (select id_user from lu_users where substring(md5(email), 1, 10)='" . $hashMail . "') as b
        set a.`status`=1 where a.id_user=b.id_user;"; 
        //Ejecutamos el update. 
        $this->db->query($updateQuery); 
        $selectQuery = "select id_user from lu_users where substring(md5(email), 1, 10)='" . $hashMail . "'"; 

        $selectQueryResult = $this->db->query($selectQuery); 

        return $selectQueryResult->num_rows(); 
    }



    function update($param)
    {        
        /*

        $updateQuery = "update lu_users 
        set             
            password='" . md5($param['password']) . "',
            names='" . $param['names'] . "',
            user_first_surname='" . $param['user_first_surname'] . "',
            user_second_surname='" . $param['user_second_surname'] . "',
            status='1'
            where email='" . $param['email'] ."'"; 
            echo $updateQuery; */

        $param['password'] = md5($param['password']); 
        //Ejecutamos el update. 
        return $this->db->update("lu_users", $param, array('email' => $param['email']));         
        
        
    }
    

    function login($email, $password) {
        $this -> db -> select('id, email, password');
        $this -> db -> from('t_users');
        $this -> db -> where('email', $email);
        $this -> db -> where('password', $password);
        $this -> db -> limit(1);
             
        $query = $this -> db -> get();
             
        if($query -> num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }   
}