<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PDF;



class ProjectController extends Controller
{
    //
    public function index():Renderable
    {
        $projects= Project::paginate();
        return view('projects.index',compact('projects'));
    }

    public function create():Renderable
    {
        $project= new Project;
        $title= __('Crear proyecto');
        $action = route('projects.store');
        $buttonText = __('Crear proyecto');
        return view('projects.form',compact('project','title','action','buttonText'));
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'              => 'required|unique:projects,name|string|max:100',
            'source_fund'       => 'required|string|max:150',
            'planned_amount'    => 'required|numeric|min:1|max:999999999999',
            'sponsored_amount'  => 'required|numeric|min:1|max:999999999999',
            'own_amount'        => 'required|numeric|min:1|max:999999999999',
        ]);

        Project::create([
            'name' => $request->string('name'),
            'source_fund' => $request->string('source_fund'),
            'planned_amount' => $request->input('planned_amount'),
            'sponsored_amount' => $request->input('sponsored_amount'),
            'own_amount' => $request->input('own_amount'),
        ]);
        return redirect()->route('projects.index');
    }

    public function show(Project $project): Renderable
    {
        $project->load('user:id,name');
        return view('projects.show', compact('project'));
    }
    public function edit(Project $project): Renderable
    {
        $title = __('Editar proyecto');
        $action = route('projects.update', $project);
        $buttonText = __('Actualizar proyecto');
        $method = 'PUT';
        return view('projects.form', compact('project', 'title', 'action', 'buttonText', 'method'));
    }
    public function update(Request $request, Project $project): RedirectResponse
    {
        $request->validate([
            'name'              => 'unique:projects,name,' . $project->id . '|string|max:100',
            'source_fund'       => 'string|max:150',
            'planned_amount'    => 'numeric|min:1|max:999999999999',
            'sponsored_amount'  => 'numeric|min:1|max:999999999999',
            'own_amount'        => 'numeric|min:1|max:999999999999',
        ]);

        $project->update([
            'name' => $request->string('name'),
            'source_fund' => $request->string('source_fund'),
            'planned_amount' => $request->input('planned_amount'),
            'sponsored_amount' => $request->input('sponsored_amount'),
            'own_amount' => $request->input('own_amount'),
        ]);
        return redirect()->route('projects.index');
    }
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    public function getPDF(){
        $entidad="Ministerio de Justicia y Seguridad Pública";
        $hoy= date("d-m-Y h:i A");
        $projects= Project::all();
        $pdf=PDF::loadView('projects_pdf',compact('projects','entidad','hoy'))->setOption('fontDir', public_path('/assets/fonts'));;
        return $pdf->stream('projects.pdf');
    }

    public function graph()
    {
        $d = Project::select(DB::raw("SUM(planned_amount) as planned_amount"), DB::raw("SUM(sponsored_amount) as sponsored_amount"),DB::raw("SUM(own_amount) as own_amount"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->get()
        ->toArray();

        $labels = array_column($d, 'month_name');
        $data = array_column($d, 'planned_amount');
        $data2 = array_column($d, 'sponsored_amount');
        $data3 = array_column($d, 'own_amount');

        return view('dashboard', compact('labels', 'data', 'data2','data3'));
    }

}
