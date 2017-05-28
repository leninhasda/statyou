<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use App\Helpers\Paginator;
use Carbon\Carbon;

class ApiController extends Controller
{
    //
    public function index(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
        $date = $request->get('date');

        if ( ! $user) {
            return [
                'error' => true,
                'messgae' => 'content not available!'
            ];
        }

        if ( ! $user->hasStatus()) {
            $statuses = [];
        }
        else {
            if ( ! $date ) {
                $date = $user->getLastPublicStatusDate();
            }
            else {
                $date = new Carbon($date);
            }

            $statuses = $user->publicStatusOfDate($date);
            $allOtherDates = Status::getAllPublicDate($user->id);

            $paginator = new Paginator($allOtherDates, $date, [
                    'url' => $request->path()
                ]);

            // return $paginator->currentDate;
        }

        return response()->json([
            'user' => $user,
            'status' => $statuses,
            'pagination' => $this->makePagination($request->url(), $paginator),
            // 'paginaton' => [
            //     'base_url' => $request->url(),
            //     'paginator' => $paginator,
            // ]
        ]);
    }

    protected function makePagination($url, $paginator)
    {
        $current = $this->makeLink($url, $paginator->currentDate);

        $items = [];
        foreach ($paginator->items as $date) {
            $items[] = $this->makeLink($url, $date);
        }

        return [
            'current' => $current,
            'items' => $items,
        ];
    }

    protected function makeLink($url, $date)
    {
        // dd($date);
        return [
            'text' => $date->format("j M 'y"),
            'link' => $url.'?date='.$date->format("Y-m-d")
        ];
    }
}
