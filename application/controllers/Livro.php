<?php
  class Livro extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('livro_model');

      }

      public function index(){
          $dados['titulo']= "Manutenção de Livro";
          $dados['lista'] = $this->livro_model->get();

          $this->template->load('template', 'livro/viewLivro', $dados);
      }

      public function remover($id){
          if(!$this->livro_model->remover($id)){
              die('Erro ao tentar remover');
          }
          $this->index('livro/index');
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Tipo de Livro";

          //definição de regras para o formulário
          $rule_nome = 'required' . (($id==null)? '|is_unique[livro.titulo]' : '');

          $this->form_validation->set_rules('titulo', 'Titulo', $rule_nome);
          $this->form_validation->set_rules('tipo_uso', 'Tipo de Uso', 'required');
          $this->form_validation->set_rules('autor', 'Autor', 'required');
          $this->form_validation->set_rules('editora', 'Editora', 'required');
          $this->form_validation->set_rules('descricao', 'Descricao', 'required');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "livro/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->livro_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              
              $this->template->load('template', 'livro/formLivro', $dados);
          }else{ //neste caso, form submetido e ok!
              
              if(!$this->livro_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('livro/index'); //redireciona o fluxo da aplicação
          }
      }
  }
 ?>
