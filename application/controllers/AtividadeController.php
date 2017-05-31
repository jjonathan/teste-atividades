<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AtividadeController extends CI_Controller {

	/**
	 * Método construtor
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('AtividadeModel');
		$this->load->model('StatusModel');
	}

	/**
	 * Método que retorna a lista de atividades
	 * @return void
	 */
	public function index()
	{
		$dados['atividades'] = $this->AtividadeModel->getAll();
		$dados['estados'] = $this->StatusModel->getAll();

		$this->load->view('lista', $dados);
	}

	/**
	 * Retorna a lista das atividades no formato json 
	 * @return toJson()
	 */
	public function lista(){
		$retorno = [];
		$retorno['status'] = 'error';
		$retorno['message'] = 'Erro desconhecido';
		$retorno['data'] = [];

		$status   = false;#isset($_GET['status']) ? $_GET['status'] : null;
		$situacao = false;#isset($_GET['situacao']) ? $_GET['situacao'] : null;

		if (!$status && !$situacao) {
			$retorno['status'] = 'ok';
			$retorno['message'] = 'Tudo Ok!';
			$atividades = $this->AtividadeModel->getAll();
			foreach ($atividades as $key => $atividade) {
				$retorno['data'][] = $this->formataAtividade($atividade);
			}
			return $this->toJson($retorno);
		}

		return $this->toJson($retorno);
	}

	/**
	 * Pega um array, converte para json e altera o header para json
	 * @param  array $data Array com qualquer item dentro
	 * @return json        Converte o array para json, e retorna.
	 */
	public function toJson($data){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}

	/**
	 * Formata a atividade para um padrão do datatables
	 * @param  AtividadeModel $atividade Objeto do AtividadeModel
	 * @return array                     Array com as informações necessárias para popular a lista de tarefas
	 */
	public function formataAtividade($atividade){
		$retorno = [];
		$retorno[] = $atividade->nome;
		$retorno[] = date('d-m-Y', strtotime($atividade->dt_inicio));
		$retorno[] = $atividade->dt_fim ? date('d-m-Y', strtotime($atividade->dt_fim)) : '';
		switch ($atividade->status_id) {
			case 1:
			$retorno[] = 'Pendente';
			break;
			case 2:
			$retorno[] = 'Em Desenvolvimento';
			break;
			case 3:
			$retorno[] = 'Em teste';
			break;
			default:
			$retorno[] = 'Concluída';
			break;
		}
		$retorno[] = $atividade->situacao ? 'Ativo' : 'Inativo';
		$retorno[] = '<a type="button" class="btn btn-sm btn-success" data-id="' . $atividade->id . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
		$retorno[] = '<a type="button" class="btn btn-sm btn-info" data-id="' . $atividade->id . '"><i class="fa fa-info" aria-hidden="true"></i></a>';
		return $retorno;
	}
}