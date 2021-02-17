<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Clientes liberados</h3>
            <div class="row">
                <table class="table table-striped table-responsive w-100 d-block d-md-table">
                    <thead>
                        <tr>                      
                            <th scope="col">Nome do aluno</th>
                            <th scope="col">Email do aluno</th>
                            <th scope="col">Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php if($clientes): ?>
                        <?php foreach($clientes as $cliente): ?>
                        <tr>
                            <td><a href="../clientes/detalhes/<?= $cliente->id_aluno ?>"><?= $cliente->nome; ?></a></td>
                            <td><?= $cliente->email; ?></td>
                            <td><?= $cliente->dataCadastro; ?></td>
                        </tr>
                        <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
            <?= $pager->links('group1', 'deafault_ptboot'); ?>
            </div>
            <hr>
        </div>
    </div>
</div>