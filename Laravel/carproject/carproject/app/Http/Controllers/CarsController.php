<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Using the Eloquent model to read in the data
        // $cars = Car::all();
        // return view('cars.index', [
        //     'cars' => $cars
        // ]);

        // Here we are filtering for a specific car in the database 
        // $cars = Car::where('name', '=', 'Audi')
        // ->get();

        // Here we use chunking to conserve resource use
        // $cars = Car::chunk(2, function($cars) {
        //     foreach($cars as $car) {
        //         print_r($car);
        //     }
        // });

        // $cars = Car::where('name', '=', 'Tesla') // If we are looking for something that is not in our database we will be taken to the error 404 page
        // ->firstOrFail();
        // print_r(Car::avg('founded'));

        $cars = Car::all();

        return view('cars.index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Inserting a record into the database         --- WAY 1 --- [Passing in properties]
        // $car = new Car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();

        // Inserting a record into the database         ---- Way 2 ---- [Using an array to pass in  properties]
        $car = Car::create([ //We can replace create with make, but then we are going to have to run the save method to save it to the database
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $car = Car::find($id)->first();
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::where('id', $id)
            ->update([ 
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);

        return redirect('/cars');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id) // This is one way of deleting records in the database
    // {
    //     $car = Car::find($id)->first();
    //     $car->delete();
    //     return redirect('/cars');


    // }

    public function destroy(Car $car) // This is second way of deleting records in the database
    {
        $car->delete();
        return redirect('/cars');
    }
}
 