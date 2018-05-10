<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ParticipanteService;
use App\Http\Requests\ParticipanteCreateRequest;
use App\Http\Requests\ParticipanteUpdateRequest;

class ParticipantesController extends Controller
{
    public function __construct(ParticipanteService $participante_service)
    {
        $this->service = $participante_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $participantes = $this->service->paginated();
        return view('participantes.index')->with('participantes', $participantes);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $participantes = $this->service->search($request->search);
        return view('participantes.index')->with('participantes', $participantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ParticipanteCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticipanteCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('participantes.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('participantes.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the participante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participante = $this->service->find($id);
        return view('participantes.show')->with('participante', $participante);
    }

    /**
     * Show the form for editing the participante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participante = $this->service->find($id);
        return view('participantes.edit')->with('participante', $participante);
    }

    /**
     * Update the participantes in storage.
     *
     * @param  App\Http\Requests\ParticipanteUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParticipanteUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the participantes from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('participantes.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('participantes.index'))->with('message', 'Failed to delete');
    }
}
