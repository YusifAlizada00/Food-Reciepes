<?php

namespace App\Http\Controllers;

use App\Models\FoodWithLikes;
use App\Models\Salad;
use Illuminate\Http\Request;
use App\Models\Food;
use Illuminate\Support\Facades\Http;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
    */public function index()
    {
        //$foodInfo = Food::all(); // or however you get your data
        $foods = Food::orderBy('created_at', 'DESC')->simplePaginate(21);
        return view('dashboard', [
            //'foodInfo' => $foodInfo,
            'foods' => $foods,
        ]);
    }

    public function internationalFood()
    {
        $userCountryId = auth()->user()->country_id;
        if($userCountryId == null)
        {
            abort(404);
        }
        $internationals = Food::where('cusine_id', '!=', $userCountryId)->simplePaginate(21);

        return view('dashboard', [
            'internationals' => $internationals,
        ]);
    }


    public function getTop100()
    {
        $foods = FoodWithLikes::orderBy('aggregateLikes', 'desc')->paginate(100);
        return view('dashboard', [
            'foods' => $foods,
        ]);
    }
    
    public function salads()
    {
        $salads = Salad::orderBy('name', 'DESC')->simplePaginate(24);
        return view('dashboard', [
            'salads' => $salads,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $foods = Food::where('title', 'like', '%' . $query . '%')->get();
        return view('dashboard', [
            'foods' => $foods,
            'query' => $query,
        ]);
    }

    // public function fruits()
    // {
    //     $fruits = 
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
