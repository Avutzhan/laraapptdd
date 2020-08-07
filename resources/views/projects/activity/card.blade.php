<div class="card">
    <ul>
        @foreach($project->activity as $activity)
            <li class="text-xs {{ $loop->last ? '' : 'mb-1' }}">
                @include("projects.activity.{$activity->description }")
                <span class="text-gray-500">{{ $activity->created_at->diffForHumans(null, true) }}</span>
                {{--                                @if( $activity->description === 'created' )--}}
                {{--                                    You created the project--}}
                {{--                                @elseif( $activity->description === 'created_task' )--}}
                {{--                                    You created a task--}}
                {{--                                @elseif( $activity->description === 'completed_task' )--}}
                {{--                                    You completed a task--}}
                {{--                                @else--}}
                {{--                                    {{ $activity->description }}--}}
                {{--                                @endif--}}
                {{--                                вместо этого мы сделали одну строку которая подгружает блейды динамически--}}
            </li>
        @endforeach
    </ul>
</div>
