@props(['column', 'action'])

<form class="sort-button" action={{ $action }} method="GET">
    <input type="hidden" name="column" value="{{ $column }}">
    @if (!isset($_GET['order']))
        <input type="hidden" name="order" value="asc">
    @elseif ($_GET['order'] == 'asc' && $_GET['column'] == $column)
        <input type="hidden" name="order" value="desc">
    @else
        <input type="hidden" name="order" value="asc">
    @endif
    <div class="submit-container">
        <input type="submit" value="&vArr;">
    </div>
</form>
