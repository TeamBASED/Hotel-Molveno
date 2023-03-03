@props(['href'])

@isset($href)

    <a href='{{$href}}' {{$attributes->merge(['class' => 'secondary-button'])}}>
        {{$slot}}
    </a>

@else

    <button type='submit' {{$attributes->merge(['class' => 'secondary-button'])}}>
        {{$slot}}
    </button>
    
@endif

