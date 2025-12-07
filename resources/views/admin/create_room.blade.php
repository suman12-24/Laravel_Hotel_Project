<!DOCTYPE html>
<html>
  <head> 
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
                <h1 style="font-size: 30px; font-weight:bold">Add Room</h1>
               <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_deg">
                    <label>Room Title</label>
                    <input type="text"  name="title" placeholder="Enter room title" >

                    
                   
                </div>

                <div class="div_deg">
                      <label>Room Description</label>
                   <textarea  name="description" placeholder="Enter room description" ></textarea>

                   
                </div>

                <div class="div_deg">
                    <label>Room Price</label>
                    <input type="number"  name="price" placeholder="Enter room price" >
                </div>

                <div class="div_deg">
                    <label>Room Type</label>
                    <select name="type" >
                        <option selected value="regular">Regular</option>
                        <option value="primium">Primium</option>
                        <option value="delux">Delux</option>
                    </select>
                </div>

                 <div class="div_deg">
                    <label>Free wifi</label>
                    <select name="wifi" >
                        <option selected value="yes">Yes</option>
                        <option value="no">No</option>
                       
                    </select>
                </div>

                    <div class="div_deg">
                        <label>Room Image</label>
                        <input type="file"  name="image"  >
                    </div>

                    <div class="div_deg">
                        <input class="btn btn-primary" type="submit"  value="Add Room">
                    </div>
               </form>
            </div>


          </div>
        </div>
      </div>
        @include('admin.footer')
 
    </body>
</html>