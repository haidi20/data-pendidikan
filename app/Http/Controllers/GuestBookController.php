<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Necessity;
use App\Guest_book;
use App\Guest_group;

use Carbon\Carbon;

class GuestBookController extends Controller
{
    public function index()
    {
        $necessity  = Necessity::all();
        $guestGroup = Guest_group::all();
    
        $dayNow     = config('library.day.'.Carbon::now()->format('L'));
        $dateNow    = $dayNow.', '.Carbon::now()->format('d F Y');

        $guestRecap = $this->guestRecap();

        return view('guest_book.index', compact('necessity', 'guestGroup', 'dateNow', 'guestRecap'));    
    }

    public function guestRecap()
    {
        $data       = [];
        $dateNow    = Carbon::now()->format('Y-m-d');
        $endWeek    = Carbon::now()->endOfWeek();
        $monthNow   = Carbon::now()->format('m');
        $startWeek  = Carbon::now()->startOfWeek();

        $guestGroup = Guest_group::all();

        foreach ($guestGroup as $index => $item) {
            $day            = Guest_book::whereDate('created_at', $dateNow);
            $allPerDay      = $day->count();                
            $dayPerGroup    = $day->baseGuestGroup($item->id)->count();

            $week           = Guest_book::whereBetween('created_at', [$startWeek, $endWeek]);
            $allPerWeek     = $week->count();
            $weekPerGroup   = $week->baseGuestGroup($item->id)->count();

            $month          = Guest_book::whereMonth('created_at', $monthNow);
            $allPerMonth    = $month->count();
            $monthPerGroup  = $month->baseGuestGroup($item->id)->count();


            $data[$item->id]['day']     = $this->persen($dayPerGroup, $allPerDay);
            $data[$item->id]['week']    = $this->persen($weekPerGroup, $allPerWeek);
            $data[$item->id]['month']   = $this->persen($monthPerGroup, $allPerMonth);
        }

        return $data; 
    }

    public function persen($singleValue, $allValue)
    {
        $result = ($singleValue / $allValue) * 100;
        $result = round($result).'%';

        return $singleValue.' | '.$result;
    }

    public function send()
    {
        $guestBook = new Guest_book;
        $guestBook->name = request('name');
        $guestBook->necessity_id = request('necessity');
        $guestBook->guest_group_id = request('guest_group');
        $guestBook->save();

        $message = 'Data Buku Tamu Telah Ditambahkan';
        session()->flash('message', $message);

        return redirect()->back();
    }
}
