<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('search') !== null || $request->input('search') === '') {
            $search = $request->input('search');

            $users = User::query()
                ->where('email', 'LIKE', "%{$search}%")
                ->orWhere('type', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('id', 'LIKE', "%{$search}%")
                ->get();

            return view('users.index', compact('users'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }

        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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

        return Redirect::to('http://192.168.0.10:8000/industry')
            ->with('success', 'Product created successfully.');
    }


    public function show(Industry $product)
    {
        return view('industry.show', compact('product'));
    }


    public function edit(Industry $product)
    {
        return view('users.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $user = User::where('id', $request->route('user'))->first();

        $user->update($request->all());

        return Redirect::to('http://192.168.0.10:8000/users')
            ->with('success', 'Product updated successfully.');
    }
}
