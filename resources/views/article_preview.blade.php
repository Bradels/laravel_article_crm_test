<div style="border-style: double; float:left; padding:2.5em; background-color:#C6DEFF;">
<h1> {{ $article->title }} </h1>
<img src="/uploads/{{ $article->image_path }}" style="max-width: 300px; max-height: 200px; min-width: 300px; min-height: 200px;"/>
<p><a href="/articles/{{ $article->id}}"> Visit Article </a></p>
</div>