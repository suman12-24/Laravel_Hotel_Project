 <div  class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>gallery</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach ($gallery as $image)
               <div class="col-md-3 col-sm-6">
                  <div class="gallery_img">
                     <figure><img src="/galleryimage/{{$image->image}}" alt="#" style="height:200px; width:350px"/></figure>
                  </div>
               </div>
              @endforeach
            </div>
         </div>
      </div>