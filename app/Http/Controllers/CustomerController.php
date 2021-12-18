<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return View
     */
    public function create_tickets(): View
    {
        $services = Service::all();
        return view('layouts.customer', ['services' => $services]);
    }

    public function store_ticket(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $request->validate([
            'service_id' => ['required', 'exists:services,id'],
        ]);

        $tickets = Ticket::all()->where('')->last();
        $service_id = $request->post('service_id');
        $service = Service::find($service_id);
        $service_name = $service->name;
        $tickets_number = 0;
        if ($tickets !== null):
            $tickets_number = $tickets->number + 1;
        endif;

//        dd(
//            $request->all(),
//            $service,
//            $tickets,
//            $tickets_number,
//        );

        $ticket = Ticket::create([
            'user_id' => $user_id,
            'service_id' => $service_id,
            'status' => 'open',
            'number' => $tickets_number,
        ]);
//        dd(
//            $request->all(),
//            $service,
//            $tickets,
//            $ticket,
//            $tickets_number,
//        );

        // Msg
        $msg = 'New Reservation Booked Successfully.';
        // Pref
        $pref = "Your reservation number is $tickets_number !<br>Ticket Booked for : $service_name";
        $status = ['msg' => $msg, 'pref' => $pref];

        return redirect()->back()->with('success', $status);
    }

}
