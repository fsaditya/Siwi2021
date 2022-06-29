<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravolt\Indonesia\Models\Province;

class DependentDropdownController extends Controller
{
    public function index()
    {
        // $provinces = Province::pluck('name', 'id');

        // return view('dependent-dropdown.index', [
        //     'provinces' => $provinces,
        // ]);
    }
}
