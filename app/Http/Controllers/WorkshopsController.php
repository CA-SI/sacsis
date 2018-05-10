<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WorkshopService;
use App\Http\Requests\WorkshopCreateRequest;
use App\Http\Requests\WorkshopUpdateRequest;

class WorkshopsController extends Controller
{
    public function __construct(WorkshopService $workshop_service)
    {
        $this->service = $workshop_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workshops = $this->service->paginated();
        return view('workshops.index')->with('workshops', $workshops);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $workshops = $this->service->search($request->search);
        return view('workshops.index')->with('workshops', $workshops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workshops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\WorkshopCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkshopCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('workshops.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('workshops.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the workshop.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshop = $this->service->find($id);
        return view('workshops.show')->with('workshop', $workshop);
    }

    /**
     * Show the form for editing the workshop.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workshop = $this->service->find($id);
        return view('workshops.edit')->with('workshop', $workshop);
    }

    /**
     * Update the workshops in storage.
     *
     * @param  App\Http\Requests\WorkshopUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkshopUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the workshops from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('workshops.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('workshops.index'))->with('message', 'Failed to delete');
    }
}
