<?php
namespace App\src\Interfaces\Interno;
use Illuminate\Http\Request;

interface ModulosInterface
{
	public function search(Request $request);
	public function lista(string $page);
	public function create(Request $request);
	public function update(Request $request, string $id);
	public function delete(string $id);

	public function agregarModuloItem(Request $request);
	public function deleteModuloItem(Request $request);

    public function agregarModuloPersona(Request $request);
	public function deleteModuloPersona(Request $request);

}
