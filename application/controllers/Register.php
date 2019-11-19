<?php

  class Register extends CI_Controller{

      
      public function __construct(){
          parent::__construct();
          
          $this->load->helper('form');
        }
        
        public function index(){
            $this->load->view("register");
        }
        
        public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          $dados = $this->input->post();
          $dados['senha'] = md5($dados['senha']);
          
          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[login_cad.email]' : '');
          $this->form_validation->set_rules('email', 'Email', $rule_nome);
          $this->form_validation->set_rules('senha', 'Senha', 'required');

          if($this->form_validation->run() === false){
            
            $this->load->view("register", $dados);
          }else{   
            if($this->db->insert('login_cad', $dados)){
              $dados['cadastro'] = true;
              $this->load->view("register", $dados);
            }
          }
        }
      }
 ?>
