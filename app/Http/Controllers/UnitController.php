<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $units = Unit::with(['brand.economicGroup'])
            ->withCount('employees')
            ->orderBy('fantasy_name')
            ->paginate(10);

        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $brands = Brand::with('economicGroup')->orderBy('name')->get();
        return view('units.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUnitRequest $request): RedirectResponse
    {
        $unit = Unit::create($request->validated());

        return redirect()
            ->route('units.index')
            ->with('success', 'Unidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit): View
    {
        $unit->load(['brand.economicGroup', 'employees']);
        
        return view('units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit): View
    {
        $brands = Brand::with('economicGroup')->orderBy('name')->get();
        return view('units.edit', compact('unit', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUnitRequest $request, Unit $unit): RedirectResponse
    {
        $unit->update($request->validated());

        return redirect()
            ->route('units.index')
            ->with('success', 'Unidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit): RedirectResponse
    {
        if ($unit->employees()->count() > 0) {
            return redirect()
                ->route('units.index')
                ->with('error', 'Não é possível excluir uma unidade que possui funcionários vinculados.');
        }

        $unit->delete();

        return redirect()
            ->route('units.index')
            ->with('success', 'Unidade excluída com sucesso!');
    }
}
