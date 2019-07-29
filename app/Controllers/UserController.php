<?php

namespace App\Controllers;

class UserController extends Controller
{
    public function index($request, $response)
    {
        return $this->c->view->render($response, 'users/index.twig');
    }

    public function show($request, $response)
    {
        return $this->c->view->render($response, 'users/index.twig');
    }
}