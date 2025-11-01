<?php

namespace App\Http\Controllers;

use App\Models\Testmonial;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTestmonialRequest;
use App\Http\Requests\UpdateTestmonialRequest;



class TestmonialController extends Controller
{

    public const DIR = "admin.testmonials.";

    public function index()
    {
        $testmonials = Testmonial::paginate(config('pagination.count'));
        return view(self::DIR . "index", compact("testmonials"));
    }

    public function create()
    {
        return view(self::DIR . "create");
    }

    public function store(StoreTestmonialRequest $request)
    {
        // dd($request->all());

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('testmonials', 'public');
            $data['image'] = $imagePath;
        }
        Testmonial::create($data);


        return redirect()->route("admin.testmonials.index")
            ->with('Success', 'Testmonial created successfully!');
    }

    public function show(Testmonial $testmonial)
    {
        return view("admin.testmonials.show", compact("testmonial"));
    }

    public function edit(Testmonial $testmonial)
    {
        return view("admin.testmonials.edit", compact("testmonial"));
    }

    public function update(UpdateTestmonialRequest $request, Testmonial $testmonial)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($testmonial->image);
            $imagePath = $request->file('image')->store('testmonials', 'public');
            $data['image'] = $imagePath;
        }
        $testmonial->update($data);
        return redirect()->route("admin.testmonials.index")
            ->with('success', 'Testmonial updated successfully!');
    }

    public function destroy(Testmonial $testmonial)
    {
        $testmonial->delete();

        return redirect()->route("admin.testmonials.index")
            ->with('Success', 'Testmonial deleted successfully!');
    }
}
