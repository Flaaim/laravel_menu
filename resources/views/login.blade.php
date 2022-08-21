<div class="col-6">
<form action="{{route('login.store')}}" method="POST">
    @csrf 
  <!-- Email input -->
  <h1>Login Form</h1>
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
    <input type="email" id="form2Example1" class="form-control" name="email"/>
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" name="password"/>
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

  </div>
</form>
</div>