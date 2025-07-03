@props([
    'className' => null,
    'name' => null,
    'label',
    'type',
    'value',
    'disabled' => false,
])

<div class="{{ $className }}">
    <div class="form-floating mb-3">
        <input type="{{ $type }}" class="form-control @error($name) border-invalid-form @enderror" id="{{ $name }}" name="{{ $name }}" placeholder="Input Properties Name" value="{{ isset($value) ? old($name, $value) : old($name) }}" {{ $disabled ? 'disabled' : '' }}>
        <label for="{{ $name }}">{{ $label }}</label>

        {{-- @error($name)
            <div class="invalid-form">
                {{ $message }}
            </div>
        @enderror --}}
    </div>
</div>
