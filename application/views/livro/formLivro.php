<div class="row col-md-12">
    <div class="box">
        <div class="box-body">
          <?php
              //verificando se o form_validation retornou erros
              if(validation_errors() != null){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                    <?php echo validation_errors(); //mostra os erros?>
                </div>
          <?php } ?>

			<?php echo form_open($acao); ?>

            <div class="form-group">
                <label for="titulo">Título</label>
                <input id="titulo" class="form-control" type="text" name="titulo"
                value="<?= set_value('titulo', $registro['titulo']); ?>" 
                placeholder="Informe o título do livro">
            </div>

            <div class="form-group">
                <label for="tipo_uso">Tipo de Uso</label>
                <input id="tipo_uso" class="form-control" type="text" name="tipo_uso"
                value="<?= set_value('tipo_uso', $registro['tipo_uso']); ?>"
                placeholder="Informe o tipo de uso" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input id="autor" class="form-control" type="text" name="autor"
                value="<?= set_value('autor', $registro['autor']); ?>"
                placeholder="Informe o autor" required>
            </div>

            <div class="form-group">
                <label for="editora">Editora</label>
                <input id="editora" class="form-control" type="text" name="editora"
                value="<?= set_value('editora', $registro['editora']); ?>"
                placeholder="Informe a editora" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input id="descricao" class="form-control" type="text" name="descricao"
                value="<?= set_value('descricao', $registro['descricao']); ?>"
                placeholder="sobre o livro..." required>
            </div>


            <button class="btn btn-success" type="submit"><i class="fa fa-send"></i> Enviar</button>

            <button class="btn btn-warning" onclick="JavaScript: window.history.back();"><i class="fa fa-remove"></i> Cancelar</button>
          </form>
        </div>
    </div>
</div>
