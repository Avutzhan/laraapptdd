@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex items-end justify-between w-full">
            <h2 class="text-muted-normal text-base font-light">My Projects</h2>
            <a href="/projects/create" class="button" @click.prevent="$modal.show('new-project')">New Project</a>
        </div>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
            <div class="lg:w-1/3 px-3 pb-6">
                @include('projects.card')
            </div>


        @empty
            <div class="ml-3">No projects yet.</div>
        @endforelse
    </main>

    <new-project-modal></new-project-modal>

@endsection
