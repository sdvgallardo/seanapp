@component('mail::message')
# Introduction

Thanks so much for registering!


@component('mail::button', ['url' => 'http://seanapp/blog/'])
Start blogging
@endcomponent

@component('mail::panel', ['url' => ''])
Inspirational message here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
