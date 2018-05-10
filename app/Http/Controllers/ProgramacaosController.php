<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProgramacaoService;
use App\Http\Requests\ProgramacaoCreateRequest;
use App\Http\Requests\ProgramacaoUpdateRequest;

class ProgramacaosController extends Controller
{
    public function __construct(ProgramacaoService $programacao_service)
    {
        $this->service = $programacao_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $programacaos = $this->service->paginated();
        return view('programacaos.index')->with('programacaos', $programacaos);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $programacaos = $this->service->search($request->search);
        return view('programacaos.index')->with('programacaos', $programacaos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programacaos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ProgramacaoCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramacaoCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('programacaos.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('programacaos.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the programacao.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programacao = $this->service->find($id);
        return view('programacaos.show')->with('programacao', $programacao);
    }

    /**
     * Show the form for editing the programacao.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programacao = $this->service->find($id);
        return view('programacaos.edit')->with('programacao', $programacao);
    }

    /**
     * Update the programacaos in storage.
     *
     * @param  App\Http\Requests\ProgramacaoUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramacaoUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the programacaos from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('programacaos.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('programacaos.index'))->with('message', 'Failed to delete');
    }
}
