<?php

    namespace App\Controllers;

    
    use App\Registry;

class Controller {

        public function index()
        {
            $roles = Registry::get('database')->selectAll('roles');
            //un cop tenim tota la col·lecció de roles els compactem
            // equival a fer un $rows[0] del resultat del fethAll
            return view('index', compact('roles'));
        }
    }