<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FotoService;
use App\Http\Requests\FotoCreateRequest;
use App\Http\Requests\FotoUpdateRequest;

class FotosController extends Controller
{
    public function __construct(FotoService $foto_service)
    {
        $this->service = $foto_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fotos = $this->service->paginated();
        return view('fotos.index')->with('fotos', $fotos);
    }

    /**
     * Display a listing of the resource searched.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $fotos = $this->service->search($request->search);
        return view('fotos.index')->with('fotos', $fotos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fotos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\FotoCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FotoCreateRequest $request)
    {
        $result = $this->service->create($request->except('_token'));

        if ($result) {
            return redirect(route('fotos.edit', ['id' => $result->id]))->with('message', 'Successfully created');
        }

        return redirect(route('fotos.index'))->with('message', 'Failed to create');
    }

    /**
     * Display the foto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = $this->service->find($id);
        return view('fotos.show')->with('foto', $foto);
    }

    /**
     * Show the form for editing the foto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foto = $this->service->find($id);
        return view('fotos.edit')->with('foto', $foto);
    }

    /**
     * Update the fotos in storage.
     *
     * @param  App\Http\Requests\FotoUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FotoUpdateRequest $request, $id)
    {
        $result = $this->service->update($id, $request->except('_token'));

        if ($result) {
            return back()->with('message', 'Successfully updated');
        }

        return back()->with('message', 'Failed to update');
    }

    /**
     * Remove the fotos from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->service->destroy($id);

        if ($result) {
            return redirect(route('fotos.index'))->with('message', 'Successfully deleted');
        }

        return redirect(route('fotos.index'))->with('message', 'Failed to delete');
    }
}
