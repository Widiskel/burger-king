<div>
    <div class="card-head">
        <div class="card-title">
            <h3>Banner</h3>
        </div>
        <a href="{{ route('banner.create') }}" class="card-button">Add Banner</a>
    </div>
    <div class="card-body">
        <div class="table-container">

            <table class="responsive-table">
                <tr>
                    <th>#</th>
                    <th>Banner Name</th>
                    <th></th>
                    <th></th>
                </tr>
    
                @forelse ($banner as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="account-banner-images">
                                <img src="{{ $item->getFirstMedia('banner_image')->getUrl() }}" alt="menu-images">
                            </div>
                        </td>
                        <td>
                            <a href="{{route('banner.edit',$item)}}" class="action-button">Edit</a>
                            <a class="action-button"  wire:click="confirm('delete', {{ $item->id }})" wire:loading.attr="disabled">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="nodata">No Data</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("Are you sure ?")) {
                return
            }
            @this[e.callback](...e.argv)
        })
    </script>
@endpush