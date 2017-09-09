<!doctype html>
 <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <script type="text/javascript" src="/js/jquery-3.2.1.js"></script>
    <script src="https://use.fontawesome.com/2584415ebe.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 </head>
 <body>
 <style>
     .responsive-width {
         font-size: 3vw;
     }
     .btn{white-space: normal !important;letter-spacing: .125rem;  border-radius: 0 !important;  background-color: #2e3436;  border: none;  color: #fff;  cursor: pointer;  display: inline-block;  position: relative;  outline: 0;  text-align: center;  text-decoration: none;  text-transform: uppercase;  transition: background-color .15s linear;  vertical-align: middle;  font-family: futura-pt-n7,futura-pt,Tahoma,Geneva,Verdana,Arial,sans-serif;  font-style: normal;  font-weight: 700;  padding: 5.008px 5%;  padding: .313rem 5%;  font-size: 14px;  font-size: .875rem;  padding: 12px 12px;  padding: .75rem 12px;}
     .btn:hover{background-color: #7c7c7c;cusor:pointer;}


 </style>
 @include('includes.header')
 
 @yield('content')
 


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
 @yield('scripts')
 </body>