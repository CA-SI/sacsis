<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\OradorService;
use App\Http\Requests\OradorCreateRequest;
use App\Http\Requests\OradorUpdateRequest;

class OradorsController extends Controller
{
    public function __construct(OradorService $orador_service)
    {
        $this->service = $orador_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $oradors = $this->service->paginated();
        return view('oradors.index')->with('oradors', $oradors);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $oradors = $this->service->search($request->search);
        return view('oradors.index')->with('oradors', $oradors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oradors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\OradorCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OradorCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('oradors.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('oradors.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the orador.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orador = $this->service->find($id);
        return view('oradors.show')->with('orador', $orador);
    }

    /**
     * Show the form for editing the orador.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orador = $this->service->find($id);
        return view('oradors.edit')->with('orador', $orador);
    }

    /**
     * Update the oradors in storage.
     *
     * @param  App\Http\Requests\OradorUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OradorUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the oradors from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('oradors.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('oradors.index'))->with('message', 'Failed to delete');
    }
}
