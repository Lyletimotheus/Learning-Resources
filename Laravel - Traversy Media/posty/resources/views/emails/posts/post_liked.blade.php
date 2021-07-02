@component('mail::message')
# Your post was liked 

{{-- This is where we will say this user liked your post --}}
{{ $liker->name }} liked one of your posts
@component('mail::button', ['url' => route('posts.show', $post)])
{{-- Here we will be able to click this button to view the post --}}
    View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
