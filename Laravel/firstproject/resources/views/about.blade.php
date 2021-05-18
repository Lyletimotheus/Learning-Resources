{{-- @if (5 > 10)
    <p>5 is lower then 10</p>
@elseif(5 == 10)
    <p>5 is indeed lower then 10</p>
@else()
    <h2>All conditions are wrong!</h2>
@endif

@unless (empty($name))  Here we want to see if the name property is empty
    <h2>Name isn't empty</h2>
@endunless

@if(!empty($name)) This is the usual way we will write the code in PHP to check if a variable is empty. 
   <h1>Name is not empty!</h1>
@endif 

@empty($name) 
 Checks to see if a variable or input field is empty 
    <h2>Name is empty!</h2>
@endempty

@isset($name)
    <h2>The variable is set!</h2>
@endisset 
--}}

<!-- 
    *****************************
    Comparing multiple conditions - Multiple values that may require the same code (Switch Statments)
    *****************************


{{-- @switch($name)
    @case('Lyle')
        <h2>Name is Lyle!</h2>
        @break
    @case('Jack')
        <h2>Name is Jack!</h2>
        @break
    @case('Doe')
        <h2>Name is Doe!</h2>
        @break
    @default
        <h2>There is no person with that name!</h2>
@endswitch --}}
**************************************************          END         *********************************
-->

<!-- 
*****************************
Loops
*****************************
1. For Loop
2. Foreach Loop
3. For Else Loop
4. While Loop
-->

@for ($i = 0; $i <= 10; $i++) 
    <h2>The number is: {{ $i }}</h2>
@endfor

@foreach ($names as $person)
    <h2>The people at the party are:  {{ $person }}</h2>
@endforeach

@forelse ($names as $name)
    <h2>The name is: {{ $name }}</h2>
@empty
{{-- The empty statement will return if the array is empty --}}
    <h2>There are no names</h2>
@endforelse

{{ $i = 0 }}
@while ($i < 10)
    <h2>{{ $i }}</h2>
    {{  $i ++ }}
@endwhile