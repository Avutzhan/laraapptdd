@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4 px-3">
        <div class="flex items-end justify-between w-full">
            <p class="text-gray-500">
                <a href="/projects">My Projects</a> / {{ $project->title }}
            </p>


            <div class="flex items-center">
                @foreach($project->members as $member)
                    <img src="{{ gavatar_url($member->email) }}" alt="{{ $member->name }}'s avatar" class="rounded-full w-8 mr-1">
                @endforeach
                    <img src="{{ gavatar_url($project->owner->email) }}" alt="{{ $project->owner->name }}'s avatar" class="rounded-full w-8 mr-1">
                    <a href="{{ $project->path() . '/edit' }}" class="button ml-4">Edit Project</a>
            </div>
        </div>
    </header>

    <main>
        <div class="lg:flex">
            <div class="lg:w-3/4 px-3 mb-6">
                <div class="mb-8">
                    <h2 class="text-lg text-gray-500 mb-3">Tasks</h2>

                    @foreach($project->tasks as $task)


                        <div class="card mb-3">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf

                                <div class="flex">
                                    <input type="text" value="{{ $task->body }}" name="body" class="w-full {{ $task->completed ? 'text-gray-500' : '' }}">
                                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>

                            </form>
                        </div>
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

                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <textarea class="card w-full mb-4" style="min-height: 200px" placeholder="Write notes" name="notes">{{ $project->notes }}</textarea>
                        <button type="submit" class="button">Save</button>
                    </form>

                    @if($errors->any())

                        <div class="field mt-6">

                            @foreach($errors->all() as $error)
                                <li class="text-sm text-red-500">{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>

            <div class="lg:w-1/4 px-3">

                    @include('projects.card')

                @include('projects.activity.card')

            </div>
        </div>
    </main>


@endsection
