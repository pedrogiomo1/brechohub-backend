<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Tenant;
use App\Services\PersonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::select()
            ->with([
                'person.company_person',
                'person.address',
                'person.phones',
            ]);

        return response()->json($companies, 200);
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->all();

        $tenant = Tenant::create();

        $company = new Company();
        $company->tenant()->associate($tenant);

        DB::transaction(function () use ($company, $data) {

            $person = PersonService::create($data);
            $company->person()->associate($person);
            $company->save();

        });

        return response()->json($company, 201);
    }

    public function show(Company $company)
    {
        $company->load([
            'person.company_person',
            'person.address',
            'person.phones',
        ]);

        return response()->json($company, 200);
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->all();

        DB::transaction(function () use ($company, $data) {
            $person = PersonService::update($data, $company->person);
            $company->person()->associate($person);
            $company->save();
        });

        return response()->json($company, 200);

    }

    public function destroy(Company $company)
    {
        //
    }
}
