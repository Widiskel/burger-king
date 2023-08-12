<div>
    <div class="card-head">
        <div class="card-title">
            <h3>Category</h3>
        </div>
        <a href="{{ route('category.create') }}" class="card-button">Add Category</a>
    </div>
    <div class="card-body">
        <table class="responsive-table">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th></th>
            </tr>
       
            @forelse ($category as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{route('category.show',$item)}}" class="action-button">Show</a>
                        <a href="{{route('category.edit',$item)}}" class="action-button">Edit</a>
                        <a class="action-button"  wire:click="confirm('delete', {{ $item->id }})" wire:loading.attr="disabled">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="nodata">No Data</td>
                </tr>
            @endforelse
        </table>
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