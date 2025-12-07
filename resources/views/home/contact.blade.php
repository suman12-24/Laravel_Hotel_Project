 <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">

               <div class="col-md-6">

                  <form id="request" class="main_form" action="{{ url('contact') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-12 ">
                           <input class="contactus" placeholder="Name" type="type" name="name" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Email" type="email" name="email" required> 
                        </div>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="Phone Number" type="number" name="phone" required>                          
                        </div>
                        <div class="col-md-12">
                           <textarea class="textarea" placeholder="Message" type="type" name="message" required></textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="send_btn">Send</button>
                        </div>
                     </div>
                  </form>
                  @if(session('message'))
                  <div class="alert alert-success" style="margin-top:10px;" role="alert">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                     {{ session('message') }}
                     
                  </div>
                  @endif
               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215582.38295353917!2d88.18254112599966!3d22.535343439863773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f882db4908f667%3A0x43e330e68f6c2cbc!2sKolkata%2C%20West%20Bengal!5e1!3m2!1sen!2sin!4v1764937976048!5m2!1sen!2sin" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


