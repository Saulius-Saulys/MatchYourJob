<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferStoreRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Models\Offer;

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

    public function update(Offer $offer, OfferUpdateRequest $request): Offer
    {
        $offer->fill($request->validated());
        $offer->save();

        return $offer;
    }
}
