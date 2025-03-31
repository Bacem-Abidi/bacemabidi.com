<x-admin.project-layout :project="$project" :previousProject="$previousProject" :nextProject="$nextProject">
    <div id="markdown-editor" data-initial-content="{{ $initialContent }}"
        data-save-route="{{ route('admin.projects.case-study.save', $project) }}"
        data-upload-route="{{ route('admin.projects.upload-image', $project) }}" data-title="Case Study Editor"></div>

</x-admin.project-layout>
