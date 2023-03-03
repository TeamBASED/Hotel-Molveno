@props(['href'])

@isset($href)
    <button type='submit' {{$attributes->merge(['class' => 'primary-button'])}}>
        {{$slot}}
    </button>

@else
    <a href='{{$href}}' {{$attributes->merge(['class' => 'primary-button'])}}>
        {{$slot}}
    </a>
@endif


