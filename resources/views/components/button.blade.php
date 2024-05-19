@props(['type' => 'button', 'color' => 'primary'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 bg-'.$color.'-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-'.$color.'-700 active:bg-'.$color.'-900 focus:outline-none focus:border-'.$color.'-700 focus:ring ring-'.$color.'-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
