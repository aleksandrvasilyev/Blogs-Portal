@props(['name'])

<x-form.field>

    <x-form.label name="{{ $name }}"/>

    <input
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-600 outline-none focus:border-[#6A64F1] focus:shadow-md"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
