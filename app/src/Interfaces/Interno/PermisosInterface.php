<?php
namespace App\src\Interfaces\Interno;
use Illuminate\Http\Request;

interface PermisosInterface
{
    public function search(Request $request);
    public function lista(string $page);
    public function create(Request $request);
    public function update(Request $request, string $id);
    public function delete(string $id);

}