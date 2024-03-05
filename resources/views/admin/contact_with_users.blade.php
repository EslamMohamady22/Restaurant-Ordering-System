



<!--******************************************************-->



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: blue;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
</head>
<body>

<h2>Chat Messages</h2>
@foreach ($contact_data as $data)
  @if ($data->sender == "admin_sender")
      @foreach ($user_data as $item)
          
      @endforeach
      <div class="container">
        <img src="data:image/jpeg;base64,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" alt="{{$item->name}}" style="width:100%;">
        <p>{{$data->massage}}</p>
        <span class="time-right">{{$data->created_at}}</span>
      </div>
  @else
      @foreach ($admin_data as $item)
          
      @endforeach

      <div class="container darker">
          
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOYc8fWmpam62kCKZGojfQK-GvYxT6sas8IkeZFjnkaLLz-Ia5uhfjDWqkUgUzEWZTais&usqp=CAU" alt="{{$item->name}}" class="right" style="width:100%;">
        <p>{{$data->massage}}</p>
        <span class="time-left">{{$data->created_at}}</span>
      </div>
  @endif
@endforeach

<div>
    @foreach ($user_id as $userid)
    
    @endforeach 
    <form method="POST" action="{{ url('/contact_with_users_post',$userid->id) }}" enctype="multipart/form-data">
                        
        @csrf
        <div style="width: 310px" >
                
            <x-jet-input id="cart" min=1    style="color: black ; width: 256% ; height:40px; margin-top:30px;" class="block mt-1 w-full" aria-placeholder="cart" type="text" name="massage" placeholder="Hay" required autofocus autocomplete="cart" />
            <x-jet-button class="ml-4" style="color: black ; width: 258% ; height:40px;  ">
            
            <input type="hidden" name="user_id" value="{{$userid->id}}" />
            <input type="hidden" name="sender" value="admin_sender" />
                {{ __('Add_New_Massage') }}
            </x-jet-button>
        </div>
    </form>  
    
</div>

</body>
</html>
