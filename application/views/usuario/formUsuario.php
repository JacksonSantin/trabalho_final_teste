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
                <label for="email">E-mail</label>
                <input id="email" class="form-control" type="email" name="email"
                value="<?= set_value('email', $registro['email']); ?>"
                placeholder="Digite seu email" required>
            </div>

            <?php if(!isset($registro)) {?>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input id="senha" class="form-control" type="password" name="senha"
                    value="<?= set_value('senha', $registro['senha']); ?>"
                    placeholder="Digite sua senha" required>
                </div>
            <?php }?>
            <button class="btn btn-success" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>