<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			"title" => "Gerencial - Em1",
			"name" => session()->get("name"),
			"menuActiveID" 	=> "dash",
			"errorMsg" 		=> session()->get('errorMsg'),
			"successMsg" 	=> session()->get('successMsg'),
		];

		echo view('templates/header', $data);
		echo "123";
		echo view('templates/footer', $data);
	}

	//--------------------------------------------------------------------

}
