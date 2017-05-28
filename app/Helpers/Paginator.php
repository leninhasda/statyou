<?php

namespace App\Helpers;

use Illuminate\Support\HtmlString;
use Carbon\Carbon;

class Paginator {

    /**
     * default time zone
     * @var string
     */
    protected $timeZone = 'Asia/Dhaka';

    protected $format = "j M 'y";

    protected $urlFormat = "Y-m-d";

    protected $url = '/';

    /**
     * creates a paginator instance
     * @param array     $dates       [description]
     * @param string    $currentDate [description]
     * @param array     $options     [description]
     */
    public function __construct($dates, $currentDate, array $options = [])
    {
        foreach ($options as $key => $value) {
            $this->{$key} = $value;
        }

        $this->items = $this->convertToCarbon($dates);
        $this->currentDate = $this->convertToCarbon($currentDate);
    }

    /**
     * [convertToCarbon description]
     * @param  [type] $date [description]
     * @return Carbon|array       [description]
     */
    public function convertToCarbon($date)
    {
        if (is_object($date)) {
            return $date;
        }
        if (is_string($date)) {
            return new Carbon($date, $this->timeZone);
        }
        else if (is_array($date)) {
            $convertedDate = [];
            foreach ($date as $singleDate) {
                $convertedDate[] = $this->convertToCarbon($singleDate);
            }

            return $convertedDate;
        }
    }

    /**
     * renders the pagination markup
     * @return string [description]
     */
    public function make()
    {
        $data = [
            'items' => $this->items,
            'current' => $this->currentDate,
            'format' => $this->format,
            'urlFormat' => $this->urlFormat,
            'url' => $this->url,
        ];
        return new HtmlString(view('pagination', $data)->render());
    }
}