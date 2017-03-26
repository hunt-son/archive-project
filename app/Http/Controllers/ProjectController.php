<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('welcome', compact('projects'));
    }
    public function store() {
        $this->validate(request(), [
            'name' => 'required|unique:projects|min:4',
            'url' => 'required|unique:projects|url',
            'email' => 'required|email',
            'description' => 'required|min:3',
            'language' => 'required|min:3'
        ]);
        Project::create([
            'name' => request('name'),
            'url' => request('url'),
            'email' => request('email'),
            'description' => request('description'),
            'language' => request('language')
        ]);
        return redirect('/');
    }
}
