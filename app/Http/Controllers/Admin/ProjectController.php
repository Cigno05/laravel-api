<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $types = Type::orderBy('name', 'asc')->get();

        $query = Project::with(['type', 'type.projects']); 
        // [associo 'type' a 'project', richiamo tutti 'projects' associati a 'type'

        $filters = $request->all();

        if(isset($filters['type_id'])) {
            $query->where('type_id', $filters['type_id']);
        }

        $projects = $query->get();

        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();
        $technologies = Technology::orderBy('name', 'asc')->get();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //La validazione la fa StoreProjectRequest

        // $request->validate([
        //     'title'=> 'required|max:200',
        //     'creation_date'=> 'required|date',
        //     'description'=> 'nullable',
        // ]);

        // $form_data = $request->all();

        $form_data = $request->validated();// per la validazione

        $new_project = new Project();

        $new_project->title = $form_data['title'];
        $new_project->slug = Str::slug($new_project->title);
        $new_project->link = 'https://github.com/Cigno05/'.(Str::slug($new_project->title));
        $new_project->creation_date = $form_data['creation_date'];
        $new_project->description = $form_data['description'];
        $new_project->type_id = $form_data['type_id'];
        
        $new_project->save();
        if ($request->has('technologies')) {

            $new_project->technologies()->attach($request->technologies);
        }
        
        return to_route("projects.index");
        
        //---------------------------------------------------------------------------------------------------------------------------------
        
        
        // $form_data = $request->validated();
        
        // // dd($form_data);

        // $base_slug = Str::slug($form_data['name']);
        // $slug = $base_slug;
        // // dd($form_data, $slug);
        // $n = 0;

        // do {
        //     // SELECT * FROM `projects` WHERE `slug` = ?
        //     $find = Project::where('slug', $slug)->first(); // null | Project

        //     if ($find !== null) {
        //         $n++;
        //         $slug = $base_slug . '-' . $n;
        //     }
        // } while ($find !== null);

        // $form_data['slug'] = $slug;

        // // creare l'istanza e salvarla nel db
        // $project = Project::create($form_data);

        // // controlliamo se sono stati inviati dei technologies
        // if ($request->has('technologies')) {
        //     $project->technologies()->attach($request->technologies);
        // }



        // // redirect alla rotta show
        // return to_route('admin.projects.show', $project);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::orderBy('name', 'asc')->get();
        $technologies = Technology::orderBy('name', 'asc')->get();
        // dd(compact('technologies'));
        return view("admin.projects.edit", compact("project", 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        // la validazione la fa UpdateProjectRequest

        // $request->validate([
        //     'title'=> 'required|max:200',
        //     'creation_date'=> 'required|date',
        //     'description'=> 'nullable',
        // ]);

        // $form_data = $request->all();

        $form_data = $request->validated();// per la validazione

        // $project->fill($form_data);
        // $project->slug = Str::slug($project->title);

        $project->title = $form_data['title'];
        $project->slug = Str::slug($project->title);
        $project->link = 'https://github.com/Cigno05';
        $project->creation_date = $form_data['creation_date'];
        $project->description = $form_data['description'];
        $project->type_id = $form_data['type_id'];


        $project->save();
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->sync([]);
        }
        return to_route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route("projects.index");
    }
}
