<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="http://be.azzgo.it/public/img/mail/header/logo-header.png" class="logo" alt="AzzGo Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
