<!-- Modal -->

<div class="modal fade " id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white ">
        <h5 class="modal-title" id="exampleModalLabel">Doctor's Information</h5>

        
        <button type="button" class="close btn-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <img src="{{ asset('images') }}/{{ $user->image }}" alt="" width="200px">
       
        {{-- <span class="badge badge-pill badge-dark"><b>Role :</b>&nbsp;&nbsp; {{ $user->role->name }}</span> --}}

        <p class="mt-2"><b>Name :</b>&nbsp;&nbsp; {{ $user->name }}
         <span class="badge badge-pill badge-primary">{{ $user->role->name }}</span>
        </p>
        <p class="mt-2"><b>Email Address :</b>&nbsp;&nbsp; {{ $user->email }}</p>
        <p class="mt-2"><b>Address :</b>&nbsp;&nbsp; {{ $user->address }}</p>
        <p class="mt-2"><b>Phone Number :</b>&nbsp;&nbsp; {{ $user->phone_number }}</p>
        <p class="mt-2"><b>Department :</b>&nbsp;&nbsp; {{ $user->department_id }}</p>
        <p class="mt-2"><b>Education :</b>&nbsp;&nbsp; {{ $user->education }}</p>
        <p class="mt-2"><b>Description :</b>&nbsp;&nbsp; {{ $user->description }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>