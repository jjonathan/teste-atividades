<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtividadeController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AtividadeModel');
	}

	public function index()
	{
		$atividades = $this->AtividadeModel->getAll();

		$dados['atividades'] = $atividades;

		$this->load->view('lista', $dados);
	}

	public function toObj($arr){
		$object = new stdClass();
		foreach ($array as $key => $value)
		{
		    $object->$key = $value;
		}
		return $object;
	}
}