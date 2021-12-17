<?php
namespace App\src\Interfaces\Emails;
use Illuminate\Http\Request;

interface InteractionInterface
{
    public function search(Request $request);


}
