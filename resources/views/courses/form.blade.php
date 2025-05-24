@php $isEdit = isset($course); @endphp

<div>
    <label class="block mb-1">Title</label>
    <input name="title" type="text" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white" value="{{ old('title', $isEdit ? $course->title : '') }}" required>
</div>

<div>
    <label class="block mb-1">Description</label>
    <textarea name="description" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white">{{ old('description', $isEdit ? $course->description : '') }}</textarea>
</div>

<div>
    <label class="block mb-1">Price</label>
    <input name="price" type="number" step="0.01" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white" value="{{ old('price', $isEdit ? $course->price : '') }}" required>
</div>

<div>
    <label class="block mb-1">Thumbnail URL</label>
    <input name="thumbnail" type="url" class="w-full p-2 rounded dark:bg-gray-800 dark:text-white" value="{{ old('thumbnail', $isEdit ? $course->thumbnail : '') }}">
</div>
