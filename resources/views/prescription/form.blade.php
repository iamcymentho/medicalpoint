@if(count($bookings)>0)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{ route('prescription') }}" method="POST">
      @csrf
      
    <div class="modal-content">
      <div class="modal-header bg-primary text-white ">
        <h5 class="modal-title " id="exampleModalLabel"><b>Prescription</b></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">

        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
        <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
        <input type="hidden" name="date" value="{{$booking->date}}">
        
        <div class="form-group">
            <label for="name_of_disease"><b>Disease</b></label>
            <input type="text" name="name_of_disease" class="form-control" value="{{ old('name_of_disease') }}" required="">
        </div>
          <div class="form-group">
            <label><b>Symptoms</b></label>
         
            <textarea name="symptoms" class="form-control" placeholder="symptoms" value="{{ old('symptoms') }}" required=""></textarea>
        </div>

        <div class="form-group">
          <label><b>Medicine</b></label>
          <input type="text" name="medications" class="form-control" value="{{ old('medications') }}" required="">
          
        </div>
          <div class="form-group">
            <label><b>Usage</b></label>
           
              <textarea name="prescriptions" class="form-control" value="{{ old('prescriptions') }}" placeholder="Procedure to use medicine" required=""></textarea>
        </div>
          <div class="form-group">
            <label><b>Feedback</b></label>
            
            <textarea name="feedback" class="form-control" placeholder="feedback" value="{{ old('feedback') }}" required=""></textarea>


        </div>
        <div class="form-group">
            <label><b>Signature</b></label>
            <input type="text" name="signature" class="form-control" value="{{ old('signature') }}" required="">
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
  </div>
</div>
@endif