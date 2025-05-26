<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Removing the model import since we're not using the database
// use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        // Return the view directly without attempting to fetch from the database
        return view('events.index');
    }
}
