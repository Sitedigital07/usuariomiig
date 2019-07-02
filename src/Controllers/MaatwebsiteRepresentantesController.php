<?php

namespace Digitalmiig\Usuariomiig\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Digitalmiig\Titulomiig\Item;
use Digitalmiig\Titulomiig\Colegio;
use Digitalmiig\Titulomiig\Titulo;
use Digitalmiig\Usuariomiig\Representante;
use DB;
use Input;
use Excel;

class MaatwebsiteRepresentantesController extends Controller
{
	public function importExport()
	{
		return view('titulomiig::importExport');
	}

	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
		return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}


	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('items')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}


public function exportadores()
	{

Excel::create('Filename', function($excel) {

    $excel->sheet('Sheetname', function($sheet) {

      
       $colegios = Representante::all();
       $sheet->fromArray($colegios);

    });

})->export('xls');
}


	public function exportador($type)
	{
		$data = Representante::get()->toArray();
		return Excel::create('representantes', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}

	public function importador()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['nombre' => $value->nombre, 'apellido' => $value->apellido, 'email' => $value->email, 'identificacion' => $value->identificacion,'telefono' => $value->telefono,'region_id' => $value->region_id,'agencia' => $value->agencia,'bb' => $value->bb,'pr' => $value->pr,'ig' => $value->ig,'plataforma' => $value->plataforma,];
				}
				if(!empty($insert)){
					DB::table('representantes')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}


}
 