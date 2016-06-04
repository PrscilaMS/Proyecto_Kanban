<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Version;
use Illuminate\Http\Request;

class VersionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$versions = Version::orderBy('id', 'desc')->paginate(10);

		return view('versions.index', compact('versions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('versions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$version = new Version();

		$version->numero = $request->input("numero");
        $version->esfuerzoHoras = $request->input("esfuerzoHoras");
        $version->esfuerzoTalla = $request->input("esfuerzoTalla");
        $version->duracion = $request->input("duracion");
        $version->fechaFinal = $request->input("fechaFinal");

		$version->save();

		return redirect()->route('versions.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$version = Version::findOrFail($id);

		return view('versions.show', compact('version'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$version = Version::findOrFail($id);

		return view('versions.edit', compact('version'));
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
		$version = Version::findOrFail($id);

		$version->numero = $request->input("numero");
        $version->esfuerzoHoras = $request->input("esfuerzoHoras");
        $version->esfuerzoTalla = $request->input("esfuerzoTalla");
        $version->duracion = $request->input("duracion");
        $version->fechaFinal = $request->input("fechaFinal");

		$version->save();

		return redirect()->route('versions.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$version = Version::findOrFail($id);
		$version->delete();

		return redirect()->route('versions.index')->with('message', 'Item deleted successfully.');
	}

}
