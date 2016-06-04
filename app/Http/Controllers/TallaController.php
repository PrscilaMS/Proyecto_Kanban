<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Talla;
use Illuminate\Http\Request;

class TallaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tallas = Talla::orderBy('id', 'desc')->paginate(10);

		return view('tallas.index', compact('tallas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tallas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$talla = new Talla();

		$talla->sigla = $request->input("sigla");

		$talla->save();

		return redirect()->route('tallas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$talla = Talla::findOrFail($id);

		return view('tallas.show', compact('talla'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$talla = Talla::findOrFail($id);

		return view('tallas.edit', compact('talla'));
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
		$talla = Talla::findOrFail($id);

		$talla->sigla = $request->input("sigla");

		$talla->save();

		return redirect()->route('tallas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$talla = Talla::findOrFail($id);
		$talla->delete();

		return redirect()->route('tallas.index')->with('message', 'Item deleted successfully.');
	}

}
