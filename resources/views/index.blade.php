<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webmisr</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/main.css">
</head>
<body>

        {{--  start carousel --}}
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($silderimages as $silderimage)
              @if($silderimage->id==1)
            <div class="carousel-item active">
            <img class="d-block w-100" src="images/{{$silderimage->sliderimage}}" alt="{{$silderimage->sliderimage}}">
              </div>
              @else
            <div class="carousel-item ">
                <img class="d-block w-100" src="images/{{$silderimage->sliderimage}}" alt="{{$silderimage->sliderimage}}">
                  </div>
              @endif
            @endforeach
         
       
        </div>
      </div>

      {{--  End carousel --}}
 <div class="container  mt-4">
<div class="row">
  <div class="col-2"></div> 
    
  <div class=" col-8">
   

      @if ($message = Session::get('success'))

      <div class="alert alert-success alert-block">

          <button type="button" class="close" data-dismiss="alert">×</button>

              <strong>{{ $message }}</strong>

      </div>
      @endif




      @if ($message = Session::get('erorr'))

      <div class="alert alert-danger alert-block">

          <button type="button" class="close" data-dismiss="alert">×</button>

              <strong>{{ $message }}</strong>

      </div>
      @endif

      @if (count($errors) > 0)

      <div class="alert alert-danger">

          <strong>Whoops!</strong> There were some problems with your input.

          <ul>

              @foreach ($errors->all() as $error)

                  <li>{{ $error }}</li>

              @endforeach

          </ul>

      </div>

  @endif
      <h2>Basic information </h2>
      <form name="registration"  method="POST" enctype="multipart/form-data"  action="/register">
          {{ csrf_field() }}
          <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fristname">frist name</label>
                  <input type="text" class="form-control"  name="fristname" placeholder="frist name">
                </div>
                <div class="form-group col-md-6">
                  <label for="lastname">last  name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="last name">
                </div>
              </div>
   
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email"  placeholder="Email"  name="email">
          </div>
   
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password"  name="password" placeholder="password (6 or more charater)" name="password">
          </div>

          <div class="form-group">
                <label for="confirmpassword"> confirm Password:</label>
                <input type="password" class="form-control" id="confirmpassword"  placeholder="confirm Password"  name="confirmpassword">
            </div>
        

            <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text"  id="Address" class="form-control" name="adderss" placeholder="Address">
            </div> 



            <div class="form-group{{ $errors->has('userimage') ? ' has-error' : '' }}">
                    <label for="userimage">Uploade image</label>
                    <input type="file" class="form-control" id="userimage" name="userimage" placeholder="Attach photo">
                    @if ($errors->has('userimage'))
                    <span class="help-block">
                        <strong>{{ $errors->first('userimage') }}</strong>
                    </span>
                @endif
            </div>
          <h1>Activity</h1>

          <div class="form-group col-md-4">
                <label for="country_id">Choose Country</label>
                <select id="country_id" name="country_id" class="form-control">
                    <option value="0">- Select -</option>
                  @foreach ($countries as $country)
                  <option value="{{$country->id}}"> {{$country->country_name}} </option> 
                    @endforeach
                  
                </select>
          </div>
  
          <div class="form-group col-md-4">
                <label for="city_id">Choose City</label>
               
                <select id="city_id" name="city_id" class="form-control">
                  
                  <option value="0">- Select -</option>
                  @foreach ($cities as $city)
                  <option value="{{$city->id}}"> {{$city->city_name}} </option>
                  @endforeach
                </select>
      
          </div>

          <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Captcha</label>
            <div class="col-md-6">
                <div class="captcha">
                <span>{!! captcha_img() !!}</span>
                {{-- <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button> --}}
                </div>
                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                @if ($errors->has('captcha'))
                    <span class="help-block">
                        <strong>{{ $errors->first('captcha') }}</strong>
                    </span>
                @endif
            </div>
        </div>








          <div id="register_submit" class="form-group mt-4">
              <button style="cursor:pointer" type="submit" class="btn btn-primary btn-block">Join Now </button>
          </div>
        

      </form>
  </div>



  <div class="col-2"></div>


</div>


    </div>








      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
      <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>   
      <script src="js/main.js"></script> 
      {{-- <script>
      
 $(document).ready(function(){
$("#country_id").change(function(){
    var country_id = $(this).val();
    $.ajax({
        url: "{{route('getCites')}}",
        type: 'post',
        data: {country:country_id},
        dataType: 'json',
        success:function(response){
            var len = response.length;
            $("#city_id").empty();
            for( var i = 0; i<len; i++){
                var id = response[i]['id'];
                var city_name = response[i]['city_name'];
                $("#city_id").append("<option value='"+id+"'>"+city_name+"</option>");

            }
        }
    });
});      
      </script>
       --}}

       <script type="text/javascript">

        $(".btn-refresh").click(function(){
          $.ajax
          ({
             type:'GET',
             url:'/refresh_captcha',
             success:function(data){
                $(".captcha span").html(data.captcha);
             }
          });
          
        });
        </script>



</body>
</html>