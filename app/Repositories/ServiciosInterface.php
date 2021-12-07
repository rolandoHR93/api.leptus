<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface ServiciosInterface
{

    public function search(string $id);
    public function lista();
    public function createServicio(Request $request);
    public function updateServicio(Request $request, string $id);
    public function deleteServicio(string $id);

}
