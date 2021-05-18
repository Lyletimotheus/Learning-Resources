@if (5 > 10)
    <p>5 is lower then 10</p>
@elseif(5 == 10)
    <p>5 is indeed lower then 10</p>
@else()
    <h2>All conditions are wrong!</h2>
@endif

@unless (empty($name)) {{-- Here we want to see if the name property is empty--}}
    <h2>Name isn't empty</h2>
@endunless

@if(!empty($name)) {{-- This is the usual way we will write the code in PHP to check if a variable is empty. --}}
    <h1>Name is not empty!</h1>
@endif

{{-- @empty(!$name)
    <h2>Name is empty!</h2>
@endempty --}}