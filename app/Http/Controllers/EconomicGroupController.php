<?php

namespace App\Http\Controllers;

use App\Models\EconomicGroup;
use App\Http\Requests\StoreEconomicGroupRequest;
use App\Http\Requests\UpdateEconomicGroupRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EconomicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $economicGroups = EconomicGroup::withCount('brands')
            ->orderBy('name')
            ->paginate(10);

        return view('economic-groups.index', compact('economicGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('economic-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEconomicGroupRequest $request): RedirectResponse
    {
        $economicGroup = EconomicGroup::create($request->validated());

        return redirect()
            ->route('economic-groups.index')
            ->with('success', 'Grupo econômico criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EconomicGroup $economicGroup): View
    {
        $economicGroup->load(['brands.units.employees']);
        
        return view('economic-groups.show', compact('economicGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EconomicGroup $economicGroup): View
    {
        return view('economic-groups.edit', compact('economicGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEconomicGroupRequest $request, EconomicGroup $economicGroup): RedirectResponse
    {
        $economicGroup->update($request->validated());

        return redirect()
            ->route('economic-groups.index')
            ->with('success', 'Grupo econômico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EconomicGroup $economicGroup): RedirectResponse
    {
        if ($economicGroup->brands()->count() > 0) {
            return redirect()
                ->route('economic-groups.index')
                ->with('error', 'Não é possível excluir um grupo econômico que possui marcas vinculadas.');
        }

        $economicGroup->delete();

        return redirect()
            ->route('economic-groups.index')
            ->with('success', 'Grupo econômico excluído com sucesso!');
    }
}
