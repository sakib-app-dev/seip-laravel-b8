@props(['name', 'type' => 'text',  'label' => ''])

<div class="mb-3">
    @if($label)
        <label for="{{ $name }}Input" class="form-label">{{ $label }}</label>
    @endif

    <input 
        name="{{ $name }}" 
        type="{{ $type }}" 
        id="{{ $name }}Input" 
        value="{{ old($name) }}" 
        {{ $attributes->merge(['class' => 'form-control']) }}
    >

    @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror

</div>