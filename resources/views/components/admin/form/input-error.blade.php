@props(['for', 'bag' => 'default'])

@error($for, $bag)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>
@enderror
