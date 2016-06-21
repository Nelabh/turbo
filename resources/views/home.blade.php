<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Welcome To Turbo</title>
    <link rel="stylesheet" href="{{URL::asset('css/reset.css')}}">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{URL::asset('css/style1.css')}}">
</head>
<body>
    <div class="pen-title">
      <h1>Turbo</h1>
  </div>
  <div class="container">
      <div class="card"></div>
      <div class="card">
        <h1 class="title">Login</h1>
        <form>
          <div class="input-container">
            <input type="text" name="username" id="Username" required="required"/>
            <label for="Username">Username</label>
            <div class="bar"></div>
        </div>
        <div class="input-container">
            <input type="password" id="Password" required="required"/>
            <label for="Password">Password</label>
            <div class="bar"></div>
        </div>
        <div class="button-container">
            <button><span>Go</span></button>
        </div>
        <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="{{URL::asset('js/index.js')}}"></script>
</body>
</html>
