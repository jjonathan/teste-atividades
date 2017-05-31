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

		$dados['atividades'] = $atividades;
		$dados['estados'] = $this->StatusModel->getAll();

		$dados['selectedSituacao'] = $situacao ? $situacao : null;
		$dados['selectedStatus']   = $status   ? $status   : [];

		$this->load->view('lista', $dados);
	}
}