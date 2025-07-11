@php use App\Enums\LessonDifficulty; @endphp

<div class="mb-4">
    <label class="block text-gray-700 dark:text-gray-300 mb-1">Title</label>
    <input type="text" name="title" value="{{ old('title', $lesson->title ?? '') }}"
        class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white" required>
    <x-input-error :messages="$errors->get('title')" class="mt-1 text-red-500 text-sm" />
</div>

<div class="mb-4">
    <label class="block text-gray-700 dark:text-gray-300 mb-1">Content</label>
    <textarea name="content" rows="5"
        class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white" required>{{ old('content', $lesson->content ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('content')" class="mt-1 text-red-500 text-sm" />
</div>

<div class="mb-4">
    <label class="block text-gray-700 dark:text-gray-300 mb-1">Difficulty</label>
    <select name="difficulty" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white"
        required>
        @foreach (LessonDifficulty::cases() as $level)
            <option value="{{ $level->value }}" @selected(old('difficulty', $lesson->difficulty->value ?? '') === $level->value)>
                {{ ucfirst($level->value) }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('difficulty')" class="mt-1 text-red-500 text-sm" />
</div>

<div class="mb-4">
    <label class="block text-gray-700 dark:text-gray-300 mb-1">Duration (minutes)</label>
    <input type="number" name="duration" value="{{ old('duration', $lesson->duration ?? '') }}"
        class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700 text-black dark:text-white" min="1" required>
    <x-input-error :messages="$errors->get('duration')" class="mt-1 text-red-500 text-sm" />
</div>
