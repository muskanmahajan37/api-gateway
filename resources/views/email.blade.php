<html>
<div class="container">
    <p>Hello {{$data['name']}}</p><br>
    <p>Thanks for joining FLEX.</p>
    <br>
    Below find your information about your account:<br>
    <hr>
    Name: {{$data['name']}}<br>
    Email: {{$data['email']}}<br>
    Username:{{$data['username']}}
    <br>
    <hr>
    For security issues password won't be shown, but if you ever forgot password please contact us<br>
    <br>
    Kind regards
    @php echo
'<h2>'.env('MAIL_FROM_ADDRESS').'</h2>' @endphp
    </p>
</div>
</html>