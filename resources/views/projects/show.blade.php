@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4 px-3">
        <div class="flex items-end justify-between w-full">
            <p class="text-gray-500">
                <a href="/projects">My Projects</a> / {{ $project->title }}
            </p>


            <a href="/projects/create" class="button">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 mb-3">Tasks</h2>

                    @foreach($project->tasks as $task)
                        <div class="card mb-3">{{ $task->body }}</div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            @csrf
                            <input type="text" placeholder="Add a new task..." class="w-full" name="body">
                        </form>
                    </div>
                </div>

                <div>
                    <h2 class="text-lg text-gray-500 mb-3">General Notes</h2>
                    <textarea class="card w-full" style="min-height: 200px">Lorem ipsum.</textarea>
                </div>

            </div>

            <div class="lg:w-1/4 px-3">
                <div class="card">
                    @include('projects.card')
                </div>
            </div>
        </div>
    </main>


@endsection
