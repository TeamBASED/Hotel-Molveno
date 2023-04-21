@props(['href'])

@isset($href)

    <a href='{{$href}}' {{$attributes->merge(['class' => 'button primary-button'])}}>
        {{$slot}}
    </a>

@else

    <button type='submit' {{$attributes->merge(['class' => 'button primary-button'])}}>
        {{$slot}}
    </button>
    
@endif


