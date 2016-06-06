<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\HistoricoResuman;
use Illuminate\Http\Request;

class HistoricoResumanController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$historico_resumens = HistoricoResumens::orderBy('id', 'desc')->paginate(10);

		return view('historico_resumens.index', compact('historico_resumens'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('historico_resumens.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$historico_resuman = new HistoricoResuman();

		$historico_resuman->duracionRequerimientos = $request->input("duracionRequerimientos");
        $historico_resuman->duracionDiseno = $request->input("duracionDiseno");
        $historico_resuman->duracionDesarrollo = $request->input("duracionDesarrollo");
        $historico_resuman->duracionPruebas = $request->input("duracionPruebas");
        $historico_resuman->duracionImplementacion = $request->input("duracionImplementacion");
        $historico_resuman->duracionMantenimiento = $request->input("duracionMantenimiento");

		$historico_resuman->save();

		return redirect()->route('historico_resumens.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$historico_resuman = HistoricoResuman::findOrFail($id);

		return view('historico_resumens.show', compact('historico_resuman'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$historico_resuman = HistoricoResuman::findOrFail($id);

		return view('historico_resumens.edit', compact('historico_resuman'));
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
		$historico_resuman = HistoricoResuman::findOrFail($id);

		$historico_resuman->duracionRequerimientos = $request->input("duracionRequerimientos");
        $historico_resuman->duracionDiseno = $request->input("duracionDiseno");
        $historico_resuman->duracionDesarrollo = $request->input("duracionDesarrollo");
        $historico_resuman->duracionPruebas = $request->input("duracionPruebas");
        $historico_resuman->duracionImplementacion = $request->input("duracionImplementacion");
        $historico_resuman->duracionMantenimiento = $request->input("duracionMantenimiento");

		$historico_resuman->save();

		return redirect()->route('historico_resumens.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$historico_resuman = HistoricoResuman::findOrFail($id);
		$historico_resuman->delete();

		return redirect()->route('historico_resumens.index')->with('message', 'Item deleted successfully.');
	}

}
