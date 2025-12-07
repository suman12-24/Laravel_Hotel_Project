<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')
    <style>
        .table_deg{
            border: 2px solid white;
            width: 80%;
            margin: auto;
            text-align: center;
            margin-top: 40px;
        }
        .th_deg{
            background-color: skyblue;
           
            padding: 15px;
        }
 tr{
    border: 3px solid white;
    
 }

 td{
    padding: 10px;
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

            <table class="table_deg">
              <tr>
                <th class=th_deg>Room Title</th>
                  <th class=th_deg> Room Description</th>
                     <th class=th_deg>Room Price</th>
                     <th class=th_deg>Wifi</th>
                <th class=th_deg>Room Type</th>
                <th class=th_deg>Room Image</th>
                <th class=th_deg>Action</th>
              </tr>
            
              @foreach ($data as $data )
                  
            
              <tr>
                <td>{{$data->room_title}}</td>
                <td>{!! Str::limit($data->description, 50) !!}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->wifi}}</td>
                <td>{{$data->room_type}}</td>
                <td><img width="100" src="roomimage/{{$data->image}}" alt=""></td>
                <td>

    <!-- Edit Button -->
    <a href="{{ url('edit_room', $data->id) }}" 
       class="btn btn-warning btn-sm" 
       title="Edit" style="margin:5px">
        <i class="fa fa-edit"></i>
    </a>

    <!-- Delete Button -->
    <a onclick="return confirm('Are you sure to delete this?')" 
       href="{{ url('delete_room', $data->id) }}" 
       class="btn btn-danger btn-sm" 
       title="Delete">
        <i class="fa fa-trash"></i>
    </a>

</td>


                     
              </tr>
                   @endforeach 
            </table>
          </div>
        </div>
  </div>

        @include('admin.footer')
 
    </body>
</html>