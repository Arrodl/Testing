<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empleado extends CI_Controller {

	private $limit = 10;

	public function __construct(){
		parent::__construct();
        //Cargamos las librerias necesarias
		$this->load->model('empleado_model');
		$this->load->library('pagination');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$this->load->view('headerNav'); 
		$this->load->view('nuevoEmpleado'); 
	}  

	public function registro()
	{
		$this->load->view('headerNav'); 
		$this->load->view('registro'); 
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
            redirect('empleado/registroExitoso', 'refresh');
        }else{
            $this->load->view('headerNav'); 
            $this->load->view('nuevoEmpleado');             	
        }


	}

	public function registroExitoso(){
		$this->load->view('headerNav'); 
		$this->load->view('registroExitoso'); 

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

}