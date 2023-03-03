@props(['options'])

<select>

    @foreach ($options as $option)
        <option value={{$option}}>{{$option}}</option>
    @endforeach

</select>

