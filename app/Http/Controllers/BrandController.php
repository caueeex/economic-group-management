<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\EconomicGroup;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $brands = Brand::with(['economicGroup'])
            ->withCount('units')
            ->orderBy('name')
            ->paginate(10);

        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $economicGroups = EconomicGroup::orderBy('name')->get();
        return view('brands.create', compact('economicGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $brand = Brand::create($request->validated());

        return redirect()
            ->route('brands.index')
            ->with('success', 'Marca criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): View
    {
        $brand->load(['economicGroup', 'units.employees']);
        
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        $economicGroups = EconomicGroup::orderBy('name')->get();
        return view('brands.edit', compact('brand', 'economicGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update($request->validated());

        return redirect()
            ->route('brands.index')
            ->with('success', 'Marca atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        if ($brand->units()->count() > 0) {
            return redirect()
                ->route('brands.index')
                ->with('error', 'Não é possível excluir uma marca que possui unidades vinculadas.');
        }

        $brand->delete();

        return redirect()
            ->route('brands.index')
            ->with('success', 'Marca excluída com sucesso!');
    }
}
