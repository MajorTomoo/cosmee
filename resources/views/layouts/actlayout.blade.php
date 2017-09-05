
<!doctype html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<style>
body{background-color:#EEEEEE;}
#register-container{padding:2rem 2rem;background-color:white;margin-top:5rem;text-transform:uppercase;font-family: "futura-pt-n7","futura-pt",Tahoma,Geneva,Verdana,Arial,sans-serif;font-style: normal;font-size:11px;color:#999999;font-weight:700;}
h4{border-top:1px solid gray;padding:1rem 0rem;font-size: 18px;line-height: 1.2;letter-spacing: 2.3px;color:black;}
.form-group input{border-radius:0;font-size:11px;}
.btn{border-radius:0;background-color:black;color:white;border:0px;}
label{letter-spacing:2px;}
#errormsg{color:black;}
button:hover{cursor:pointer !important;}

</style>
</head>
<body>
 @yield('content')
 
 </body>