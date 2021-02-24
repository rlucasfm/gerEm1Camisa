<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Detalhes do cliente: </h3>
            <hr>
            <form>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?= esc($cliente->nome); ?>" readonly>                                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= esc($cliente->email); ?>" readonly>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dataCad">Data de Cadastro:</label>
                            <input type="date" class="form-control" name="dataCad" id="dataCad" value="<?= esc($cliente->dataCadastro); ?>" readonly>   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="platCompra">Plataforma de Compra:</label>
                            <input type="text" class="form-control" name="platCompra" id="platCompra" value="<?= esc($cliente->platCompra); ?>" readonly>   
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" class="form-control" name="endereco" id="endereco" value="<?= esc($cliente->endereco); ?>">   
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" name="numero" id="numero" value="<?= esc($cliente->numero); ?>">   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?= esc($cliente->bairro); ?>">   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="<?= esc($cliente->complemento); ?>" maxlength="32">   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" value="<?= esc($cliente->cidade); ?>">   
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" value="<?= esc($cliente->estado); ?>">   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="camisa">Tamanho da Camisa:</label>
                        <input type="text" class="form-control" name="camisa" id="camisa" value="<?= esc($cliente->tamanhoCamisa); ?>">
                    </div>
                    <div class="col-md-5">
                        <label for="codrastreio">Código de rastreio:</label>
                        <input type="text" class="form-control" name="codrastreio" id="codrastreio" value="<?= esc($cliente->codrastreio); ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="telefone">Telefone:</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" value="<?= esc($cliente->telefone); ?>">
                    </div>
                    <div class="col-md-2">
                        <a href="https://wa.me/<?php echo str_replace(["(",")"," ","-"], "", $cliente->telefone); ?>?text=Ola%20Somos%20a%20emergencia1.%20Gostariamos%20de%20saber%20mais%20sobre%20voce!" target="_blank"><button type="button" class="btn btn-outline-success mt-4">Whatsapp</button></a>
                    </div>
                </div>            
                <div class="row justify-content-center">
                    <button type="button" class="btn btn-primary mt-4" id="btnSalvar">Atualizar código de rastreio</button>
                    <a href="<?php echo('../gerarEtiqueta/'.$cliente->id_aluno) ?>" target="_blank"><button type="button" class="btn btn-success ml-4 mt-4" id="btnPrint">Imprimir etiqueta</button></a>
                </div>  
            </form>                          
        </div>
    </div>
</div>

<script>
$('#btnSalvar').on('click', () => {
    const codrastreio = $('#codrastreio').val();
    const id_aluno = <?= esc($cliente->id_aluno); ?>;
    const endereco = $('#endereco').val();
    const numero = $('#numero').val();
    const bairro = $('#bairro').val();
    const complemento = $('#complemento').val();
    const cidade = $('#cidade').val();
    const estado = $('#estado').val();
    const tamanhoCamisa = $('#camisa').val();
    const telefone = $('#telefone').val();

    $.ajax({
        type: 'post',
        url: "<?php echo base_url('/clientes/atualizarCliente'); ?>",
        data: {id_aluno:id_aluno, codrastreio: codrastreio, endereco: endereco, numero: numero, bairro: bairro, complemento: complemento, cidade: cidade, estado: estado, tamanhoCamisa: tamanhoCamisa, telefone: telefone},
        success: function(data){
            location.reload(true);
        }
    })
});
</script>

<script>
    $('#telefone').attr("onkeypress", "mascara(this, aplicarTelefone)")
    $('#telefone').attr("maxlength", "15")
</script>