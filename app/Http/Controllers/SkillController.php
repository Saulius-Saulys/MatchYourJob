<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request): Skill
    {
        $skill = Skill::create($request->toArray());
        $skill->save();

        return $skill;
    }

    public function update(Skill $skill, Request $request): Skill
    {
        $skill->fill($request->toArray());
        $skill->save();

        return $skill;
    }

    public function delete(Skill $skill): string
    {
        $skill->delete();

        return 'OK';
    }

    public function getSkillByUserId(Match $match)
    {
        $skills = Skill::where('user_id', $match->user_id)->get();

        return $skills;
    }
}

