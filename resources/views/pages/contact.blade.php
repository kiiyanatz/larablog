@extends('main')
@section('title')
| Contact
@endsection
@section('content')
  <div class="row">
      <div class="col-md-12">
          <div class="jumbotron">
              <h1>Get intouch with LaraBlog</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo vitae placeat provident, reiciendis, voluptate quaerat facilis est voluptatem inventore voluptatibus amet velit et perferendis cupiditate quo, laboriosam iste suscipit sint.</p>
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
                  <input type="submit" class="btn btn-success" value="Send Message">
              </form>
          </div>
      </div>
  </div>
@endsection
