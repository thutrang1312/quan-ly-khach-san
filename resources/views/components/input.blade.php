
@props(['for'])
<div>
    <label for="{{ $for }}">{{ $label }}</label>
    <input id="{{ $for }}" type="text" name="{{ $for }}" {{ $attributes->merge(['class' => 'block mt-1 w-full border-gray-300 rounded-md shadow-sm']) }}>
</div>
