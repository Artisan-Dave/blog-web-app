@extends('main')

@section('title','| Contact')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form action="">
                    <div class="form-group mb-2">
                        <label for="email" name="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="subject" name="subject">Subject:</label>
                        <input type="subject" id="subject" name="subject" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="message" name="message">Message:</label>
                        <textarea id="message" name="message" class="form-control">Type your message here..</textarea>
                    </div>

                    <input type="submit" class="btn btn-success" value="Send Message">
                </form>
            </div>
        </div>
    </div>
@endsection
