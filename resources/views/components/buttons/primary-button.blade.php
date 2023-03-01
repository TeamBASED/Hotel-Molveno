<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'primary-button'
])}}>
    {{ $slot }}
</button>