<?php
namespace App\src\Interfaces\Interno;
use Illuminate\Http\Request;

interface AuthInterface
{
    public function register(array $data);
    public function login(object $data);
    public function signout();

}
