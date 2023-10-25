@props([
    'label' => 'Save'
])

<button {{ $attributes }} type="submit" class="btn btn-primary">
    {{ $label }}
</button>
