@props(['href'])

@isset($href)

    <a href='{{$href}}' {{$attributes->merge(['class' => 'tertiary-button'])}}>
        {{$slot}}
    </a>

@else

    <button type='submit' {{$attributes->merge(['class' => 'tertiary-button'])}}>
        {{$slot}}
    </button>

@endif

