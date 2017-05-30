<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

     // Variável que define o nome da tabela
     var $table = "";

     /**
     * Método Construtor
     */
     function __construct() {
          parent::__construct();
     }

     /**
      * Retorna todos os registros da tabela
      * @return array Array de objetos da tabela
      */
     function getAll(){
          $query = $this->db->get($this->table);
          return $query->result();
     }

     /**
     * Insere um registro na tabela
     *
     * @param array $dados Dados a serem inseridos
     *
     * @return boolean
     */
     function insert($dados) {
          if(!isset($dados))
               return false;

          return $this->db->insert($this->table, $dados);
     }

     /**
     * Recupera um registro a partir de um ID
     *
     * @param integer $id ID do registro a ser recuperado
     *
     * @return array
     */
     function getById($id) {
          if(is_null($id))
               return false;

          $this->db->where('id', $id);
          $query = $this->db->get($this->table);

          if ($query->num_rows() > 0) {
               return $query->result();
          } else {
               return null;
          }
     }

     /**
     * Atualiza um registro na tabela
     *
     * @param string $key_name Nome do campo que é a chave para o update
     * @param integer $key_value Valor do campo chave para o update
     * @param array $dados Dados a serem inseridos
     *
     * @return boolean
     */
     function update($key_name, $key_value, $dados) {
          if(is_null($key_value) || !isset($dados)){
               return false;
          }

          $this->db->where($key_name, $key_value);
          return $this->db->update($this->table, $dados);
     }

}

/* End of file */
