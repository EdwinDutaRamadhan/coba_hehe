<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="w-75">Name</th>
                <th class="w-25">Terakhir Diperbaharui</th>
                <th colspan="2" class="text-center">Action</th>
                {{-- <th style="min-width: 164px;">Created_at</th> --}}
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->updated_at->diffForHumans() }}</td>
                    <td>
                        <i class="material-icons" data-toggle="tooltip" data-bs-toggle="modal"
                            data-bs-target="#editModal" onclick="update({{ $loop->index }})" role="button">edit</i>
                    </td>
                    <td><i class="material-icons" onclick="remove({{ $loop->index }});"
                            role="button">delete</i></td>
                    {{-- <td><a href="{{ route('panel.remove') }}"><i class="material-icons" data-confirm-delete="true">delete</i></a></td> --}}
                    {{-- <td>{{ $d->created_at }}</td> --}}
                    <form action="{{ route('manajemen-user.admin-role.destroy') }}" method="post"
                        style="display:none;" id="form_remove_{{ $loop->index }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="delete_token"
                            value="{{ Crypt::encryptString($d->role_id) }}">
                        <input type="hidden" name="name" value="{{ $d->name }}">
                    </form>

                </tr>
            @endforeach

            <!----edit-modal end--------->
        </tbody>
        <table class="table table-striped">

            {{ $data->links() }}
        </table>

    </table>
</div>
