<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contributor;

class ContributorController extends Controller
{
    public function __construct(Contributor $contributor, User $user) {
        $this->contributor = $contributor;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $contributors = $this->contributor::all();

        $users = collect();
        foreach ($contributors as $contributor) {
            $contributor->push($contributor->user);
            $users->push($contributor);
        }

        return response()->json(['contributors' => $users], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $contributor = $this->contributor::findOrFail($id);
        $contributor->user;

        return response()->json(['contributor' => $contributor], 200);
    }
}
