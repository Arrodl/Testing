<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH.'/libraries/REST_Controller.php');

class user extends REST_Controller {


	private $limit = 10;

	public function __construct(){
		parent::__construct();		
		/*if(!isset($_SESSION['email']))
		{
			$this->login_get(); 
		}*/

        //Cargamos las librerias necesarias
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->load->library('session');
		//$this->load->library('pagination');
		

	}

	public function log_out_get()
	{
		session_destroy();
	}
	
	public function index_get()
	{
		//$this->load->view('headerNav'); 
		//$this->load->view('nuevoEmpleado'); 
		//$data = "datos"; 
		//$this->response($data);

		$this->main_get(); 
	}

	public function view_user_get()
	{		
		$this->load->view('header'); 
		$this->load->view('view_user'); 
	}

	public function login_get()
	{			
		$this->load->view('header'); 
		$this->load->view('login'); 
	}

	public function register_get()
	{		
		$this->load->view('header'); 
		$this->load->view('register'); 
	}

	public function main_get()
	{
		$this->load->view('header'); 
		$this->load->view('main'); 
	}

	public function update_post()
	{
		$param['email']=$this->input->post("email",TRUE);
        $param['password']=$this->input->post("password",TRUE);
        $param['names']=$this->input->post("names",TRUE);
        $param['user_first_surname']=$this->input->post("user_first_surname",TRUE);
        $param['user_second_surname']=$this->input->post("user_second_surname",TRUE);
        $param['status'] = "0";				

		/*echo $param['email'] . "<br>"; 
        echo $param['password'] . "<br>"; 
        echo $param['names'] . "<br>"; 
        echo $param['user_first_surname'] . "<br>"; 
        echo $param['user_second_surname'] . "<br>"; 
        echo $param['status'] . "<br>"; 
        */
		if($this->user_model->update($param))
			$this->response("1");
		else
			$this->response("0");
	}
	public function validate_login_get()
	{

		$mail = $_GET['email']; 
		$pass = $_GET['password']; 
		$param = $this->user_model->validate_login($mail, $pass); 
		$this->response($this->json_response($message = "Usuario creado.", $code = 200, $param)); 
		
		//$this->response($variable);
	}

	public function create_get()
	{  
		$param['email']=$this->input->get("email",TRUE);
        $param['password']=$this->input->get("password",TRUE);
        $param['names']=$this->input->get("names",TRUE);
        $param['user_first_surname']=$this->input->get("user_first_surname",TRUE);
        $param['user_second_surname']=$this->input->get("user_second_surname",TRUE);
        $param['status'] = "0";
        $param['found'] = "1";
        $param['id_user'] = "_";

        $this->user_model->insert($param);

        $this->response($this->json_response($message = "Usuario creado.", $code = 200, $param)); 
        //Enviamos el correo
        $this->send_mail($param['email']); 		
		//$this->response($variable);
	}	

	public function send_mail($mail)
	{
		$to = $mail ;
		$subject = "Confirmación HeroGuest"; 
		$mensaje = 'Bienvenido a <b>HeroGuest</b><br>Da click aquí para activar tu cuenta <br>';  		
		$hash = md5($mail); 
		$hashFinal = substr($hash, 0, 10);
		$mensaje .= 'http://localhost/heroGuest/complete_register?value='.$hashFinal; 
		$headers = "From: HeroGuest\r\n";; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";	


		
		mail($to,$subject,$mensaje,$headers);
		echo $hashFinal; 
		//echo $to . " \n" . $subject . " \n" . $mensaje . " \n" . $headers; 
		//header("Location: http://localhost/heroGuest/user", true, 301);
	}

	public function cerrar_sesion()
	{
        $this->session->unset_userdata('id_user'); 
        $this->session->unset_userdata('user_name'); 
        $this->session->unset_userdata('email'); 
        $this->session->unset_userdata('password'); 
        $this->session->unset_userdata('names'); 
        $this->session->unset_userdata('user_first_surname'); 
        $this->session->unset_userdata('user_second_surname'); 
        $this->session->unset_userdata('status'); 
		
		unset_userdata(); 
		$this->load->view('header'); 
		$this->load->view('view_user'); 
	}	

	public function complete_register_get()
	{
		$hashMail =$this->input->get("value",TRUE);
		if($this->user_model->activate_user($hashMail)>0)
			echo "Cambio realizado";		
		//$this->response($jason);
		else
			echo "No se activó"; 
			
	}	

	public function nuevo()
	{
//		$this->load->view('headerNav'); 
		//$this->load->view('nuevoEmpleado'); 



		$param['nombre']=$this->input->post("nombre",TRUE);
        $param['apellidoPaterno']=$this->input->post("apellidoPaterno",TRUE);
        $param['apellidoMaterno']=$this->input->post("apellidoMaterno",TRUE);
        $param['fechaDeNacimiento']=$this->input->post("fechaDeNacimiento",TRUE);
        $param['ingresosAnuales']=$this->input->post("ingresosAnuales",TRUE);
        

            //validate
        //Setting the messages


        $this->form_validation->set_rules('nombre', 'nombre','trim|required', array('required'=>'Llena este campo'));
        $this->form_validation->set_rules('apellidoPaterno', 'apellidoPaterno','trim|required', array('required'=>'Por favor colca un número decimal'));
        $this->form_validation->set_rules('apellidoMaterno', 'apellidoMaterno','trim|required', array('required'=>'Llena este campo'));
        $this->form_validation->set_rules('fechaDeNacimiento', 'fechaDeNacimiento','trim|required', array('required'=>'Llena este campo'));
        $this->form_validation->set_rules('ingresosAnuales', 'ingresosAnuales','trim|required|numeric', array('required'=>'Llena este campo'));
                

        if($this->form_validation->run() !=false){
        	$this->empleado_model->insert($param);
            redirect('empleado/registerExitoso', 'refresh');
        }else{
            $this->load->view('headerNav'); 
            $this->load->view('nuevoEmpleado');             	
        }


	}

	public function registerExitoso(){
		$this->load->view('headerNav'); 
		$this->load->view('registerExitoso'); 

	}

	public function ajaxSearch()
	{

		$this->load->view('headerNav'); 
		$this->load->view('ajaxSearch'); 

	}
	public function ajaxSearchSubmit() 
	{
	/*	$data = array(
		'nombre' => $this->input->post('name'),
		'apellidoPaterno'=>$this->input->post('pwd')
		);*/

		$idEmpleadoRecibido = $this->input->post('idEmpleado'); 

		

		$data['idEmpleado']=$idEmpleadoRecibido;
		$result = $this->empleado_model->view($data);


		

		$data =array('nombre'=>$result['nombre'],
			'apellidoPaterno'=>$result['apellidoPaterno'],
			'apellidoMaterno'=>$result['apellidoMaterno'],
			'fechaDeNacimiento'=>$result['fechaDeNacimiento'],
			'ingresosAnuales'=>$result['ingresosAnuales']
			);

		//Either you can print value or you can send value to database
		echo json_encode($data);
	}
	


	public function lista()
	{		
		$userlist =$this->empleado_model->index($this->limit);
        $total_rows=$this->empleado_model->count();

        $config['total_rows']=$total_rows;
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $config['base_url']=site_url("empleado/lista");

        $this->pagination->initialize($config);
        $page_link =$this->pagination->create_links();

        $this->load->view('headerNav'); 
        $this->load->view('listaDeEmpleados',compact('userlist', 'page_link') );
	}

	function search(){
            $key="";
            if ($this->input->post("key",TRUE)) {
                $key =$this->input->post("key",TRUE);
                $this->session->set_userdata('key', $key);
            }elseif ($this->session->userdata('key')) {
                $key =$this->session->userdata('key');
            }
           	
            if(!empty($key)){
                $userlist =$this->empleado_model->search($this->limit, $key);
		        $total_rows=$this->empleado_model->count_search($key);

		        $config['total_rows']=$total_rows;
		        $config['per_page']=$this->limit;
		        $config['uri_segment']=3;
		        $config['base_url']=site_url("empleado/search");

		       
		        $this->pagination->initialize($config);

		        $page_link =$this->pagination->create_links();
                $this->load->view('headerNav'); 
		        $this->load->view('listaDeEmpleados',compact('userlist', 'page_link') );
            }else{
            	$this->index();
            }

        }
        function json_response($message = null, $code = 200, $userInfo) {
        // clear the old headers
        header_remove();
        // set the actual code
        http_response_code($code);
        // set the header to make sure cache is forced
        header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
        // treat this as json
        header('Content-Type: application/json');
        $status = array(
            200 => '200 OK',
            400 => '400 Bad Request',
            422 => 'Unprocessable Entity',
            500 => '500 Internal Server Error'
            );
        // ok, validation error, or failure
        header('Status: '.$status[$code]);
        // return the encoded json
        return json_encode(array(
            'email' => $userInfo['email'],
            'names' => $userInfo['names'],
            'user_first_surname' => $userInfo['user_first_surname'],
            'user_second_surname' => $userInfo['user_second_surname'],
            'status' => $userInfo['status'],
            'password' => $userInfo['password'],
            'found' => $userInfo['found'],
            'id_user' => $userInfo['id_user']
        ));
    }        



}