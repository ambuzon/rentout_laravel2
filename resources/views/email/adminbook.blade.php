<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
<p>{!! $title !!} booking request by {!! $customer !!} Contact him via {!! $customerE !!}, {!! $customerP !!}, or {!! $customerT !!}</p>

@if($optional != null)
    <p>Additional Input by Customer: {!! $optional !!}</p>
@endif

<a href="http://rentout.demo/"> <button> Accept </button> </a>
<a href="http://rentout.demo/"> <button> Decline </button> </a>

</div>

</body>
</html>