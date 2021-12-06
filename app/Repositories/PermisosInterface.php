<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface PermisosInterface
{

    public function search(string $id);
    public function lista();
    public function create(Request $request);
    public function update(Request $request, string $id);
    public function delete(string $id);

}
