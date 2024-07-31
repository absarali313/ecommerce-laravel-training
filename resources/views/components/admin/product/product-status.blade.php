@props(['visible' => false])

<h6 class="{{$visible? 'active' : 'warning'}} text-center p-1 rounded-4 ">{{$visible? 'Active' : 'Draft'}}</h6>
