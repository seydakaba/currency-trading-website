<ul>
@foreach($news as $item)
    <li><a href="{{ $item->link }}" target="_blank">{{ $item->title }}</a></li>
@endforeach
</ul>
