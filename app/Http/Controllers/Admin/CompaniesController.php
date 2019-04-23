<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Company\IndexCompany;
use App\Http\Requests\Admin\Company\StoreCompany;
use App\Http\Requests\Admin\Company\UpdateCompany;
use App\Http\Requests\Admin\Company\DestroyCompany;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Company;

class CompaniesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexCompany $request
     * @return Response|array
     */
    public function index(IndexCompany $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Company::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'mobile', 'address', 'type', 'rating'],

            // set columns to searchIn
            ['id', 'name', 'mobile', 'address']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.company.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.company.create');

        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreCompany $request
     * @return Response|array
     */
    public function store(StoreCompany $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Company
        $company = Company::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/companies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  Company $company
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Company $company)
    {
        $this->authorize('admin.company.show', $company);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Company $company)
    {
        $this->authorize('admin.company.edit', $company);

        return view('admin.company.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompany $request
     * @param  Company $company
     * @return Response|array
     */
    public function update(UpdateCompany $request, Company $company)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Company
        $company->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/companies'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyCompany $request
     * @param  Company $company
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyCompany $request, Company $company)
    {
        $company->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
