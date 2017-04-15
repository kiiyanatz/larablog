@extends('main')
@section('title')
| Contact
@endsection
@section('stylesheets')
<link rel="stylesheet" href="/css/home.css">
@endsection
@section('content')
<div id="intro">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="jumbotron">
              <h1>Get intouch with LaraBlog</h1>
              <form action="">
                  <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="text" name="email" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" name="subject" class="form-control">
                  </div>
                  <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Type your massage here..."></textarea>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Send Message">
              </form>
          </div>
      </div>
  </div>
</div>
</div>
@endsection
