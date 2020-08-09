    <div class="card mb-4" style="height: 200px">
        <h3 class="text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-300 pl-4">
            <a href="{{ $project->path() }}">{{ $project->title }}</a>
        </h3>

        <div class="text-gray-500 mb-4">{{  str_limit($project->description, 50)  }}</div>

        <footer>
            <form method="POST" action="{{ $project->path() }}" class="text-right">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-xs text-gray-500">Delete</button>
            </form>
        </footer>
    </div>
