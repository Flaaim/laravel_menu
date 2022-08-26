<div class="col-9">
   <h1>Create a new Role</h1>
   <form action="{{route('role.store')}}" method="POST">
    @csrf 
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
    <input type="text" id="form2Example1" class="form-control" name="title"/>
    <label class="form-label" for="form2Example1">Title role</label>
  </div>

  <!-- alias input -->
  <div class="form-outline mb-4">
    <input type="text" id="form2Example2" class="form-control" name="alias"/>
    <label class="form-label" for="form2Example2">Alias</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>

  </div>
</form>
</div>
</div>