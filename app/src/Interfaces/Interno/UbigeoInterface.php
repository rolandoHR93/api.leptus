<?php
namespace App\Repositories\Interno;
use Illuminate\Http\Request;

interface UbigeoInterface
{
    public function search(Request $request);
    public function lista(string $page);
    public function create(Request $request);
    public function update(Request $request, string $id);
    public function delete(string $id);

}