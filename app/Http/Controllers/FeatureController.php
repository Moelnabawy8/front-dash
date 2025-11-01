<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;

class FeatureController extends Controller
{
    public const DIR = "admin.features.";

    public function index()
    {
        $features = Feature::paginate(config('pagination.count'));
        return view(self::DIR . "index", compact("features"));
    }

    public function create()
    {
        return view(self::DIR . "create");
    }

    public function store(StoreFeatureRequest $request)
    {


        $data = $request->validated();
        Feature::create($data);

        return redirect()->route("admin.features.index")
            ->with('Success', 'Feature created successfully!');
    }

    public function show(Feature $feature)
    {
        return view("admin.features.show", compact("feature"));
    }

    public function edit(Feature $feature)
    {
        return view("admin.features.edit", compact("feature"));
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $data = $request->validated();
        $feature->update($data);

        return redirect()->route("admin.features.index")
            ->with('Success', 'Feature updated successfully!');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route("admin.features.index")
            ->with('Success', 'Feature deleted successfully!');
    }
}
