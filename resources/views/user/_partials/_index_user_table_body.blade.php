<tr id="{{$user->id}}">
    <td class="align-middle">
        <div class="form-check mb-0">
            <input class="form-check-input" type="checkbox" id="checkbox-1"
                data-bulk-select-row="data-bulk-select-row" />
        </div>
    </td>
    <td class="align-middle">{{$user->name}}</td>
    <td class="align-middle">{{$user->email}}</td>
    <td class="align-middle">{{$user->phone}}</td>
    <td class="align-middle text-capitalize">{{optional($user->roles[0])->name}}</td>
    <td class="align-middle text-end pe-3 text-capitalize" data-toggle="tooltip" data-placement="top"
        title="Change Status">
        @if($user->status == 'active')
        <span class="userID-{{$user->id}} badge bg-primary changeStatus">{{$user->status}}</span>
        @else
        <span class="userID-{{$user->id}} badge bg-danger changeStatus">{{$user->status}}</span>
        @endif
    </td>
    <td>
        <div class="btn-group btn-group-sm btn-group-flush" role="group" aria-label="Basic example">
            <a href="{{route('user.view',$user->id)}}">
                <button class="btn btn-falcon-info btn-sm" type="button" data-toggle="tooltip" data-placement="top"
                    title="View"><span class="fas fa-eye"></span></button>
            </a>
            <a href="{{route('user.edit',$user->id)}}">
                <button class="btn btn-falcon-primary btn-sm editAndAssignUser" type="button" data-toggle="tooltip"
                    data-placement="top" title="Edit"><span class="fas fa-pencil-alt"></span></button>
            </a>
            @if($user->id != 1)
            <button class="btn btn-falcon-danger btn-sm userDeleteBtn" type="button" data-toggle="tooltip"
                data-placement="top" title="Delete" data-userId="{{$user->id}}"><span
                    class="fas fa-trash"></span></button>
            @endif
        </div>
    </td>
</tr>