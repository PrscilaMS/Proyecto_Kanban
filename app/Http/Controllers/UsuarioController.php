<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios= Usuario::orderBy('id', 'desc')->paginate(10);

		return view('usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$usuario = new Usuario();

		$usuario->NOMBRE_USUARIO = $request->input("nombre");
        $usuario->APELLIDO = $request->input("apellidos");
        $usuario->CORREO = $request->input("correo");
        $usuario->CONTRASENNA = $request->input("contrasena");
        $usuario->TIPO = $request->input("tipo");
		$usuario->save();
		\Flash::message('Usuario ingresado con éxito');
		return redirect('usuarios');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Usuario::findOrFail($id);

		return view('usuarios.show', compact('usuario'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 **/
	public function edit($id)
	{
		$usuario = Usuario::findOrFail($id);

		return view('usuarios.edit', compact('usuario'));
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
		$usuario = Usuario::where('CORREO', $id)->first();
		$usuario->NOMBRE_USUARIO = $request->input("nombre");
        $usuario->APELLIDO = $request->input("apellidos");
        $usuario->CONTRASENNA = $request->input("contrasena");
        $usuario->TIPO = $request->input("tipo");
        Usuario::modificar($usuario);
		\Flash::message('Usuario modificado con éxito');
		return redirect('usuarios');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($correo)
	{
		$usuario = Usuario::where('CORREO', '=', $correo)->delete();
		return redirect()->route('usuarios.index')->with('message', 'Item deleted successfully.');
	}
	
	public function login(Request $request) {
		$email= $request->input('email');
		$password = $request->input('password');
		$usuario = \DB::select('SELECT * FROM  usuarios WHERE CORREO =  ? AND  CONTRASENNA =  ? LIMIT 1', [$email, $password]);
		 if ($usuario) {
		 	if ($usuario[0]->TIPO == "admin") {
		 		$request->session()->put('usuario', $usuario[0]);
		 		return redirect('/usuarios');
		 	} else {
		 			$request->session()->put('usuario', $usuario[0]);
		 			return redirect('/home');
		 	}
		 } else {
		 	
		 	$request->session()->put('usuario', '');
		 	\Flash::error('¡Correo y contraseñas incorrectas!');
		    return redirect('/');
		 }
	}
	
	public function logout(Request $request) {
			$request->session()->put('usuario', '');
			return redirect('/');
	}

}
