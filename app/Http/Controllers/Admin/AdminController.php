<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Stock;
use App\Models\Union;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {

        $currentUserId = Auth::user()->id;
        $currentUnionId = Auth::user()->union_id;
        $unionName = Union::find($currentUnionId);

        //January Month Report
        $janTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'jan')->sum('amount');
        $janPay = Distribution::where('union_id', $currentUnionId)->where('month', 'jan')->where('status', 1)->count();
        $janDue = $janTotal - $janPay;


        //February Month Report
        $febTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'feb')->sum('amount');
        $febPay = Distribution::where('union_id', $currentUnionId)->where('month', 'feb')->where('status', 1)->count();
        $febDue = $febTotal - $febPay;

        //march Month Report
        $marTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'mar')->sum('amount');
        $marPay = Distribution::where('union_id', $currentUnionId)->where('month', 'mar')->where('status', 1)->count();
        $marDue = $marTotal - $marPay;

        //April Month Report
        $aprTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'apr')->sum('amount');
        $aprPay = Distribution::where('union_id', $currentUnionId)->where('month', 'apr')->where('status', 1)->count();
        $aprDue = $aprTotal - $aprPay;

        //May Month Report
        $mayTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'may')->sum('amount');
        $mayPay = Stock::where('year', '2021')->where('month', 'may')->where('status', 1)->count();
        $mayDue = $mayTotal - $mayPay;

        //June Month Report
        $junTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'jun')->sum('amount');
        $junPay = Distribution::where('union_id', $currentUnionId)->where('month', 'jun')->where('status', 1)->count();
        $junDue = $junTotal - $junPay;

        //July Month Report
        $julTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'jul')->sum('amount');
        $julPay = Distribution::where('union_id', $currentUnionId)->where('month', 'jul')->where('status', 1)->count();
        $julDue = $julTotal - $julPay;

        //August Month Report
        $augTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'aug')->sum('amount');
        $augPay = Distribution::where('union_id', $currentUnionId)->where('month', 'aug')->where('status', 1)->count();
        $augDue = $augTotal - $augPay;

        //September Month Report
        $sepTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'sep')->sum('amount');
        $sepPay = Distribution::where('union_id', $currentUnionId)->where('month', 'sep')->where('status', 1)->count();
        $sepDue = $sepTotal - $sepPay;

        //October Month Report
        $octTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'oct')->sum('amount');
        $octPay = Distribution::where('union_id', $currentUnionId)->where('month', 'oct')->where('status', 1)->count();
        $octDue = $octTotal - $octPay;

        //November Month Report
        $novTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'nov')->sum('amount');
        $novPay = Distribution::where('union_id', $currentUnionId)->where('month', 'nov')->where('status', 1)->count();
        $novDue = $novTotal - $novPay;

        //December Month Report
        $decTotal = Stock::where('user_id', $currentUserId)->where('year', '2021')->where('month', 'dec')->sum('amount');
        $decPay = Distribution::where('union_id', $currentUnionId)->where('month', 'dec')->where('status', 1)->count();
        $decDue = $decTotal - $decPay;

        return view('backend.admin.dashboard', compact('janTotal', 'janPay', 'janDue', 'febTotal', 'febPay', 'febDue', 'marTotal', 'marDue', 'marPay',
            'aprTotal', 'aprPay', 'aprDue', 'mayTotal', 'mayDue', 'mayPay', 'junTotal', 'junPay', 'junDue', 'julTotal', 'julPay', 'julDue', 'augTotal', 'augPay', 'augDue',
            'sepDue', 'sepPay', 'sepTotal', 'octDue', 'octPay', 'octTotal', 'novDue', 'novPay', 'novTotal', 'decDue', 'decPay', 'decTotal','unionName'));


    }

}
