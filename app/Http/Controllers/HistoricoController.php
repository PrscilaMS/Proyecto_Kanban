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
		$historicos = Historico::orderBy('id', 'desc')->paginate(10);

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

		$historico->nombre = $request->input("nombre");
        $historico->fechaInicio = $request->input("fechaInicio");
        $historico->fechaFinal = $request->input("fechaFinal");
        $historico->duracionTotal = $request->input("duracionTotal");

		$historico->save();

		return redirect()->route('historicos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$historico = Historico::findOrFail($id);

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
		$historico = Historico::findOrFail($id);

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
		$historico = Historico::findOrFail($id);

		$historico->nombre = $request->input("nombre");
        $historico->fechaInicio = $request->input("fechaInicio");
        $historico->fechaFinal = $request->input("fechaFinal");
        $historico->duracionTotal = $request->input("duracionTotal");

		$historico->save();

		return redirect()->route('historicos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$historico = Historico::findOrFail($id);
		$historico->delete();

		return redirect()->route('historicos.index')->with('message', 'Item deleted successfully.');
	}

}
