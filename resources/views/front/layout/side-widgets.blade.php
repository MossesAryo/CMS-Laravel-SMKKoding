<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="keyword" placeholder="Search Articles..." />
                    <button class="btn btn-primary" id="button-search" type="submit">
                        <i class="fas fa-search"></i> Go!
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2">
                @foreach ($categories as $item)
                    <a href="{{ route('category.show', $item->id) }}" class="badge bg-primary text-white p-2 unlink category">
                        {{ $item->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Reset Button -->
    @if (Request::routeIs('category.show') || Request::routeIs('search'))
        <div class=" mb-4 text-center">
            <div class="card-body">
                <a href="{{ route('Blogs') }}" class="btn btn-danger w-75">
                    <i class="fas fa-sync-alt"></i> Reset Filter
                </a>
            </div>
        </div>
    @endif
</div>
