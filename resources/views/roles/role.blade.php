<div class="col-9">
<h1>Roles</h1>
<a class="btn btn-primary" href="{{route('role.create')}}">Create new Role</a>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Alias</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>
                    {{$role->id}}
                </td>
                <td>
                    {{$role->title}}
                </td>
                <td>
                    {{$role->alias}}
                </td>
                <td>
                    <a href="{{route('role.edit', ['role' => $role->id ])}}" class="btn btn-success">Edit</a>
                    <form action="{{route('role.destroy', ['role'=> $role->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
