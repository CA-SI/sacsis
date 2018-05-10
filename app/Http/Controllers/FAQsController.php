<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FAQService;
use App\Http\Requests\FAQCreateRequest;
use App\Http\Requests\FAQUpdateRequest;

class FAQsController extends Controller
{
    public function __construct(FAQService $f_a_q_service)
    {
        $this->service = $f_a_q_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $f_a_qs = $this->service->paginated();
        return view('f_a_qs.index')->with('f_a_qs', $f_a_qs);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $f_a_qs = $this->service->search($request->search);
        return view('f_a_qs.index')->with('f_a_qs', $f_a_qs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('f_a_qs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\FAQCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('f_a_qs.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('f_a_qs.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the f_a_q.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $f_a_q = $this->service->find($id);
        return view('f_a_qs.show')->with('f_a_q', $f_a_q);
    }

    /**
     * Show the form for editing the f_a_q.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $f_a_q = $this->service->find($id);
        return view('f_a_qs.edit')->with('f_a_q', $f_a_q);
    }

    /**
     * Update the f_a_qs in storage.
     *
     * @param  App\Http\Requests\FAQUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the f_a_qs from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('f_a_qs.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('f_a_qs.index'))->with('message', 'Failed to delete');
    }
}
