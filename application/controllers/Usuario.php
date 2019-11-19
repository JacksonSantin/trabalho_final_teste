<?php
  class Usuario extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('usuario_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Usuario";
          $dados['lista'] = $this->usuario_model->get();

          $this->template->load('template', 'usuario/viewUsuario', $dados);
      }

      public function remover($id){
          if(!$this->usuario_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index('usuario/index');
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Usuarios";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[login_cad.email]' : '');
          
          $this->form_validation->set_rules('email', 'E-mail', $rule_nome);
          $this->form_validation->set_rules('senha', 'Senha', '');

          if($id == null){
            $this->form_validation->set_rules('senha', 'Senha', 'required');
          }

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "usuario/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->usuario_model->get($id);
          }


          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              
              $this->template->load('template', 'usuario/formUsuario', $dados);
          }else{ //neste caso, form submetido e ok!
              
              if(!$this->usuario_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('usuario/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
