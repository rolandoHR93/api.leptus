<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface GrupoServiciosInterface {

    public function lista(int $meses);
    public function create(Request $request);
    public function update(Request $request, string $id);
    public function delete(string $id);

}
