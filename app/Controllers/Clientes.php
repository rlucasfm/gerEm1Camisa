<?php namespace App\Controllers;

use App\Models\Cliente;

class Clientes extends BaseController
{
	public function index()
	{

	}

    public function liberados()
    {
        $clientes = new Cliente();

        $data = [
			"title" => "Clientes - Liberados para envio",
			"name" => session()->get("name"),
			"menuActiveID" 	=> "clientes",
			"errorMsg" 		=> session()->get('errorMsg'),
			"successMsg" 	=> session()->get('successMsg'),                
            "clientes"      => $clientes->listarLiberados(),
            "pager"         => $clientes->pager        
		]; 

        echo view('templates/header', $data);
		echo view('clientes/liberados', $data);
		echo view('templates/footer', $data);
    }

    public function detalhes($id_cliente)
    {
        $clientes = new Cliente();

        $data = [
			"title"         => "Clientes - Detalhes",
			"name"          => session()->get("name"),
			"menuActiveID" 	=> "clientes",
			"errorMsg" 		=> session()->get('errorMsg'),
			"successMsg" 	=> session()->get('successMsg'),                
            "cliente"       => $clientes->detalhes($id_cliente)     
		]; 

        echo view('templates/header', $data);
		echo view('clientes/detalhes', $data);
		echo view('templates/footer', $data);
    }

	public function atualizarCliente()
	{
		$cliente = new Cliente();

		$id_aluno = $this->request->getPost('id_aluno');
		$codrastreio = $this->request->getPost('codrastreio');
		$endereco = $this->request->getPost('endereco');
		$numero = $this->request->getPost('numero');
		$bairro = $this->request->getPost('bairro');
		$complemento = $this->request->getPost('complemento');
		$cidade = $this->request->getPost('cidade');
		$estado = $this->request->getPost('estado');
		$tamanhoCamisa = $this->request->getPost('tamanhoCamisa');
		$telefone = $this->request->getPost('telefone');

		$data = [
			'id_aluno' => $id_aluno,
			'codrastreio' => $codrastreio,
			'endereco' => $endereco,
			'numero' => $numero,
			'bairro' => $bairro,
			'complemento' => $complemento,
			'cidade' => $cidade,
			'estado' => $estado,
			'tamanhoCamisa' => $tamanhoCamisa,
			'telefone' => $telefone
		];

		try {
			$response = $cliente->atualizarCliente($data);
			$success = TRUE;
		} catch (\Exception $err) {
			session()->setFlashdata('errorMsg', 'Houve um erro... '.$err->getMessage());
			$success = FALSE;
		}

		if($success) session()->setFlashdata('successMsg', $response);
	}
	//--------------------------------------------------------------------

}
