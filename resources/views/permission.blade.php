<div class="col-9">
    <form action="{{route('permissions.store')}}" method="POST">

   @csrf
<table class="table">
    <thead>
        <th>
            Permission
        </th>
        @foreach($roles as $role)
                <th>
                    {{$role->title}}
                </th>
        @endforeach
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td>
                {{$permission->title}}
            </td>
            @foreach($roles as $role)
                <td>
                    @if($role->hasPerms($permission->alias))
                    <input type="checkbox" name="{{$role->id}}[]" value="{{$permission->id}}" checked>
                    @else
                    <input type="checkbox" name="{{$role->id}}[]" value="{{$permission->id}}">
                    @endif
                </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
