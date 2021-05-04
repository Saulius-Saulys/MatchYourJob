<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Match;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public function store(Request $request): array
    {
        $match = Match::where('user_id', $request['user_id'])->where('offer_id', $request['offer_id'])->first();
        if ($match === null) {
            $match = Match::create($request->toArray());

            $match->save();
        } else {
            if ($match->user_matched === 2) {
                $match->user_matched = $request['user_matched'];
            }
            if ($match->offer_matched === 2) {
                $match->offer_matched = $request['offer_matched'];
            }
            $match->save();
        }
        if ($match->offer_matched === 1 && $match->user_matched === 1) {
            return ['isMatch' => true];
        } else
        {
            return ['false' => true];
        }
    }

    public function delete(Match $match): string
    {
        $match->delete();

        return 'OK';
    }

    public function getMatchesByUserId(User $user): array
    {
        $matches = Match::where('user_id', $user->id)->where('user_matched', 1)->where('offer_matched', 1)->get();

        $response = [];
        $i = 0;
        foreach ($matches as $match) {
            $offer = Offer::where('id', $match->offer_id)->first();
            $response[$i]['id'] = $match->id;
            $response[$i]['description'] = $offer->description;
            $response[$i]['employment_type'] = $offer->employment_type;
            $response[$i]['title'] = $offer->title;
            $response[$i]['salary_from'] = $offer->salary_from;
            $response[$i]['salary_to'] = $offer->salary_to;
            $i++;
        }

        return ['matches' => $response];
    }

    public function getUserInfoForCards(User $user): array
    {
        $offers = Offer::where('user_id', $user->id)->get();
        $response = [];
        $i = 0;
        foreach ($offers as $offer) {
            if (Match::where('user_id', $user->id)->where('offer_id', $offer->id)->where('offer_matched', '!=', 2)->where('offer_matched', '!=', 2)->first() === null) {
                $response[$i]['id'] = $offer->id;
                $response[$i]['description'] = $offer->description;
                $response[$i]['employment_type'] = $offer->employment_type;
                $response[$i]['title'] = $offer->title;
                $response[$i]['salary_from'] = $offer->salary_from;
                $response[$i]['salary_to'] = $offer->salary_to;
                $i++;

            }
        }
        return ['offers' => $response];
    }

    public function getMatchesByOfferId(User $user): array
    {
        $offers = Offer::where('user_id', $user->id)->get();
        $matchesIds = [];
        foreach ($offers as $offer) {
            $offerMatches = Match::where('offer_id', $offer->id)->where('user_matched', 1)->where('offer_matched', 1)->get();
            foreach ($offerMatches as $offerMatch) {
                $matchesIds[] = $offerMatch;
            }
        }

        $response = [];
        $i = 0;
        foreach ($matchesIds as $match) {
            $user = User::where('id', $match->user_id)->first();
            $offer = Offer::where('id', $match->offer_id)->first();
            $education = Education::where('user_id', $match->user_id)->first();
            $experience = Experience::where('user_id', $match->user_id)->first();
            $skill = Skill::where('user_id', $match->user_id)->first();

            $response[$i]['id'] = $match->id;
            $response[$i]['matched_with'] = $offer->title;
            $response[$i]['user_name'] = $user->name;
            $response[$i]['email'] = $user->email;
            $response[$i]['education']['name'] = $education->name;
            $response[$i]['education']['university_title'] = $education->university_title;
            $response[$i]['education']['duration'] = $education->duration;
            $response[$i]['experience']['name'] = $experience->name;
            $response[$i]['experience']['company_title'] = $experience->company_title;
            $response[$i]['experience']['duration'] = $experience->duration;
            $response[$i]['skill']['name'] = $skill->name;
            $response[$i]['skill']['description'] = $skill->description;
            $i++;
        }

        return ['responseArray' => $response];
    }
}
