<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contributor;

class ContributorController extends Controller
{
    public function __construct(Contributor $contributor) {
        $this->contributor = $contributor;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // $contributors = $this->contributor::all();

        // dd($contributors);

        // $userable = $user->contributor;
        return response()->json(['success' => 'contributor index']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        return response()->json(['success' => 'contributor show']);
    }
}
