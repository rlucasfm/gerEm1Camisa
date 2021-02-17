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
	//--------------------------------------------------------------------

}
