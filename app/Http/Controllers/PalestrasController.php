<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PalestraService;
use App\Http\Requests\PalestraCreateRequest;
use App\Http\Requests\PalestraUpdateRequest;

class PalestrasController extends Controller
{
    public function __construct(PalestraService $palestra_service)
    {
        $this->service = $palestra_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palestras = $this->service->paginated();
        return view('palestras.index')->with('palestras', $palestras);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $palestras = $this->service->search($request->search);
        return view('palestras.index')->with('palestras', $palestras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('palestras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PalestraCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PalestraCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('palestras.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('palestras.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the palestra.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $palestra = $this->service->find($id);
        return view('palestras.show')->with('palestra', $palestra);
    }

    /**
     * Show the form for editing the palestra.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $palestra = $this->service->find($id);
        return view('palestras.edit')->with('palestra', $palestra);
    }

    /**
     * Update the palestras in storage.
     *
     * @param  App\Http\Requests\PalestraUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PalestraUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the palestras from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('palestras.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('palestras.index'))->with('message', 'Failed to delete');
    }
}
