<!DOCTYPE html>
<html lang="en">
<head>
  <title>Prakash Twilio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>SMS Send</h2>
  	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
  <form action="/sendSms" method ="POST" >
  	@csrf
    <div class="form-group">
      <label for="mobile_number">Mobile Number:</label>
      <input type="text" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" name="mobile_number">
    </div>

    <div class="form-group">
      <label for="message">Message:</label>
      <textarea class="form-control" id="message" placeholder="Enter message" name="message"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
