<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsightController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $agesCounts = DB::table('people')
            ->select(DB::raw("
            COUNT(CASE WHEN age < 18 THEN 1 END) AS 'less_than_18',
            COUNT(CASE WHEN age BETWEEN 19 AND 30 THEN 1 END) AS '_19_to_30',
            COUNT(CASE WHEN age BETWEEN 31 AND 40 THEN 1 END) AS '_31_to_40',
            COUNT(CASE WHEN age BETWEEN 41 AND 50 THEN 1 END) AS '_41_to_50',
            COUNT(CASE WHEN age BETWEEN 51 AND 60 THEN 1 END) AS '_51_to_60',
            COUNT(CASE WHEN age BETWEEN 61 AND 70 THEN 1 END) AS '_61_to_70',
            COUNT(CASE WHEN age BETWEEN 71 AND 80 THEN 1 END) AS '_71_to_80',
            COUNT(CASE WHEN age BETWEEN 81 AND 90 THEN 1 END) AS '_81_to_90',
            COUNT(CASE WHEN age > 90 THEN 1 END) AS 'more_than_90'"
            ))->first();

        $agesArray = [$agesCounts->less_than_18, $agesCounts->_19_to_30, $agesCounts->_31_to_40, $agesCounts->_41_to_50, $agesCounts->_51_to_60, $agesCounts->_61_to_70, $agesCounts->_71_to_80, $agesCounts->_81_to_90, $agesCounts->more_than_90];


        $monthsCount = DB::table('people')
            ->select(DB::raw("
            COUNT(CASE WHEN MONTH(dob) = 1 THEN 1 END) AS 'january',
            COUNT(CASE WHEN MONTH(dob) = 2 THEN 1 END) AS 'february',
            COUNT(CASE WHEN MONTH(dob) = 3 THEN 1 END) AS 'march',
            COUNT(CASE WHEN MONTH(dob) = 4 THEN 1 END) AS 'april',
            COUNT(CASE WHEN MONTH(dob) = 5 THEN 1 END) AS 'may',
            COUNT(CASE WHEN MONTH(dob) = 6 THEN 1 END) AS 'june',
            COUNT(CASE WHEN MONTH(dob) = 7 THEN 1 END) AS 'july',
            COUNT(CASE WHEN MONTH(dob) = 8 THEN 1 END) AS 'august',
            COUNT(CASE WHEN MONTH(dob) = 9 THEN 1 END) AS 'september',
            COUNT(CASE WHEN MONTH(dob) = 10 THEN 1 END) AS 'october',
            COUNT(CASE WHEN MONTH(dob) = 11 THEN 1 END) AS 'november',
            COUNT(CASE WHEN MONTH(dob) = 12 THEN 1 END) AS 'december'"
            ))->first();

        $monthsCountArray = [$monthsCount->january, $monthsCount->february, $monthsCount->march, $monthsCount->april, $monthsCount->may, $monthsCount->june, $monthsCount->july, $monthsCount->august, $monthsCount->september, $monthsCount->october, $monthsCount->november, $monthsCount->december];


        return view('insight', compact('agesArray', 'monthsCountArray'));
    }
}
