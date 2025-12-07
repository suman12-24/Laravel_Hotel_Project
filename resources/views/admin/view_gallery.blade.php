<!DOCTYPE html>
<html>
  <head> 
 @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
     
     
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">

    
            <center>
                <h1 style="font-size:40px; font-weight:bolder; color:white"> Gallery</h1>
                <div class="row">
                 @foreach ($gallery as $gallery)
                 <div class="col-md-4">
                 <img src="/galleryimage/{{ $gallery->image }}" style="padding:10px;" height="200" width="300">
                
                 <a href="{{url('delete_gallery/'.$gallery->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')"><i class="fa fa-trash" style="padding: 5px"></i>Delete</a>
                 </div>
                 @endforeach
                 </div>
                <form action="{{url('upload_gallery')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:30px;">
                    <label style="color:white;font-weight:bold; font-size:20px">Upload Image</label>
                    <input type="file" name="image" required>
                    <input type="submit" value="Add Image" class="btn btn-primary">
                </div>
            </form>
            </center>
        </div>
      </div>
    </div>
      
        @include('admin.footer')
 
    </body>
</html>