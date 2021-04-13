<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Stock;
use App\Models\Union;
use Auth;

class AdminController extends Controller
{
    public function index()
    {

        $currentUserId = Auth::user()->id;
        $currentUnionId = Auth::user()->union_id;
        $unionName = Union::find($currentUnionId);

        //January Month Report
        $janTotal = Stock::where('user_id', $currentUserId)->where('month', 'january')->sum('amount');
        $janPay = Distribution::where('union_id', $currentUnionId)->where('month', 'january')->where('status', 1)->count();
        $janDue = $janTotal - $janPay;


        //February Month Report
        $febTotal = Stock::where('user_id', $currentUserId)->where('month', 'february')->sum('amount');
        $febPay = Distribution::where('union_id', $currentUnionId)->where('month', 'february')->where('status', 1)->count();
        $febDue = $febTotal - $febPay;

        //march Month Report
        $marTotal = Stock::where('user_id', $currentUserId)->where('month', 'march')->sum('amount');
        $marPay = Distribution::where('union_id', $currentUnionId)->where('month', 'march')->where('status', 1)->count();
        $marDue = $marTotal - $marPay;

        //April Month Report
        $aprTotal = Stock::where('user_id', $currentUserId)->where('month', 'april')->sum('amount');
        $aprPay = Distribution::where('union_id', $currentUnionId)->where('month', 'april')->where('status', 1)->count();
        $aprDue = $aprTotal - $aprPay;

        //May Month Report
        $mayTotal = Stock::where('user_id', $currentUserId)->where('month', 'may')->sum('amount');
        $mayPay = Stock::where('year', '2021')->where('month', 'may')->where('status', 1)->count();
        $mayDue = $mayTotal - $mayPay;

        //June Month Report
        $junTotal = Stock::where('user_id', $currentUserId)->where('month', 'jun')->sum('amount');
        $junPay = Distribution::where('union_id', $currentUnionId)->where('month', 'jun')->where('status', 1)->count();
        $junDue = $junTotal - $junPay;

        //July Month Report
        $julTotal = Stock::where('user_id', $currentUserId)->where('month', 'jul')->sum('amount');
        $julPay = Distribution::where('union_id', $currentUnionId)->where('month', 'july')->where('status', 1)->count();
        $julDue = $julTotal - $julPay;

        //August Month Report
        $augTotal = Stock::where('user_id', $currentUserId)->where('month', 'aug')->sum('amount');
        $augPay = Distribution::where('union_id', $currentUnionId)->where('month', 'august')->where('status', 1)->count();
        $augDue = $augTotal - $augPay;

        //September Month Report
        $sepTotal = Stock::where('user_id', $currentUserId)->where('month', 'september')->sum('amount');
        $sepPay = Distribution::where('union_id', $currentUnionId)->where('month', 'september')->where('status', 1)->count();
        $sepDue = $sepTotal - $sepPay;

        //October Month Report
        $octTotal = Stock::where('user_id', $currentUserId)->where('month', 'october')->sum('amount');
        $octPay = Distribution::where('union_id', $currentUnionId)->where('month', 'october')->where('status', 1)->count();
        $octDue = $octTotal - $octPay;

        //November Month Report
        $novTotal = Stock::where('user_id', $currentUserId)->where('month', 'november')->sum('amount');
        $novPay = Distribution::where('union_id', $currentUnionId)->where('month', 'november')->where('status', 1)->count();
        $novDue = $novTotal - $novPay;

        //December Month Report
        $decTotal = Stock::where('user_id', $currentUserId)->where('month', 'december')->sum('amount');
        $decPay = Distribution::where('union_id', $currentUnionId)->where('month', 'december')->where('status', 1)->count();
        $decDue = $decTotal - $decPay;

        return view('backend.admin.dashboard', compact('janTotal', 'janPay', 'janDue', 'febTotal', 'febPay', 'febDue', 'marTotal', 'marDue', 'marPay',
            'aprTotal', 'aprPay', 'aprDue', 'mayTotal', 'mayDue', 'mayPay', 'junTotal', 'junPay', 'junDue', 'julTotal', 'julPay', 'julDue', 'augTotal', 'augPay', 'augDue',
            'sepDue', 'sepPay', 'sepTotal', 'octDue', 'octPay', 'octTotal', 'novDue', 'novPay', 'novTotal', 'decDue', 'decPay', 'decTotal', 'unionName'));


    }

}
