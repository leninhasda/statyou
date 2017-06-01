<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Status;
use App\Helpers\Paginator;
use Carbon\Carbon;

class ApiController extends Controller
{
    /**
     * main api end point
     *
     * @param  Request $request
     * @param  string  $username
     * @return mixed
     */
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

    /**
     * generates pagination for api
     * @param  string $url
     * @param  Paginator $paginator
     * @return mixed
     */
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

    /**
     * makes single link item for api pagination
     * @param  string $url
     * @param  Carbon $date
     * @return array
     */
    protected function makeLink($url, $date)
    {
        return [
            'text' => $date->format("j M 'y"),
            'link' => $url.'?date='.$date->format("Y-m-d")
        ];
    }
}
