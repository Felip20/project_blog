@props(['name','type'=>'text','value'=>''])
<x-form.wrapper>
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <input  type="{{$type}}" id="{{$name}}" name="{{$name}}" class="form-control" value="{{old($name,$value)}}">
    <x-error :name="$name"></x-error>
</x-form.wrapper>