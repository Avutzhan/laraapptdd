<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
//    use TriggersActivity;
// we can make new trate for dinamically creating activity records but its now very hard to made
// we will add new trait and delete observers
// but using observers very simple

    protected $guarded = [];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }

    public function recordActivity($description)
    {
        $this->activity()->create(compact('description'));
    }
}
