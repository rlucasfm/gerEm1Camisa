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
                            <input type="text" class="form-control" name="endereco" id="endereco" value="<?= esc($cliente->endereco); ?>" readonly>   
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" name="numero" id="numero" value="<?= esc($cliente->numero); ?>" readonly>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" value="<?= esc($cliente->bairro); ?>" readonly>   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="complemento">Complemento:</label>
                            <input type="text" class="form-control" name="complemento" id="complemento" value="<?= esc($cliente->complemento); ?>" readonly>   
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" value="<?= esc($cliente->cidade); ?>" readonly>   
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" name="estado" id="estado" value="<?= esc($cliente->estado); ?>" readonly>   
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="camisa">Tamanho da Camisa:</label>
                        <input type="text" class="form-control" name="camisa" id="camisa" value="<?= esc($cliente->tamanhoCamisa); ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="codrastreio">Código de rastreio:</label>
                        <input type="text" class="form-control" name="codrastreio" id="codrastreio" value="<?= esc($cliente->codrastreio); ?>">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-success mt-4">Atualizar código de rastreio</button>
                </div>                
            </form>
        </div>
    </div>
</div>