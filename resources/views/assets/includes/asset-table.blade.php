<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr class="bg-info text-light">
                <th scope="col">Asset Code</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>{{$asset->asset_code}}</td>
                <td>{{$asset->title->name}}</td>
                <td>{{$asset->asset_status->name}}</td>
                <td>{{$asset->user_id ? $asset->user->name : "N/A"}}</td>
                <td>
                    <a href="{{route('assets.show',['asset' => $asset->id])}}"><button class="btn-sm btn-info w-100">Details</button></a>
                    <a href="{{route('assets.edit',['asset' => $asset->id])}}"><button class="btn-sm btn-warning w-100">Edit</button></a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>