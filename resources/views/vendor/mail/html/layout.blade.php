<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<style>
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">

<tr>
	<td align="" height="7" style="height:30px"></td>
</tr>

<tr>

<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">

	{{-- 
{{ $header ?? '' }}
	--}}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->

</tr>
<tr>
	<td  align="" bgcolor="#9c8857" height="7" style="height:7px">
</td>
</tr>

<tr>
	<td class="content-cell" align="center">
		<img src="{{url('assets/images/logo.png')}}" width="200" height="75">
	</td>
</tr>
<tr>
	<td  align="" bgcolor="#D3D3D3" height="1" style="height:1px">
</td>
</tr>
<tr>
<td class="content-cell2">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
</td>
</tr>

<tr>
	<td  align="" bgcolor="#D3D3D3" height="1" style="height:1px"></td>
</tr>

<tr>
	<td>{{ $header ?? '' }}</td>
</tr>



</table>
</td>
</tr>

{{ $footer ?? '' }}
</table>
</td>
</tr>
</table>
</body>
</html>
