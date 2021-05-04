<?php

namespace App\Http\Controllers;


use App\Models\EmploymentType;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmploymentTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('search') !== null) {
            $search = $request->input('search');

            $employmentTypes = EmploymentType::query()
                ->where('category', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%")
                ->get();

            return view('industry.index', compact('employmentTypes'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }

        $employmentTypes = EmploymentType::latest()->paginate(10);

        return view('employment_type.index', compact('employmentTypes'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('employment_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        EmploymentType::create($request->all());

        return Redirect::to('http://192.168.0.10:8000/employment_type')
            ->with('success', 'Product created successfully.');
    }

    public function edit(EmploymentType $employmentType)
    {
        return view('employment_type.edit', compact('employmentType'));
    }

    public function update(Request $request)
    {
        $employmentType = EmploymentType::where('id', $request->route('employment_type'))->first();
        $request->validate([
            'name' => 'required',
        ]);
        $employmentType->update($request->all());

        return Redirect::to('http://192.168.0.10:8000/employment_type')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(EmploymentType $employmentType)
    {
        $employmentType->delete();

        return Redirect::to('http://192.168.0.10:8000/employment_type')
            ->with('success', 'Product deleted successfully.');
    }
}
