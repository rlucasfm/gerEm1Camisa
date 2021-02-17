<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Cliente extends Model
{
    protected $table            = 'alunos';
    protected $primaryKey       = 'id_aluno';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['endereco, numero, bairro, complemento, cidade, estado, cep, tamanhoCamisa, codrastreio'];
    protected $useTimestamps    = false;
    protected $skipValidation   = true;

    public function listarLiberados()
    {
        $datalib = new Time('-15 day');
        $datalib = $datalib->toDateString();        
        $liberados = $this->where("dataCadastro >=", $datalib)      
                        ->paginate(10, 'group1');

        return $liberados;
    }

    public function detalhes($id_cliente)
    {
        $cliente = $this->find($id_cliente);
        
        return $cliente;
    }
}