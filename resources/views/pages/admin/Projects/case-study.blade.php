<x-admin.project-layout :project="$project" :previousProject="''" :nextProject="''">
    <div id="markdown-editor" data-initial-content="{{ $initialContent }}"
        data-save-route="{{ route('admin.projects.case-study.save', $project) }}"
        data-upload-route="{{ route('admin.projects.upload-image', $project) }}"></div>

</x-admin.project-layout>
