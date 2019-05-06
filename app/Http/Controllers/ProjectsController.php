<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Illuminate\Validation\ValidationException;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('projects.index', ['projects' => Project::latest()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        DB::table('projects')->insert([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "created_at" => DB::raw('now()')
        ]);*/
        /*$project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->save();*/

        $project = Project::create($request->all());
        if(auth()->check()){
            auth()->user()->projects()->save($project);
        }

        return back(301)->with('projectstored', __('The proyect was sucessfully stored on the database'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        /*$projects = Project::all();
        foreach ($projects as $project) {
            if ($project['id'] == $id) {
                $match = [
                    'id' => $project['id'],
                    'title' => $project['title'],
                    'description' => $project['description'],
                    'created_at' => $project['created_at']
                ];
                return view('projects.show', ['match' => $match]);
            }
        }*/
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        /*DB::table('projects')->where('id', $id)->update([
            "title" => $request->input('title'),
            "description" => $request->input('description'),
            "updated_at" => DB::raw('now()')
        ]);*/

        Project::findOrFail($id)->update($request->all());
        return redirect('projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return redirect('projects');
    }
}
