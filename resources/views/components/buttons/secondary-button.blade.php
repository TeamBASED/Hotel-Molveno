@props(['href', 'content' => ''])

@isset($href)
    <button type='submit' {{$attributes->merge(['class' => 'secondary-button'])}}>
        {{$slot}}
    </button>

@else
    <a href='{{$href}}' {{$attributes->merge(['class' => 'secondary-button'])}}>
        {{$slot}}
    </a>
@endif

