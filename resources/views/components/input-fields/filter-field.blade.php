@props(['options'])

<select class="filter-field">

    <option value="all"> Select all </option>

    @foreach ($options as $option)
        <option class="filter-field-option" value={{$option}}>{{$option}}</option>
    @endforeach

</select>

