<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtividadeController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('AtividadeModel');
		$this->load->model('StatusModel');
	}

	public function index()
	{
		$dados['atividades'] = $this->AtividadeModel->getAll();
		$dados['estados'] = $this->StatusModel->getAll();

		$this->load->view('lista', $dados);
	}

	public function lista(){
		$retorno = [];
		$retorno['status'] = 'error';
		$retorno['message'] = 'Erro desconhecido';
		$retorno['data'] = [];

		$status   = isset($_GET['status']) ? $_GET['status'] : null;
		$situacao = isset($_GET['situacao']) ? $_GET['situacao'] : null;

		if (!$status && !$situacao) {
			$retorno['status'] = 'ok';
			$retorno['message'] = 'Tudo Ok!';
			$retorno['data'] = $this->AtividadeModel->getAll();
			return $this->toJson($retorno);
		}

		return $this->toJson($retorno);
	}

	public function toJson($data){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}