<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Shoutout;
use Illuminate\Http\Request;
use App\Events\ShoutoutAdded;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $shoutouts = Shoutout::orderBy('created_at', 'desc')->paginate(5);

        return view('index', compact('shoutouts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Shoutout::$rules);

        if ($validator->fails())
        {
            return response($validator->messages(), 422);
        }

        $shoutout = Shoutout::create($request->only('email', 'handle', 'content'));

        event(new ShoutoutAdded($shoutout));

        return response($shoutout, 201);
    }
}
