<x-admin.blog-layout :blog="$blog" :previousBlog="$previousBlog" :nextBlog="$nextBlog">
    <div id="markdown-editor" data-initial-content="{{ $initialContent }}"
        data-save-route="{{ route('admin.blog.content.save', $blog) }}"
        data-upload-route="{{ route('admin.blog.upload-image', $blog) }}"></div>

</x-admin.blog-layout>
