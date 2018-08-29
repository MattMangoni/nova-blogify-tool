<?php

namespace Mattmangoni\NovaBlogifyTool\Metrics\Posts;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;
use Mattmangoni\NovaBlogifyTool\Models\Post;

class PostsTrend extends Trend
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByDays($request, Post::class);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7 => 'Last 7 Days',
            30 => 'Last 30 Days',
            90 => 'Last 90 Days',
        ];
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'users-per-day';
    }
}
