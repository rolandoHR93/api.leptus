<?php
namespace App\Repositories\Interno;
use Illuminate\Http\Request;

interface PersonasInterface
{

    public function search(string $id);
    public function lista();
    public function create(Request $request);
    public function update(Request $request, string $id);
    public function delete(string $id);

}
