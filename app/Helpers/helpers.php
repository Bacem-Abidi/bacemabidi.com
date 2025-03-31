<?php

use Illuminate\Support\Facades\Log;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\MarkdownConverter;
use Illuminate\Support\Str;


if (!function_exists('format_reading_time')) {
    function format_reading_time(int $minutes): string
    {
        if ($minutes < 1) return 'Less than 1 min read';

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        $parts = [];
        if ($hours > 0) {
            $parts[] = $hours . ' ' . ($hours === 1 ? 'hour' : 'hours');
        }
        if ($remainingMinutes > 0) {
            $parts[] = $remainingMinutes . ' min';
        }

        return implode(', ', $parts) . ' read';
    }
}


if (!function_exists('format_markdown_content')) {
    function format_markdown_content($content)
    {
        try {
            $environment = new Environment([
                'html_input' => 'allow',
                'allow_unsafe_links' => false,
                'allow_unsafe_html' => true,
            ]);

            $environment->addExtension(new CommonMarkCoreExtension());
            // $environment->addExtension(new GithubFlavoredMarkdownExtension());
            $environment->addExtension(new AutolinkExtension());          // GFM feature
            $environment->addExtension(new StrikethroughExtension());  
            $environment->addExtension(new TableExtension());
            $environment->addExtension(new TaskListExtension());
            $environment->addExtension(new AttributesExtension());

            $converter = new MarkdownConverter($environment);
            $html = (string) $converter->convert($content);
            \Log::debug('Converted HTML:', ['html' => $html]);
            // Add heading IDs
            $html = preg_replace_callback(
                '/<h([1-6])>(.*?)<\/h[1-6]>/',
                function ($matches) {
                    $slug = Str::slug(strip_tags($matches[2]));
                    return "<h{$matches[1]} id=\"{$slug}\">{$matches[2]}</h{$matches[1]}>";
                },
                $html
            );

            return $html;

        } catch (\Exception $e) {
            logger()->error('Markdown conversion failed: ' . $e->getMessage());
            return '<div class="bg-red-100 p-4">Error rendering content</div>';
        }
    }
}
