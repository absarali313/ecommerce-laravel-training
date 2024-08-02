@props(['visible' => false])

<h6 class="{{$visible? 'bg-success text-white w-auto' : 'bg-danger text-white w-autp'}} text-center p-1 rounded-4 " style="width:80px">{{$visible? 'Active' : 'Inactive'}}</h6>
