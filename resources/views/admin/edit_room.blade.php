<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
 @include('admin.css')
 <style>
    label{
        display: inline-block;
        width: 200px;
    }
    .div_deg{
        padding-top: 30px;

    }
    .div_center{
        text-align: center;
        padding-top: 40px;
    }
    </style>
  </head>
  <body>
    @include('admin.header')
    
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
     
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div class="div_center">
                <h1 style="font-size: 30px; font-weight:bold">Edit Room</h1>
               <form action="{{url('update_room', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_deg">
                    <label>Room Title</label>
                    <input type="text"  name="title" placeholder="Enter room title" value="{{$data->room_title}}">

                    
                   
                </div>

                <div class="div_deg">
                      <label>Room Description</label>
                   <textarea  name="description" placeholder="Enter room description" >{{$data->description}}</textarea>

                   
                </div>

                <div class="div_deg">
                    <label>Room Price</label>
                    <input type="number"  name="price" placeholder="Enter room price" value="{{$data->price}}">
                </div>

                <div class="div_deg">
                    <label>Room Type</label>
                    <select name="type" >
                        <option {{ $data->room_type == 'regular' ? 'selected' : '' }} value="regular">Regular</option>
                        <option {{ $data->room_type == 'primium' ? 'selected' : '' }} value="primium">Primium</option>
                        <option {{ $data->room_type == 'delux' ? 'selected' : '' }} value="delux">Delux</option>
                    </select>
                </div>

                 <div class="div_deg">
                    <label>Free wifi</label>
                    <select name="wifi" >
                        <option {{ $data->wifi == 'yes' ? 'selected' : '' }} value="yes">Yes</option>
                        <option {{ $data->wifi == 'no' ? 'selected' : '' }} value="no">No</option>
                       
                    </select>
                </div>

                 <div class="div_deg">
                        <label>Current Image</label>
                       
                        <img width="100" height="50" src="roomimage/{{$data->image}}"  style="margin:auto">
                    </div>

                    <div class="div_deg">
                        <label>Room Image</label>
                        <input type="file"  name="image"  >
                      
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit"  value="Update Room">
                    </div>
               </form>
            </div>


          </div>
        </div>
      </div>
        @include('admin.footer')
 
    </body>
</html>