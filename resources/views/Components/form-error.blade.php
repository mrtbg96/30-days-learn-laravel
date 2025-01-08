@props(['name'])

@error($name)
    <small {{ $attributes->merge(['class' => 'mt-1 font-weight-semibold italic text-red-500 text-xs']) }}>
        {{ $message }}
    </small>
@enderror
