<div class="modal-body">


    <form method="post" action="{{ route('period_information_update_prediction') }}" >
        @csrf
        <input type="hidden" class="form-control" value="{{ $inputId->id }}" name="id">
        <label>Period Date:</label>
        <input type="text" class="form-control" value="{{ $inputId->period_date }}" name="period_date">
        <label>Total Days:</label>
        <input type="text" class="form-control" value="{{ $inputId->total_days }}" name="total_days">
        <label>Cycle:</label>
        <input type="test" class="form-control" value="{{ $inputId->cycle }}" name="cycle">

        <button   type="submit" class="btn btn-primary mt-4 "  >Update Prediction Data</button>
    </form>

    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
