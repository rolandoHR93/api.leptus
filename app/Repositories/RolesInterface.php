<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface RolesInterface
{

    public function search(string $id);
    public function lista();
    public function create(Request $request);
    public function update(Request $request, string $id);
    public function delete(string $id);
}
