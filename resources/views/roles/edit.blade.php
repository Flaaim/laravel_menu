<div class="col-9">
   <h1>Edit Role</h1>
   <form action="{{route('role.update', ['role'=>$role->id])}}" method="post">
    @csrf 
    @method('PUT')
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>    
            {{$error}}
        </li>
        @endforeach
    </ul>

    @endif
  <div class="form-outline mb-4">
    <input type="text" id="form2Example1" class="form-control" name="title" value="{{$role->title}}"/>
    <label class="form-label" for="form2Example1">Title role</label>
  </div>

  <!-- alias input -->
  <div class="form-outline mb-4">
    <input type="text" id="form2Example2" class="form-control" name="alias" value="{{$role->alias}}"/>
    <label class="form-label" for="form2Example2">Alias</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Edit</button>

</div>
</form>
</div>
</div>