<?php

namespace Mattmangoni\NovaBlogifyTool\Metrics\Posts;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Value;
use Mattmangoni\NovaBlogifyTool\Models\Post;

class NewPosts extends Value
{
    /**
     * Calculate the value of the metric.
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, Post::class);
    }

    /**
     * Get the ranges available for the metric.
     * @return array
     */
    public function ranges()
    {
        return [
            1 => 'Since Yesterday',
            7 => 'Since Last Week',
            30 => 'Since Last Month',
            90 => 'Since 3 Months Ago',
            180 => 'Since 6 Months Ago',
            365 => 'Since Last Year',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        return now()->addMinutes(10);
    }

    /**
     * Get the URI key for the metric.
     * @return string
     */
    public function uriKey()
    {
        return 'new-posts';
    }
}
