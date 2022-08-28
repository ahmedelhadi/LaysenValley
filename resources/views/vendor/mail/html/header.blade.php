<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
	<img src="{{url('assets/images/logo.png')}}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
@else
	<img src="{{url('assets/images/logo.png')}}" class="logo" alt="{{ config('app.name', 'Laravel') }}">
@endif
</a>
</td>
</tr>
