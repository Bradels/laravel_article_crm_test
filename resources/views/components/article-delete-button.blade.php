<div>
    <form method="POST" action="/articles/{{ $id }}">
    @csrf
    @method('DELETE')


    <input type="submit" value="Remove Article">
</form>
</div>