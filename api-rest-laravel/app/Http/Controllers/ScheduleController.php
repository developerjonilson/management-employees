<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class ScheduleController extends Controller
{
    public function __construct(Schedule $schedule) {
        // $this->middleware('auth');
        $this->schedule = $schedule;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['success'], 200);
    }

    /**
     * Store a new schedule for a particular employee in the database.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in the database.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource in the database.
     */
    public function destroy($id)
    {
        //
    }
}
