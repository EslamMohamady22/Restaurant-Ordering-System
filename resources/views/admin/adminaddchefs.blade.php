<x-app-layout>

</x-app-layout>

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
        <div style="position: relative; top:30px; right:-60px" >
            <form method="POST" action="{{ url('/adminaddnewchef') }}" enctype="multipart/form-data">
                @csrf
    
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" style="color: black" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="Title" />
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="speciality" value="{{ __('Speciality') }}" />
                    <x-jet-input id="speciality" style="color: black" class="block mt-1 w-full" type="text" name="speciality" :value="old('speciality')" required />
                </div>

                <div class="mt-4">
                  <x-jet-label for="facebook_link" value="{{ __('facebook_link') }}" />
                  <x-jet-input id="facebook_link" style="color: black" class="block mt-1 w-full" type="text" name="facebook_link" :value="old('facebook_link')" required />
              </div>
              <div class="mt-4">
                <x-jet-label for="instagram_link" value="{{ __('instagram_link') }}" />
                <x-jet-input id="instagram_link" style="color: black" class="block mt-1 w-full" type="text" name="instagram_link" :value="old('instagram_link')" required />
            </div>
            <div class="mt-4">
              <x-jet-label for="twitter_link" value="{{ __('twitter_link') }}" />
              <x-jet-input id="twitter_link" style="color: black" class="block mt-1 w-full" type="text" name="twitter_link" :value="old('twitter_link')" required />
          </div>
    
                <div class="mt-4">
                    <x-jet-label for="chefimage" value="{{ __('ChefImage') }}" />
                    <x-jet-input style="color: black" id="chefimage" class="block mt-1 w-full" type="file" name="chefimage" required autocomplete="chefimage" />
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
                        {{ __('AddNewChef') }}
                    </x-jet-button>
                </div>
            </form>
            
            <div style=" top:30px; right:-60px"  >
                <table style="bgcolor:rgba(128, 128, 128, 0); border:3px">
                  <tr >
                    <th style="padding: 50px;  color:whitesmoke" >Name</th>
                    <th style="padding: 50px">Speciality</th>
                    
                    <th style="padding: 50px">ChefImage</th>
                    <th style="padding: 50px">Action</th>
                    
                  </tr>
                  @foreach ($showchefs as $showchef)
                    <tr>
                      <td style="padding: 50px ;">{{$showchef->name}}</td>
                      <td style="padding: 50px">{{$showchef->speciality}}</td>
                      
                      <th style="padding: 50px"><img width="170px"   src="ChefImagefolder/{{$showchef->image}}"/></th>
                        <td><a href="{{url('/updatechef',$showchef->id)}}">Update</a></td>
                        <td><a href="{{url('/deletchef',$showchef->id)}}">Delet</a></td>              
                    </tr>
                  @endforeach
               
                </table>
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
