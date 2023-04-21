@props(['href'])

@isset($href)

    <a href='{{$href}}' {{$attributes->merge(['class' => 'button tertiary-button'])}}>
        {{$slot}}
    </a>

@else

    <button type='submit' {{$attributes->merge(['class' => 'button tertiary-button'])}}>
        {{$slot}}
    </button>

@endif

