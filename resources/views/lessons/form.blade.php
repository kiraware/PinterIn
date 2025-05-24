@php $isEdit = isset($lesson); @endphp

<div>
    <label class="block mb-1">Title</label>
    <input name="title" type="text" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white" value="{{ old('title', $isEdit ? $lesson->title : '') }}" required>
</div>

<div>
    <label class="block mb-1">Content</label>
    <textarea name="content" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white">{{ old('content', $isEdit ? $lesson->content : '') }}</textarea>
</div>

<div>
    <label class="block mb-1">Duration (minutes)</label>
    <input name="duration" type="number" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white" value="{{ old('duration', $isEdit ? $lesson->duration : '') }}" required>
</div>
