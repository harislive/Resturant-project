<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservaStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $table =  Table::where('status', TableStatus::available)->get();
        return view('admin.reservation.create',compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservaStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guest_number > $table->guest_number)
        {
         return back()->with('warning','Please Choose a Table base on guests');
        }
        $request_date = Carbon::parse($request->res_date);

        foreach ($table->reservations as $res) {

            $resDateCarbon = Carbon::parse($res->res_date);

            if ($resDateCarbon->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        Reservation::create($request->validated());
        return to_route('admin.reservation.index')->with('success','Reservation Has Created');
    }


    public function edit(Reservation $reservation)
    {
        $table = Table::where('status',TableStatus::available)->get();
        return view('admin.reservation.edit',compact('reservation','table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservaStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning','This Table is already reserved.');
        }
        $requestdates = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($table->reservations as $res)
        {
            $resDateCarbon = Carbon::parse($res->res_date);
            if($resDateCarbon->format('Y-m-d')==$requestdates->format('Y-m-d'));
            return back()->with('warning','This Table already exists. try new date');
        }
        $reservation->update($request->validated());
        return to_route('admin.reservation.index')->with('succuss','Reservation data has been updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservation.index')->with('danger','data has been deleted');
    }
}
