<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Type\IndexType;
use App\Http\Requests\Admin\Type\StoreType;
use App\Http\Requests\Admin\Type\UpdateType;
use App\Http\Requests\Admin\Type\DestroyType;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Type;

class TypesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexType $request
     * @return Response|array
     */
    public function index(IndexType $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Type::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.type.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.type.create');

        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreType $request
     * @return Response|array
     */
    public function store(StoreType $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Type
        $type = Type::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  Type $type
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Type $type)
    {
        $this->authorize('admin.type.show', $type);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Type $type
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Type $type)
    {
        $this->authorize('admin.type.edit', $type);

        return view('admin.type.edit', [
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateType $request
     * @param  Type $type
     * @return Response|array
     */
    public function update(UpdateType $request, Type $type)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Type
        $type->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/types'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyType $request
     * @param  Type $type
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyType $request, Type $type)
    {
        $type->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
