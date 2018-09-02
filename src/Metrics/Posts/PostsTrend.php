<?php

namespace Mattmangoni\NovaBlogifyTool\Metrics\Posts;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;
use Mattmangoni\NovaBlogifyTool\Models\Post;

class PostsTrend extends Trend
{
    /**
     * Calculate the value of the metric.
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByDays($request, Post::class)->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     * @return array
     */
    public function ranges()
    {
        return [
            1 => 'Today',
            2 => 'Yesterday',
            7 => 'Last 7 Days',
            14 => 'Last 14 Days',
            28 => 'Last 28 Days',
            30 => 'Last 30 Days',
            90 => 'Last 90 Days',
            180 => 'Last 180 Days',
            365 => 'Last Year',
        ];
    }

    /**
     * Get the URI key for the metric.
     * @return string
     */
    public function uriKey()
    {
        return 'posts-per-day';
    }
}
