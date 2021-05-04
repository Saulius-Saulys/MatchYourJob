<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request): Education
    {
        $education = Education::create($request->toArray());
        $education->save();

        return $education;
    }

    public function update(Education $education, Request $request): Education
    {
        $education->fill($request->toArray());
        $education->save();

        return $education;
    }

    public function delete(Education $education): string
    {
        $education->delete();

        return 'OK';
    }
}

