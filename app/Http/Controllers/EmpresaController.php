<?php

namespace App\Http\Controllers;


use App\Models\Actividades;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function __construct(Type $var = null)
    {
        $this->collectEmpresa = $this->arrayPendienteEmpresa();
    }

    public function index()
    {
        return $this->collectEmpresa;
    }

    public function maxPendientes()
    {
        $max_pendientes =  $this->collectEmpresa->pluck('cantidad_pendiente')->max();
        // return $this->collectEmpresa->pluck('cantidad_pendiente');
        return $this->collectEmpresa->where('cantidad_pendiente', $max_pendientes)->values();
    }

    protected function arrayPendienteEmpresa() {
        $empresa = Empresa::all();
        $collectEmpresa = collect($empresa)->map(function ($empresa)
        {
            $actividad = Actividades::get()
                        ->where('empresa_id', $empresa->id)
                        ->where('status', 0)
                        ->values();
            return [
                'id_empresa' => $empresa->id,
                'nombre_empresa' => $empresa->name,
                'actividades_pendientes' => $actividad,
                'cantidad_pendiente' => $actividad->count()
            ];
        });
        return $collectEmpresa;
    }
}
