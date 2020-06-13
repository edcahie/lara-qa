<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Your answer</h3>

                    <form method='post' action="{{ route('questions.answers.store', $question->id) }}"  >
                        @csrf
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="7" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"></textarea>
                            @if($errors->has('body'))
                                <span class="invalid-feedback">{{ $errors->first('body') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Submit</button>
                        </div>
                    </form>

                </div>
                <hr>

            </div>
        </div>
    </div>
</div>