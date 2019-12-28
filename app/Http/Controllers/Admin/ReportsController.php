<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Engagement;

class ReportsController extends Controller
{
    public function fans()
    {
        $reports = [
            [
                'reportTitle' => '粉絲',
                'reportLabel' => '總計',
                'chartType'   => 'line',

                'results' => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('fans');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function engagements()
    {
        $reports = [
            [
                'reportTitle' => '互動程度',
                'reportLabel' => '總計',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('engagements');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function reactions()
    {
        $reports = [
            [
                'reportTitle' => '回應',
                'reportLabel' => '總計',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('reactions');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function comments()
    {
        $reports = [
            [
                'reportTitle' => '留言',
                'reportLabel' => '總計',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('comments');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

    public function shares()
    {
        $reports = [
            [
                'reportTitle' => '分享',
                'reportLabel' => '總計',
                'chartType'   => 'line',
                'results'     => Engagement::get()->sortBy('stats_date')->groupBy(function ($entry) {
                    if ($entry->stats_date instanceof \Carbon\Carbon) {
                        return \Carbon\Carbon::parse($entry->stats_date)->format('Y-m-d');
                    }

                    return \Carbon\Carbon::createFromFormat(config('app.date_format'),
                        $entry->stats_date)->format('Y-m-d');
                })->map(function ($entries, $group) {
                    return $entries->sum('shares');
                }),
            ],
        ];

        return view('admin.reports', compact('reports'));
    }

}
