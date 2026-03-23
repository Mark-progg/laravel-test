<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyService $service
    ) {}

    public function index()
    {
        $companies = $this->service->getAllCompanies();
        return response()->json($companies);
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = $this->service->createCompany($request->validated());
        return response()->json($company, 201);
    }

    public function show(int $id)
    {
        $company = $this->service->getAllCompanies()->firstWhere('id', $id);
        return response()->json($company);
    }

    public function update(UpdateCompanyRequest $request, int $id)
    {
        $company = $this->service->updateCompany($id, $request->validated());
        return response()->json($company);
    }

    public function destroy(int $id)
    {
        $this->service->deleteCompany($id);
        return response()->json(null, 204);
    }
}