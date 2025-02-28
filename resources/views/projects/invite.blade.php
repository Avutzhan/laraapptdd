<div class="card mb-4 flex-col mt-6">
    <h3 class="text-xl py-4 -ml-5 mb-3 border-l-4 border-accent-light pl-4">
        Invite a User
    </h3>

    <form method="POST" action="{{ $project->path() . '/invitations'}}">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="border border-muted-normal rounded w-full py-2 px-2" placeholder="Email address">
        </div>
        <button type="submit" class="text-xs text-gray-500 button">Invite</button>
    </form>
    @include('errors', ['bag' => 'invitations'])

</div>
