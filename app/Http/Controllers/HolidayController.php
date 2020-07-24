<?php

namespace App\Http\Controllers;

use App\Holiday;
use Barryvdh\DomPDF\Facade as PDF;
use FontLib\Table\Type\name;
use GuzzleHttp\Client;

//use PDF;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        $client = new Client();
        //  https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=2022&country=zaf&holidayType=public_holiday
        $given_year = $input['year'];

        $holidays = Holiday::where('day', '>=', $given_year . '/01/01')
            ->where('day', '<=', $given_year . '/12/31')
            ->get();
//dd($holidays);

        if ($holidays->count() == 0) {


            $res = $client->request('GET', 'https://kayaposoft.com/enrico/json/v2.0/?action=getHolidaysForYear&year=' . $given_year . '&country=zaf&holidayType=public_holiday');
            $statusCode = $res->getStatusCode();

            if ($statusCode == 200) {

                $f_data = json_decode($res->getBody(), true);
                //
                foreach ($f_data as $item) {
                    $item['day'] = $item['date']['year'] . '/' . $item['date']['month'] . '/' . $item['date']['day'];
                    $item['name'] = $item['name'][0]['text']; // pluck out the name only discard everything. and also take first name only
                    Holiday::create($item);
                }

                $holidays = Holiday::where('day', '>=', $given_year . '/01/01')
                    ->where('day', '<=', $given_year . '/12/31')
                    ->get();

                //$pdf = Holiday::loadView('pdf', compact('holidays'));

            }


        }
        return view('holidays', ['holidays' => $holidays, 'year' =>$given_year]);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function download($year)
    {
        //

        $holidays = Holiday::where('day', '>=', $year . '/01/01')
            ->where('day', '<=', $year . '/12/31')
            ->get();
        $pdf  =  PDF::loadView('pdf', array('holidays' => $holidays, 'year' => $year));

        return $pdf->download('pdf.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit(Holiday $holiday)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holiday $holiday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holiday $holiday)
    {
        //
    }
}
