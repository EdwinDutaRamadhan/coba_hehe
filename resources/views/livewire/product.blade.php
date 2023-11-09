<div>
    <form >
        <input type="text" wire:model.live="search">
 
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
