<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryStoreRequest;
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

    public function store(IndustryStoreRequest $request): Industry
    {
        $validated = $request->validated();
        $industry = (new Industry(
            [
                'category' => $validated['category'],
                'name' => $validated['name'],
            ]
        ));
        $industry->save();

        return $industry;
    }

    public function update(Industry $industry, IndustryStoreRequest $request): Industry
    {
        $validated = $request->validated();

        if ($validated['category'] !== null) {
            $industry->category = $validated['category'];
        }
        if ($validated['name'] !== null) {
            $industry->name = $validated['name'];
        }

        $industry->save();

        return new Industry(
            [
                'category' => $validated['category'],
                'name' => $validated['name'],
            ]
        );
    }
}
