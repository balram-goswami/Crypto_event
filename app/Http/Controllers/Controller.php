<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showRegistrationForm()
    {
        return view('UserPanel.register');
    }
}
