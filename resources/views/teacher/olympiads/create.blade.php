@extends('teacher.layouts.app')


@section('main-title', 'Create an olympiad')

@section('main-content')

    <form method="post" action="{{ route('teacher.olympiad.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
            @error('name')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" class="form-control{{ $errors->has('subject_id') ? ' is-invalid' : '' }}">
                @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                @endforeach
            </select>
            @error('subject_id')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Start date</label>
            <input type="text" class="form-control datetimepicker {{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="start_date" placeholder="Enter startdate" name="start_date" value="{{old('start_date')}}">

            @error('start_date')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End date</label>
            <input type="text" class="form-control datetimepicker {{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="end_date" placeholder="Enter endDate" name="end_date" value="{{old('end_date')}}">
            @error('end_date')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" id="cost" placeholder="Enter cost" name="cost" value="{{old('cost')}}">
            @error('cost')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-group">
            <input type="file" class="d-none">
            <button type="button" class="btn btn-primary" @change.prevent="upload">Upload Work</button>
        </div>



        <button type="submit" class="btn btn-primary">Next</button>
    </form>

@endsection

@section('scripts')
    <script>
    export default {
        data() {
            return {
                file: ''
            }
        },
        methods: {
            upload() {
                console.log('fuck u')
            }
        }
    </script>
@endsection
