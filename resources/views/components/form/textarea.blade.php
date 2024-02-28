@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <textarea
        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-600 outline-none focus:border-[#6A64F1] focus:shadow-md @error($name) border-red-500 @enderror"
        name="{{ $name }}"
        id="{{ $name }}"
        rows="4"
        required
    >{{ old($name) ?? $slot }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
