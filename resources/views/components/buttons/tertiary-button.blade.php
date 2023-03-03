@props(['href'])

@isset($href)
    <button type='submit' {{$attributes->merge(['class' => 'tertiary-button'])}}>
        {{$slot}}
    </button>

@else
    <a href='{{$href}}' {{$attributes->merge(['class' => 'tertiary-button'])}}>
        {{$slot}}
    </a>
@endif

