@foreach($items as $item)
    <a
    href="{!! $item->url()!!}"
    class="list-group-item list-group-item-action py-2 ripple"
    aria-current="true"
    >
    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>{{$item->title}}</span>
    </a>
@endforeach