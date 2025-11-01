<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{

    public const DIR = "admin.services.";

    public function index()
    {
        $services = Service::paginate(config('pagination.count'));
        return view(self::DIR . "index", compact("services"));
    }

    public function create()
    {
        return view(self::DIR . "create");
    }

    public function store(StoreServiceRequest $request)
    {

        $data = $request->validated();
        Service::create($data);

        return redirect()->route("admin.services.index")
            ->with('Success', 'Service created successfully!');
    }

    public function show(Service $service)
    {
        return view("admin.services.show", compact("service"));
    }

    public function edit(Service $service)
    {
        return view("admin.services.edit", compact("service"));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->update($data);

        return redirect()->route("admin.services.index")
            ->with('Success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route("admin.services.index")
            ->with('Success', 'Service deleted successfully!');
    }
}