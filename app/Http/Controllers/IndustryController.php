<?php

namespace App\Http\Controllers;


use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class IndustryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('search') !== null) {
            $search = $request->input('search');

            $industries = Industry::query()
                ->where('category', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%")
                ->get();

            return view('industry.index', compact('industries'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        $industries = Industry::latest()->paginate(5);

        return view('industry.index', compact('industries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('industry.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        Industry::create($request->all());
        $industries = Industry::latest()->paginate(5);


        return Redirect::to('http://192.168.0.10:8000/industry')
            ->with('success', 'Product created successfully.');
    }


    public function show(Industry $product)
    {
        return view('industry.show', compact('product'));
    }

    public function update(Request $request)
    {
        $industry = Industry::where('id', $request->route('industry'))->first();
        $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);
        $industry->update($request->all());

        return Redirect::to('http://192.168.0.10:8000/industry')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();

        return Redirect::to('http://192.168.0.10:8000/industry')
            ->with('success', 'Product deleted successfully.');
    }
}
