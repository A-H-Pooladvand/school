@if(isset($data) && count($data))
    <h4 class="text-uppercase">Projects</h4>
    <hr>
    <div class="row">
        @foreach($data as $item)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <article class="entry-item  kopa-item-01">
                    <div class="entry-thumb">
                        <a href="{{ route('project.show', $item->id) }}">
                            <img class="img-rounded" src="{{ image_url($item->image,36,25,true) }}" alt="{{ $item->title }}" title="{{ $item->title }}">
                        </a>
                    </div>
                    <div class="entry-content">
                        <h4 class="entry-title">
                            <a href="{{ route('project.show', $item->id) }}">{{ $item->title }}</a>
                        </h4>
                        <div class="entry-meta">
                            <a href="{{ route('project.show', $item->id) }}">
                                <small>{{ $item->created_at->format('Y-d-m') }}</small>
                            </a>
                        </div>
                        <p>{{ $item->summary }}</p>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endif

