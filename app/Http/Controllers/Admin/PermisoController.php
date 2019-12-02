<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Permiso;
use App\Http\Requests\ValidarPermiso;

class PermisoController extends Controller
{
    public function index()
    {
        $permisos = Permiso::orderBy('id')->get();
        return view('admin.permiso.index', compact('permisos'));
    }

    public function crear()
    {
        return view('admin.permiso.crear');
    }

    public function guardar(ValidarPermiso $request)
    {
        Permiso::create($request->all());
        return redirect('admin/permiso/crear')->with('mensaje', 'Permiso creado con exito');
    }

    public function mostrar($id)
    {
        //
    }

    public function editar($id)
    {
        $data = Permiso::findOrFail($id);
        return view('admin.permiso.editar', compact('data'));
    }

    public function actualizar(ValidarPermiso $request, $id)
    {
        Permiso::findOrFail($id)->update($request->all());
        return redirect('admin/permiso')->with('mensaje', 'Permiso actualizado con exito');
    }

    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Permiso::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
