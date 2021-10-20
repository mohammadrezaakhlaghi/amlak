@extends('layouts.layout')
<style>
    th, td{
        text-align: center !important
    }
</style>
@section('content')
<div class="container">
    <h2>جدول درخواست ها</h2>
    <table class="table">
      <thead>
        <tr>
          <th>نوع</th>
          <th>توضیحات</th>
          <th>قیمت</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          @foreach ($orders as $item)
          <tr>
            <td>{{$item->type}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->price}}</td>
            
            @if($item->status)
              <td><input type="checkbox" checked class="status" name="{{$item->id}}" /></td>
            @else
              <td><input type="checkbox" class="status" name="{{$item->id}}" /></td>
            @endif

            <form id="form" action="{{route('delete')}}" method="post">
              @csrf
              <td><input type="hidden" name="order_id" value="{{$item->id}}"></td>
              <td id="del"><input type="submit" value="حذف"></td>
            </form>
          </tr>
          @endforeach
       
       
      </tbody>
    </table>
    <span></span>
  </div>
@endsection
<script src="/assets/js/jquery-1.12.4.min.js"></script>
<script>

$(function(){ 
	$('input[type="checkbox"]').on('click', function(event){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
var order_id=event.target.name;
		  if ($(this).prop('checked')==true){ 
      

    $.ajax({
	  url: "/checked", 
	  data:{order_id:order_id},
	  type: 'POST',
   
      //dataType:"json",
	  success: function(result){
		 //alert(result);
		  location.reload();
  
  }});
    }
		else{
			//alert("unchecked");

      $.ajax({
      url: "/unChecked", 
      data:{order_id:order_id},
      type: 'POST',
   
      //dataType:"json",
	   success: function(result){
		 //alert(result);
		  location.reload();
  }});
			
		}
});
	
});
</script>


              
