@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Contact Me</h1>

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>{{session('message')}}</strong>
            </div>

            <script>
            $(".alert").alert();
            </script>
        @endif

        <form action="{{route('contacts.send')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="full_name" class="font-weight-bold">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" aria-describedby="fullNameHelpe" minlength="5" maxlenght="255" value="{{old('full_name')}}" required>
            </div>
            <div class="form-group">
                <label for="email" class="font-weight-bold">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" value="{{old('email')}}" required>
            </div>

            <div class="form-group">
                <label for="message" class="font-weight-bold">Message</label>
                <textarea class="form-control" name="message" id="message" rows="5">{{old('message')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Send</button>
        </form>

    </div>

@endsection