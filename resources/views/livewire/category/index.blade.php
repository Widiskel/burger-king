<div class="card-head">
    <div class="card-title">
        <h3>Category</h3>
    </div>
    <a class="card-button">Add Category</a>
</div>
<div class="card-body">
    <table class="responsive-table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th></th>
        </tr>
        @if (empty($category))
            <tr>
                <td colspan="3" class="nodata">No Data</td>
            </tr>
        @else
            @foreach ($category as $item)
                <tr>
                    <td>{{ $loop->index }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="#" class="action-button">Show</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
</div>