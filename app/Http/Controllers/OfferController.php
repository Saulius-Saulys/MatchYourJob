<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Match;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class OfferController extends Controller
{
    public function store(OfferStoreRequest $request): Offer
    {
        $validated = $request->validated();

        $offer = (new Offer(
            [
                'user_id' => $validated['user_id'],
                'industry_id' => $validated['industry_id'],
                'description' => $validated['description'],
                'employment_type' => $validated['employment_type'],
                'title' => $validated['title'],
                'salary_from' => $validated['salary_from'],
                'salary_to' => $validated['salary_to'],
            ]
        ));
        $offer->save();

        return $offer;
    }

    public function getUnmatchedOffers(User $user): array
    {
        $offers = Offer::all();
        $response = [];
        $i = 0;
        foreach ($offers as $offer) {
            if (Match::where('user_id', $user->id)->where('offer_id', $offer->id)->where('user_matched', '!=', 2)->first() === null) {
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

    public function getByUserId(User $user): array
    {
        $offers = Offer::where('user_id', $user->id)->get();

        return ['matches' => $offers];
    }

    public function update(Offer $offer, OfferUpdateRequest $request): Offer
    {
        $offer->fill($request->validated());
        $offer->save();

        return $offer;
    }

    public function delete(Offer $offer): string
    {
        $offer->delete();

        return 'OK';
    }
}
