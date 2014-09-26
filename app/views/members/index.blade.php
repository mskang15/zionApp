<section class="search">
    <label for="search-basic">Search Input:</label>
    <input type="search" name="search" id="search-basic" value="" class="search-text"/>
</section>
<div role="main" class="ui-content">
    <ul class="list-group" data-role="listview">
    @foreach($members as $member)
        <li class="list-group-item"><a href="members/{{ $member->id}}">{{ $member->name }}</a></li>
    @endforeach
    </ul>
</div>
{{$members->links()}}
<script>
        $("#search-basic").on("keyup", function() {
            var g = $(this).val().toLowerCase();
            $('.list-group-item').each(function() {
                var s = $(this).text().toLowerCase();
                $(this).closest('.list-group-item')[ s.indexOf(g) !== -1 ? 'show' : 'hide' ]();
            });
        });


</script>

