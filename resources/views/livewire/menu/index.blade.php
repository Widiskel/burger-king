<div>
    <div class="card-head">
        <div class="card-title">
            <h3>Menu</h3>
        </div>
        <a href="{{ route('menu.create') }}" class="card-button">Add Menu</a>
    </div>
    <div class="card-body">
        <div class="table-container">

            <table class="responsive-table">
                <tr>
                    <th>#</th>
                    <th>Menu Name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
    
                @forelse ($menus as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <span>{{ App\Helper::toIdr($item->price - $item->discount)}}</span><br>
                            <span class="disc">{{App\Helper::toIdr($item->price)}}</span>
                        </td>
                        <td>
                            <div class="account-menu-images">
                                <img src="{{ $item->getFirstMedia('menu_image')->getUrl() }}" alt="menu-images">
                            </div>
                        </td>
                        <td>
                            <a href="{{route('menu.edit',$item)}}" class="action-button">Edit</a>
                            <a class="action-button"  wire:click="confirm('delete', {{ $item->id }})" wire:loading.attr="disabled">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="nodata">No Data</td>
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