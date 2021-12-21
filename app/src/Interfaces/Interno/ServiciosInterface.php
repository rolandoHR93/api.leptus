<?php
namespace App\src\Interfaces\Interno;
use Illuminate\Http\Request;

interface ServiciosInterface
{
    public function search(Request $request);
    public function lista(string $page);
    public function createServicio(Request $request);
    public function updateServicio(Request $request, string $id);
    public function deleteServicio(string $id);


    public function agregarGrupoServicio(Request $request);
	public function deleteGrupoServicio(Request $request);

}
