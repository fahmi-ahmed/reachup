<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Menu\IndexMenu;
use App\Http\Requests\Admin\Menu\StoreMenu;
use App\Http\Requests\Admin\Menu\UpdateMenu;
use App\Http\Requests\Admin\Menu\DestroyMenu;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Menu;

class MenusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexMenu $request
     * @return Response|array
     */
    public function index(IndexMenu $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Menu::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'company_id', 'type', 'name', 'price', 'category'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.menu.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.menu.create');

        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMenu $request
     * @return Response|array
     */
    public function store(StoreMenu $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Menu
        $menu = Menu::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/menus'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param  Menu $menu
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Menu $menu)
    {
        $this->authorize('admin.menu.show', $menu);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menu $menu
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Menu $menu)
    {
        $this->authorize('admin.menu.edit', $menu);

        return view('admin.menu.edit', [
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMenu $request
     * @param  Menu $menu
     * @return Response|array
     */
    public function update(UpdateMenu $request, Menu $menu)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Menu
        $menu->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/menus'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyMenu $request
     * @param  Menu $menu
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyMenu $request, Menu $menu)
    {
        $menu->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
