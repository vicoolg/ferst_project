@foreach ($users as $user)
<ul>
   <li>
        <a href="{{route('user.profile', ['id'=>$user->id])}}">{{$user->name}}</a>
   </li>
</ul>
    @endforeach

{{--foreach ($users as $user)--}}
{{--<p>This is user {{ $user->id }}</p>--}}
{{--@endforeach--}}
