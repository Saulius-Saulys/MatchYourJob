<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request): Experience
    {
        $experience = Experience::create($request->toArray());
        $experience->save();

        return $experience;
    }

    public function update(Experience $experience, Request $request): Experience
    {
        $experience->fill($request->toArray());
        $experience->save();

        return $experience;
    }

    public function delete(Experience $experience): string
    {
        $experience->delete();

        return 'OK';
    }
}

