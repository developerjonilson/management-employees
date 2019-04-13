<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contributor;
use App\Schedule;

class ScheduleController extends Controller
{
    public function __construct(User $user, Contributor $contributor,Schedule $schedule) {
        $this->contributor = $contributor;
        $this->user = $user;
        $this->schedule = $schedule;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id) {
        $contributor = $this->contributor::findOrFail($id);
        $schedules = $contributor->schedules;
        $contributor->user;

        return response()->json(['contributor_schedules' => $contributor], 200);
    }

    /**
     * Store a new schedule for a particular employee in the database.
     */
    public function store(Request $request) {
        $schedule = $this->schedule->create([
            'contributor_id' => $request->get('contributor_id'),
            'date' => $request->get('date'),
            'schedule' => $request->get('schedule')
        ]);

        return response()->json(['success'=>true, 'schedule' => $schedule], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $schedule = $this->schedule::findOrFail($id);
        $schedule->contributor->user;

        return response()->json(['schedule' => $schedule], 200);
    }
    
    /**
     * export of schedules per employee in AFD format.
     */
    public function export($id) {     
        $contributor = $this->contributor::findOrFail($id);
        $schedules = $contributor->schedules;
        $contributor->user;

        //fazer exportação

        return response()->json(['to_do' => 'fazer exportação'], 200);
    }
}
