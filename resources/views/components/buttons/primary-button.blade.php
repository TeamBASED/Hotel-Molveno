@props(['href'])

@isset($href)

    <a href='{{$href}}' {{$attributes->merge(['class' => 'primary-button'])}}>
        {{$slot}}
    </a>

@else

    <button type='submit' {{$attributes->merge(['class' => 'primary-button'])}}>
        {{$slot}}
    </button>
    
@endif


