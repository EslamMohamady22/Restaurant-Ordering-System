
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
    @include('admin.navbar')
        <!-- partial -->
              
        <div style="position: relative; top:70px; right:-60px" >
                <form method="POST" action="{{ url('/AddFood') }}" enctype="multipart/form-data">
                    @csrf
        
                    <div>
                        <x-jet-label for="Title" value="{{ __('Title') }}" />
                        <x-jet-input id="Title" style="color: black" class="block mt-1 w-full" type="text" name="Title" :value="old('Title')" required autofocus autocomplete="Title" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="Price" value="{{ __('Price') }}" />
                        <x-jet-input id="Price" style="color: black" class="block mt-1 w-full" type="text" name="Price" :value="old('Price')" required />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="FoodImage" value="{{ __('FoodImage') }}" />
                        <x-jet-input style="color: black" id="FoodImage" class="block mt-1 w-full" type="file" name="FoodImage" required autocomplete="FoodImage" />
                    </div>
                    <div class="mt-4">
                      <x-jet-label for="Department" value="{{ __('Department') }}" />
                      <x-jet-input style="color: black" id="Department" class="block mt-1 w-full" type="text" name="Department" required autocomplete="Department" />
                  </div>
                    <div class="mt-4">
                        <x-jet-label for="Descreption" value="{{ __('Descreption') }}" />
                        <x-jet-input style="color: black" id="Descreption" class="block mt-1 w-full" type="text" name="Descreption" required autocomplete="Descreption" />
                    </div>
                    <div class="mt-4">
                      <x-jet-label for="chef" value="{{ __('Offer?') }}" />
                      <x-jet-input style="color: black" id="Offer" class="block mt-1 w-full" type="text" name="Offer" required autocomplete="Offer" />
                  </div>
                  <div class="mt-4">
                    <x-jet-label for="type_of_mail" value="{{ __('Share Or Double Or Single ?') }}" />
                    <x-jet-input style="color: black" id="type_of_mail" class="block mt-1 w-full" type="text" name="type_of_mail" required autocomplete="type_of_mail" />
                </div>
                    <div class="mt-4">
                      <x-jet-label for="chef" value="{{ __('Chef') }}" />
                      <x-jet-input style="color: black" id="chef" class="block mt-1 w-full" type="text" name="chef" required autocomplete="chef" />
                  </div>
        
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>
        
                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif
        
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
        
                        <x-jet-button class="ml-4">
                            {{ __('AddNewFood') }}
                        </x-jet-button>
                    </div>
                </form>
<hr style="color: aliceblue" />
                <div style=" top:10px; right:-60px"  >
                    <table style="bgcolor:rgba(128, 128, 128, 0); border:3px">
                      <tr >
                        <th style="padding: 50px;  color:whitesmoke" >Title</th>
                        <th style="padding: 50px">Price</th>
                        <th style="padding: 50px">Descreption</th>
                        <th style="padding: 50px">FoodImage</th>
                        <th style="padding: 50px">Action</th>
                        
                      </tr>
                      @foreach ($food as $foods)
                        <tr>
                          <td style="padding: 50px ;">{{$foods->title}}</td>
                          <td style="padding: 50px">{{$foods->price}}EL</td>
                          <td style="padding: 50px">{{$foods->description}}</td>
                          <th style="padding: 50px"><img  src="FoodImagefolder/{{$foods->image}}"/></th>
                          
                            <td><a href="{{url('/deletfood',$foods->id)}}">Delet</a></td>
                            <td><a href="{{url('/updatefood',$foods->id)}}">Delet</a></td>
                                          
                        </tr>
                      @endforeach
                   
                    </table>
                 </div>    
             </div>
             
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
   @include('admin.scriept')
    <!-- End custom js for this page -->
  </body>
</html>
