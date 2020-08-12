<div class="card mt-6">
    <ul>
        @foreach($project->activity as $activity)
            <li class="text-xs {{ $loop->last ? '' : 'pb-2' }}">
                @include("projects.activity.{$activity->description }")
                <span class="text-muted-normal">{{ $activity->created_at->diffForHumans(null, true) }}</span>
            </li>
        @endforeach
    </ul>
</div>
