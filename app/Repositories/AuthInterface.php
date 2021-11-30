<?php
namespace App\Repositories;

interface AuthInterface {

    public function register(array $data);
    public function login(object $data);
    public function signout();


}
