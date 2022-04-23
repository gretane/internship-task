<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\IndexProjectRequest;

class ProjectController extends Controller
{
    const RESULTS_PER_PAGE = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexProjectRequest $request)
    {
         // search
    
         if ($request->search && 'all' == $request->search) {

            $projects = Project::where('title', 'like', '%' . $request->srch . '%')
            ->paginate(self::RESULTS_PER_PAGE)->withQueryString();
    
        } else {
    
            $projects = Project::paginate(self::RESULTS_PER_PAGE)->withQueryString();
        }
    
        return view('project.index', [
            'projects' => $projects,
            'srch' => $request->srch ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->title = $request->project_title;
        $project->total_groups = $request->groups_number;
        $project->max_students = $request->students_number;
        $project->save();
        return redirect()->route('project.index')->with('success_message', 'New project successfully added.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->title = $request->project_title;
        $project->total_groups = $request->groups_number;
        $project->max_students = $request->students_number;
        $project->save();
        return redirect()->route('project.index')->with('success_message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
       
        $project->delete();
        return redirect()->route('project.index')->with('success_message', 'Deletion succeeded.');
    }
}
