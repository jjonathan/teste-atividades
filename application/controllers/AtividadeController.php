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
		$status   = isset($_GET['status'])   ? $_GET['status']   : null;
		$situacao = isset($_GET['situacao']) ? $_GET['situacao'] : null;

		$atividades = $this->AtividadeModel->getAll();
		if ($status) {
			$atividades = $this->AtividadeModel->whereIn(['status_id' => $status]);
		}

		if ($situacao && $situacao != 3) {
			foreach ($atividades as $key => $atividade) {
				switch ($situacao) {
					case 1:
					if (!$atividade->situacao) {
						unset($atividades[$key]);
					}
					break;

					case 2:
					if ($atividade->situacao) {
						unset($atividades[$key]);
					}
					break;
				}
			}
		}

		foreach ($atividades as $key => $atividade) {
			$atividade->status = null;
			$ativStatus = $this->StatusModel->getById($atividade->status_id);
			if (isset($ativStatus[0])) {
				$atividade->status = $ativStatus[0];
			}
		}

		$dados['atividades'] = $atividades;
		$dados['estados'] = $this->StatusModel->getAll();

		$dados['selectedSituacao'] = $situacao ? $situacao : null;
		$dados['selectedStatus']   = $status   ? $status   : [];

		$this->load->view('lista', $dados);
	}

	/**
	 * Função resposável por gerar o html dos detalhes e envia via json
	 * @return toJson()
	 */
	public function detalhes(){
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$retorno['message'] = 'Erro inesperado';
		$retorno['status']  = 'error';
		$retorno['data']    = '';
		if ($id) {
			$atividade = $this->AtividadeModel->getById($id);

			if (!isset($atividade[0])) {
				$retorno['message'] = "Atividade não encontrada";
				return $this->toJson($retorno);
			}

			$atividade = $atividade[0];

			$status = $this->StatusModel->getById($atividade->status_id);

			if (!isset($status[0])) {
				$retorno['message'] = 'Atividade sem status';
				return $this->toJson($retorno);
			}

			$atividade->status = $status[0];

			$data = [
				'atividade' => $atividade
			];

			$retorno['data']    = $this->load->view('modal-detalhes', $data, true);
			$retorno['status']  = 'ok';
			$retorno['message'] = 'Tudo ok!';
		}
		$this->load->view('modal-detalhes', $data);
		return $this->toJson($retorno);
	}

	/**
	 * Função responsável por receber um array por parâmetro e enviar como json
	 * @param  array $data Dados em forma de array
	 * @return json        Json com os dados
	 */
	public function toJson($data){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}

	public function nova(){
		if ($_POST) {
			$this->saveAtividade(null, $_POST);
			return redirect('/');
		}

		$estados = $this->StatusModel->getAll();
		$data = [
			'atividade' => null,
			'estados'   => $estados
		];
		$this->load->view('_atividade', $data);
	}

	public function editar(){
		if ($_POST) {
			$this->saveAtividade($_POST['atividade_id'], $_POST); 
			return redirect('/');
		}

		$estados = $this->StatusModel->getAll();
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		if (!$id) {
			return redirect('/lista');
		}
		$atividade = $this->AtividadeModel->getById($id);
		if (!isset($atividade[0])) {
			return redirect('/lista');
		}
		$atividade = $atividade[0];

		$data = [
			'atividade' => $atividade,
			'estados'   => $estados
		];

		$this->load->view('_atividade', $data);
	}

	public function saveAtividade($atividade_id, $dados){

		if ($atividade_id) {
			$atividade = $this->AtividadeModel->getById($atividade_id);
			if (!isset($atividade[0]) || $atividade[0]->status_id == 4) {
				return redirect('/lista');
			}
		}

		if (isset($dados['atividade_id'])) {
			unset($dados['atividade_id']);
		}

		if (!isset($dados['situacao'])) {
			$dados['situacao'] = false;
		}

		if ($dados['dt_fim'] == '') {
			$dados['dt_fim'] = null;
		}

		if ($atividade_id) {
			$salvo = $this->AtividadeModel->update('id', $atividade_id, $dados);
		}else{
			$salvo = $this->AtividadeModel->insert($dados);
		}

		return $salvo;
	}
}