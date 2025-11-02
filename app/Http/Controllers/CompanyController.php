<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    public const DIR = "admin.companies.";

    public function index()
    {
        $companies = Company::paginate(config('pagination.count'));
        return view(self::DIR . "index", compact("companies"));
    }

    public function create()
    {
        return view(self::DIR . "create");
    }

    public function store(StoreCompanyRequest $request)
    {


        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('companies', 'public');
            $data['image'] = $imagePath;
        }
        Company::create($data);


        return redirect()->route("admin.companies.index")
            ->with('Success', 'Company created successfully!');
    }

    public function show(Company $company)
    {
        return view("admin.companies.show", compact("company"));
    }

    public function edit(Company $company)
    {
        return view("admin.companies.edit", compact("company"));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($company->image);
            $imagePath = $request->file('image')->store('companies', 'public');
            $data['image'] = $imagePath;
        }
        $company->update($data);
        return redirect()->route("admin.companies.index")
            ->with('success', 'Company updated successfully!');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route("admin.companies.index")
            ->with('Success', 'Company deleted successfully!');
    }
}
