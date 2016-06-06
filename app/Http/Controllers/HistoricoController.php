<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Historico;
use Illuminate\Http\Request;

class HistoricoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$historicos = Historico::orderBy('ID_HISTORICO', 'desc')->paginate(10);

		return view('historicos.index', compact('historicos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('historicos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$historico = new Historico();

		$historico->NOMBRE_HISTORICO = $request->input("nombre");
        $historico->FECHA_INICIO = $request->input("fechainicio");
        $historico->FECHA_FINAL = $request->input("fechafinal");
        $historico->DURACION_TOTAL = $request->input("duraciontotal");

		$historico->save();
		\Flash::message('Historico insertado con éxito');
		return view('tarea_historicos.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$historico = Historico::where('ID_HISTORICO', $id)->first();

		return view('historicos.show', compact('historico'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$historico = Historico::where('ID_HISTORICO', $id)->first();

		return view('historicos.edit', compact('historico'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$historico = Historico::where('ID_HISTORICO', $id)->first();
		
		$historico->NOMBRE_HISTORICO = $request->input("nombre");
        $historico->FECHA_INICIO = $request->input("fechainicio");
        $historico->FECHA_FINAL = $request->input("fechafinal");
        $historico->DURACION_TOTAL = $request->input("duraciontotal");

		Historico::modificar($historico);
		\Flash::message('Historico modificado con éxito');
		return redirect('historicos');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Historico::eliminar($id);
		\Flash::message('Historico eliminado con éxito');
		return redirect('historicos');
	}

}
