@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('') {{ trans('notification.whoops') }}
@else
# {{ trans('notification.welcome') }}
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach


{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')

    
    @if(config('app.locale') == 'ar')
        @lang(
            "إذا كنت تواجه مشكلة في النقر فوق الزر، انسخ والصق عنوان URL \n".
            'أدناه في متصفح الويب لديك <br />',
            [
                'actionText' => $actionText,
            ]
        ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>

    @else
        @lang(
            "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
            'into your web browser:',
            [
                'actionText' => $actionText,
            ]
        ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>

    @endif

@endslot
@endisset


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{ trans('notification.regards') }},<br>
{{ config('app.name') }}
@endif


@endcomponent
