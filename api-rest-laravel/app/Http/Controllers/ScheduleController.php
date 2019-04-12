<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function __construct(Schedule $schedule) {
        $this->schedule = $schedule;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return response()->json(['success'=>'index schedule'], 200);
    }

    /**
     * Store a new schedule for a particular employee in the database.
     */
    public function store(Request $request)
    {
        return response()->json(['success'=>'store schedule'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return response()->json(['success'=>'show schedule'], 200);
    }
}
