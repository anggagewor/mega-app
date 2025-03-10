<?php

if (!function_exists('convert_to_tags')) {
    function convert_to_tags($topics): string
    {
        if (!$topics) {
            return '-';
        }
        $exp = explode(',', $topics);
        $tags = '';
        foreach ($exp as $topic) {
            $topic = trim($topic);
            $tags .= '<span class="tag me-1 mb-1"> ' . $topic . ' </span>';
        }
        return $tags;
    }
}
if (!function_exists('isActiveRoute')) {
    function isActiveRoute(...$patterns): string
    {
        foreach ($patterns as $pattern) {
            if (request()->routeIs($pattern)) {
                return 'active';
            }
        }
        return '';
    }
}
