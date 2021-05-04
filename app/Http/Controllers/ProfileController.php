<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\User;

class ProfileController extends Controller
{
    public function getByUserId(User $user): array
    {
        $skills = Skill::where('user_id', $user->id)
            ->get();
        $educations = Education::where('user_id', $user->id)
            ->get();
        $experiences = Experience::where('user_id', $user->id)
            ->get();

        $skillResponse = [];
        $educationResponse = [];
        $experiencesResponse = [];

        $i = 0;
        foreach ($skills as $skill) {
            $skillResponse[$i]['id'] = $skill->id;
            $skillResponse[$i]['name'] = $skill->name;
            $skillResponse[$i]['description'] = $skill->description;
            $i++;
        }
        $i = 0;
        foreach ($educations as $education) {
            $educationResponse[$i]['id'] = $education->id;
            $educationResponse[$i]['university_title'] = $education->university_title;
            $educationResponse[$i]['name'] = $education->name;
            $educationResponse[$i]['duration'] = $education->duration;
            $i++;
        }
        $i = 0;
        foreach ($experiences as $experience) {
            $experiencesResponse[$i]['id'] = $experience->id;
            $experiencesResponse[$i]['company_title'] = $experience->company_title;
            $experiencesResponse[$i]['name'] = $experience->name;
            $experiencesResponse[$i]['duration'] = $experience->duration;
            $i++;
        }

        return [
            "skills" => $skillResponse,
            "educations" => $educationResponse,
            "experiences" => $experiencesResponse,
            'user_name' => $user->name,
        ];
    }
}

