@props(['type' => 'text', 'name', 'id', 'value' => null])

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" {{ $attributes->merge(['class' => 'form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}>
