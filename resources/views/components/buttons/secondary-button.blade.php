<button {{ $attributes->merge([
    'class' => 'secondary-button'
])}}>
    {{ $slot }}
</button>