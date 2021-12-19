<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
//        $tickets = Reservation::with(['ticket', 'ticket.user', 'ticket.service']);
        $tickets = Reservation::with(['ticket.user', 'ticket.service']);
/*        if ($tickets->count() > 0):
//            $service=$tickets->;
        endif;*/

        // Get Nested Relations
/*        dd(
            $tickets->get(),
            $tickets->first()->getRelation('ticket'),
            $tickets->first()->getRelation('ticket')->getRelation('user'),
            $tickets->first()->getRelation('ticket')->getRelation('service'),
        );*/
        return response()->view('layouts.employee', ['tickets' => $tickets->get()]);
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
}
