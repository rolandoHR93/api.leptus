<?php
namespace App\src\Interfaces\Interno;
use Illuminate\Http\Request;

interface UbigeoInterface
{
    public function search(Request $request);
    public function lista(string $page);

    public function getProvincias(string $departamentoID);
    public function getDistritos(string $departamentoID, string $provinciaID);

}
