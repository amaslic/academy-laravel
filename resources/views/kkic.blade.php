<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            label {
              padding : 20px;
            }

            input {
              margin-bottom : 15px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="content">
             {!! Form::model($affiliate,['action' => 'KkicController@store' , 'class' => 'form-horizontal form-label-left']) !!}

<h3>Your Details</h3> 

  <div class="form-group col-">
    <label >Affiliate Id</label>
     {!! Form::text('affiliate_id','',['required','class' => 'form-control']) !!}
  </div>
   <div class="form-group">
    <label >First Name</label>
   {!! Form::text('affiliate_fname','',['required','class' => 'form-control']) !!}

  </div>
   <div class="form-group">
    <label >Last Name</label>
  {!! Form::text('affiliate_lname','',['required','class' => 'form-control']) !!}

  </div>
  <div class="form-group">
    <label>Email</label>
  {!! Form::text('affiliate_email','',['required','class' => 'form-control']) !!}
  
  </div>


<h3>Your Friend</h3>


   <div class="form-group">
    <label >First Name</label>
  {!! Form::text('friend_fname','',['required','class' => 'form-control']) !!}
  </div>
   <div class="form-group">
    <label >Last Name</label>
    {!! Form::text('friend_lname','',['required','class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    <label>Email</label>
    {!! Form::text('friend_email','',['required','class' => 'form-control']) !!}
  </div>


<a href="{{ route('home') }}">Back</a>
  <button type="submit" class="btn btn-default">Send Invite</button>

</form>

  @if(Session::has('message'))
                        <div class="alert alert-success">
                          {{Session::get('message')}}
                        </div>
                    @elseif($errors->count()>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            {{ $error }}
                            <br/>
                            @endforeach
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                    @endif      
</div>
        </div>
    </body>
</html>


