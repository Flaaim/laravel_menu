<div class="col-9">
<h1>Roles</h1>
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
            </tr>
        @endforeach
    </tbody>
</table>
</div>
