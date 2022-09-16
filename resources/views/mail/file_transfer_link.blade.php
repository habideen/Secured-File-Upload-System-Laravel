<!DOCTYPE html>
<html>
<head>
<style>
body{background-color:#d9d9d9;font-family: Arial, Helvetica, sans-serif;}
.main{padding:6em 2em;border-radius:15px;background-color:#fff;
    box-shadow:1px 1px 20px #aaa;max-width:500px;margin-left:auto;margin-right:auto;}
.center{text-align:center;}
p{line-height:1.7em;color:#222;margin-bottom:0px;}
.c-btn{padding:10px 15px;border-radius:3px;border:none}
.c-btn-primary{background-color:#1F3BB3;color:#fff;}
.c-btn-primary:hover{background-color:#334FC8;}
.c-btn-primary:focus{background-color:#1F3Ba0;}
a{text-decoration:none;}
</style>
</head>
<body>
<div class='main'>
    <div style='margin-bottom:2.5em;text-align:center;background-color:#f1f1f1;padding:20px;'><a href='{{$home}}'><img src='{{$home}}/images/favicon.png' alt='Logo' /></a></div>
    <div style='margin-bottom:40px;'><img src='{{$home}}/images/transfer-illustration.png' alt='Illustration' style='width:100%' /></div>
    <p>Hi {{$last_name}} {{$first_name}}, how do you do?</p>

    <p>Please use the information below to upload your file in our server.</p>

    <p>Enter your email address in the field provided and the token below for a successful transfer</p>

    <p><b style='margin-right:10px;'>Token:</b>$token</p>

    <p style='margin-top:40px;'><a href="{{$link}}" class="c-btn c-btn-primary">Click here to transfer your file</a></p>
</div>
</body>