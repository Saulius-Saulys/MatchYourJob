<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industry;

class IndustryController extends Controller
{
    public function all()
    {
        return Industry::all();
    }

    public function getById(Industry $industry): Industry
    {
        return $industry;
    }

    public function store(Request $request): Industry
    {
        return new Industry(
            [
                'category' => $request->input('category'),
                'name' => $request->input('name'),
            ]
        );
    }
}
