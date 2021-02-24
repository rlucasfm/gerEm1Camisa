<?php namespace App\Controllers;

use App\Models\Cliente;

class Clientes extends BaseController
{
	public function index()
	{
		return redirect()->to(base_url('/'));
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

	public function gerarEtiqueta($id_cliente)
	{		
		$cliente = new Cliente();
		$detalhes = $cliente->detalhes($id_cliente);
		

		try {		
			// $image = @imagecreatefromjpeg("/home/u951804619/domains/cursodeaph.com/public_html/gerencial/static/img/etiqueta.jpg");	
			// imagejpeg($image, "/home/u951804619/domains/cursodeaph.com/public_html/gerencial/static/img/tempetiq.jpg");

			$image = \Config\Services::image()
			->withFile("/home/u951804619/domains/cursodeaph.com/public_html/gerencial/static/img/etiqueta.jpg")	
			->text(utf8_decode($detalhes->nome), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 30,
				'vOffset'	 => 540,					
				'fontSize'   => 18,
				'fontPath'   => realpath('static/font/cmuntb.ttf')					
			])
			->text(utf8_decode($detalhes->endereco ?? 'Sem endereço'), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 30,
				'vOffset'	 => 562,					
				'fontSize'   => 18,
				'fontPath'   => realpath('static/font/cmuntb.ttf')
			])	
			->text(utf8_decode($detalhes->numero ?? 'Sem numero'), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 30,
				'vOffset'	 => 582,					
				'fontSize'   => 18,
				'fontPath'   => realpath('static/font/cmuntb.ttf')
			])
			->text(utf8_decode($detalhes->bairro ?? 'Sem bairro'), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 30,
				'vOffset'	 => 602,					
				'fontSize'   => 18,
				'fontPath'   => realpath('static/font/cmuntb.ttf')
			])
			->text(utf8_decode($detalhes->cep ?? 'Sem cep'), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 30,
				'vOffset'	 => 625,					
				'fontSize'   => 18,
				'fontPath'   => realpath('static/font/cmuntb.ttf')
			])
			->text(utf8_decode($detalhes->cidade ?? 'Sem cidade').'-'.utf8_decode($detalhes->estado ?? 'ZZ'), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 170,
				'vOffset'	 => 625,					
				'fontSize'   => 18,
				'fontPath'   => realpath('static/font/cmuntb.ttf')
			])
			->text(utf8_decode($detalhes->complemento ?? 'Sem complemento'), [
				'color' 	 => '#000000',
				'opacity'    => 0,
				'withShadow' => false,
				'hAlign'     => 'left',
				'vAlign'     => 'center',
				'hOffset'	 => 360,
				'vOffset'	 => 700,					
				'fontSize'   => 12,
				'fontPath'   => realpath('static/font/cmuntb.ttf')
			])
			->convert(IMAGETYPE_JPEG)
			->save("/home/u951804619/domains/cursodeaph.com/public_html/gerencial/static/img/tempetiq.jpg");

		} catch (\Exception $err) {
			var_dump($err);
			$error = TRUE;
		}
		
		if(!$error) echo view('clientes/etiqueta');		
		
	}
	//--------------------------------------------------------------------

}
