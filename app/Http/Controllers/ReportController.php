<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EconomicGroup;
use App\Models\Brand;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ReportController extends Controller
{
    /**
     * Display the reports dashboard.
     */
    public function index(): View
    {
        $stats = [
            'total_employees' => Employee::count(),
            'total_units' => Unit::count(),
            'total_brands' => Brand::count(),
            'total_economic_groups' => EconomicGroup::count(),
        ];

        return view('reports.index', compact('stats'));
    }

    /**
     * Display the employees report with filters.
     */
    public function employees(Request $request): View
    {
        $query = Employee::with(['unit.brand.economicGroup']);

        // Aplicar filtros
        if ($request->filled('economic_group_id')) {
            $query->whereHas('unit.brand.economicGroup', function ($q) use ($request) {
                $q->where('id', $request->economic_group_id);
            });
        }

        if ($request->filled('brand_id')) {
            $query->whereHas('unit.brand', function ($q) use ($request) {
                $q->where('id', $request->brand_id);
            });
        }

        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->unit_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('cpf', 'like', "%{$search}%");
            });
        }

        $employees = $query->orderBy('name')->paginate(15);

        // Dados para os filtros
        $economicGroups = EconomicGroup::orderBy('name')->get();
        $brands = Brand::with('economicGroup')->orderBy('name')->get();
        $units = Unit::with('brand.economicGroup')->orderBy('fantasy_name')->get();

        return view('reports.employees', compact('employees', 'economicGroups', 'brands', 'units'));
    }

    /**
     * Export employees report to CSV.
     */
    public function exportEmployees(Request $request)
    {
        try {
            $filters = $request->only(['economic_group_id', 'brand_id', 'unit_id', 'search']);
            
            $query = Employee::with(['unit.brand.economicGroup']);

            // Aplicar filtros
            if (!empty($filters['economic_group_id'])) {
                $query->whereHas('unit.brand.economicGroup', function ($q) use ($filters) {
                    $q->where('id', $filters['economic_group_id']);
                });
            }

            if (!empty($filters['brand_id'])) {
                $query->whereHas('unit.brand', function ($q) use ($filters) {
                    $q->where('id', $filters['brand_id']);
                });
            }

            if (!empty($filters['unit_id'])) {
                $query->where('unit_id', $filters['unit_id']);
            }

            if (!empty($filters['search'])) {
                $search = $filters['search'];
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('cpf', 'like', "%{$search}%");
                });
            }

            $employees = $query->orderBy('name')->get();

            $filename = 'relatorio_funcionarios_' . date('Y-m-d_H-i-s') . '.csv';
            
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($employees) {
                $file = fopen('php://output', 'w');
                
                // Cabeçalhos
                fputcsv($file, [
                    'ID',
                    'Nome',
                    'E-mail',
                    'CPF',
                    'Unidade',
                    'Nome Fantasia',
                    'Razão Social',
                    'CNPJ',
                    'Marca',
                    'Grupo Econômico',
                    'Data de Cadastro'
                ]);

                // Dados
                foreach ($employees as $employee) {
                    fputcsv($file, [
                        $employee->id,
                        $employee->name,
                        $employee->email,
                        $employee->cpf,
                        $employee->unit->fantasy_name ?? '-',
                        $employee->unit->corporate_name ?? '-',
                        $employee->unit->cnpj ?? '-',
                        $employee->unit->brand->name ?? '-',
                        $employee->unit->brand->economicGroup->name ?? '-',
                        $employee->created_at->format('d/m/Y H:i:s'),
                    ]);
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao exportar relatório: ' . $e->getMessage());
        }
    }

    /**
     * Display the units report.
     */
    public function units(): View
    {
        $units = Unit::with(['brand.economicGroup'])
            ->withCount('employees')
            ->orderBy('fantasy_name')
            ->paginate(15);

        return view('reports.units', compact('units'));
    }

    /**
     * Display the brands report.
     */
    public function brands(): View
    {
        $brands = Brand::with(['economicGroup'])
            ->withCount('units')
            ->withCount(['units as total_employees' => function ($query) {
                $query->withCount('employees');
            }])
            ->orderBy('name')
            ->paginate(15);

        return view('reports.brands', compact('brands'));
    }

    /**
     * Display the economic groups report.
     */
    public function economicGroups(): View
    {
        $economicGroups = EconomicGroup::withCount('brands')
            ->withCount(['brands as total_units' => function ($query) {
                $query->withCount('units');
            }])
            ->withCount(['brands as total_employees' => function ($query) {
                $query->withCount(['brands as total_employees' => function ($q) {
                    $q->withCount('employees');
                }]);
            }])
            ->orderBy('name')
            ->paginate(15);

        return view('reports.economic-groups', compact('economicGroups'));
    }

    /**
     * Export units report to CSV.
     */
    public function exportUnits(Request $request)
    {
        try {
            $units = Unit::with(['brand.economicGroup'])
                ->withCount('employees')
                ->orderBy('fantasy_name')
                ->get();

            $filename = 'relatorio_unidades_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($units) {
                $file = fopen('php://output', 'w');
                fputcsv($file, [
                    'ID', 'Nome Fantasia', 'Razão Social', 'CNPJ', 'Marca', 'Grupo Econômico', 'Funcionários', 'Data de Criação'
                ]);
                foreach ($units as $unit) {
                    fputcsv($file, [
                        $unit->id,
                        $unit->fantasy_name,
                        $unit->corporate_name,
                        $unit->cnpj,
                        $unit->brand->name ?? '-',
                        $unit->brand->economicGroup->name ?? '-',
                        $unit->employees_count ?? 0,
                        $unit->created_at->format('d/m/Y H:i'),
                    ]);
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao exportar relatório: ' . $e->getMessage());
        }
    }

    /**
     * Export brands report to CSV.
     */
    public function exportBrands(Request $request)
    {
        try {
            $brands = Brand::with(['economicGroup'])
                ->withCount('units')
                ->withCount(['units as total_employees' => function ($query) {
                    $query->withCount('employees');
                }])
                ->orderBy('name')
                ->get();

            $filename = 'relatorio_marcas_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($brands) {
                $file = fopen('php://output', 'w');
                fputcsv($file, [
                    'ID', 'Nome da Marca', 'Grupo Econômico', 'Unidades', 'Funcionários', 'Data de Criação'
                ]);
                foreach ($brands as $brand) {
                    fputcsv($file, [
                        $brand->id,
                        $brand->name,
                        $brand->economicGroup->name ?? '-',
                        $brand->units_count ?? 0,
                        $brand->total_employees ?? 0,
                        $brand->created_at->format('d/m/Y H:i'),
                    ]);
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao exportar relatório: ' . $e->getMessage());
        }
    }

    /**
     * Export economic groups report to CSV.
     */
    public function exportEconomicGroups(Request $request)
    {
        try {
            $economicGroups = EconomicGroup::withCount('brands')
                ->withCount(['brands as total_units' => function ($query) {
                    $query->withCount('units');
                }])
                ->withCount(['brands as total_employees' => function ($query) {
                    $query->withCount(['units as employee_count' => function ($q) {
                        $q->withCount('employees');
                    }]);
                }])
                ->orderBy('name')
                ->get();

            $filename = 'relatorio_grupos_economicos_' . date('Y-m-d_H-i-s') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];

            $callback = function() use ($economicGroups) {
                $file = fopen('php://output', 'w');
                fputcsv($file, [
                    'ID', 'Nome do Grupo', 'CNPJ', 'Marcas', 'Unidades', 'Funcionários', 'Data de Criação'
                ]);
                foreach ($economicGroups as $group) {
                    fputcsv($file, [
                        $group->id,
                        $group->name,
                        $group->cnpj,
                        $group->brands_count ?? 0,
                        $group->total_units ?? 0,
                        $group->total_employees ?? 0,
                        $group->created_at->format('d/m/Y H:i'),
                    ]);
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao exportar relatório: ' . $e->getMessage());
        }
    }
}
