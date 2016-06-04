<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TareaHistorico;
use Illuminate\Http\Request;

class TareaHistoricoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tarea_historicos = TareaHistorico::orderBy('id', 'desc')->paginate(10);

		return view('tarea_historicos.index', compact('tarea_historicos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tarea_historicos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$tarea_historico = new TareaHistorico();

		$tarea_historico->nombre = $request->input("nombre");
        $tarea_historico->duracionRequerimientos = $request->input("duracionRequerimientos");
        $tarea_historico->duracionDiseno = $request->input("duracionDiseno");
        $tarea_historico->duracionDesarrollo = $request->input("duracionDesarrollo");
        $tarea_historico->duracionPruebas = $request->input("duracionPruebas");
        $tarea_historico->duracionImplementacion = $request->input("duracionImplementacion");
        $tarea_historico->duracionMantenimiento = $request->input("duracionMantenimiento");

		$tarea_historico->save();

		return redirect()->route('tarea_historicos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tarea_historico = TareaHistorico::findOrFail($id);

		return view('tarea_historicos.show', compact('tarea_historico'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tarea_historico = TareaHistorico::findOrFail($id);

		return view('tarea_historicos.edit', compact('tarea_historico'));
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
		$tarea_historico = TareaHistorico::findOrFail($id);

		$tarea_historico->nombre = $request->input("nombre");
        $tarea_historico->duracionRequerimientos = $request->input("duracionRequerimientos");
        $tarea_historico->duracionDiseno = $request->input("duracionDiseno");
        $tarea_historico->duracionDesarrollo = $request->input("duracionDesarrollo");
        $tarea_historico->duracionPruebas = $request->input("duracionPruebas");
        $tarea_historico->duracionImplementacion = $request->input("duracionImplementacion");
        $tarea_historico->duracionMantenimiento = $request->input("duracionMantenimiento");

		$tarea_historico->save();

		return redirect()->route('tarea_historicos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tarea_historico = TareaHistorico::findOrFail($id);
		$tarea_historico->delete();

		return redirect()->route('tarea_historicos.index')->with('message', 'Item deleted successfully.');
	}

}
