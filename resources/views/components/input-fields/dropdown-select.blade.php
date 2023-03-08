@props(['options', 'name'])

<select class="dropdown-select">

    <option style="display: none;"> Please select </option>

    @foreach ($options as $option)
        <option class="filter-field-option" value={{$option}}>{{$option}}</option>
    @endforeach

</select>

