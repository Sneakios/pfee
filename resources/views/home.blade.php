@extends('layouts.app')

@section('content')
<div class="container" style="position: relative;top: 100px; left: 0px;">
    <div class="row profile" >
		<div class="col-md-3">
			<div class="profile-sidebar" >
				<!-- SIDEBAR USERPIC -->
					<img src="{{asset('assets/avatars/'.Auth::user()->avatar)}}" class="img-responsive profile-userpic" alt="">
				
				<!-- END SIDEBAR USERPIC -->
				<div class="profile-userbuttons" >
					<form method="POST" action="{{ route('change_avatar') }}" enctype="multipart/form-data">
						@csrf
						<div style="width: 250px;">
							<input type="file" name="picture" class="btn" style="margin-left: 80px;color: white;margin-top: 10px;">
							<button type="submit" class="btn btn-primary" style="margin-left: 25px;width: 120px;border-radius: 30px;">Change Image</button>
						</div>
					</form>
				</div>
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{Auth::user()->name}}
					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<div class="form-row" style="border:1px #bef5cb solid;margin:5px;background-color:#dcffe4;">
				  <div  role="alert" class="form-group col-md-10">
					 <p style="font-size:13px;margin:5px"><span style="font-weight: bold"> ProTip!</span> Updating your profile with your specialty, location, and a profile picture helps other <b>HelpMe</b> users get to know you.</p>
				  </div>
					<div  class="form-group col-md-0">
						<router-link to="/Edit-Profile-Worker"><button style="border-radius: 5px;margin:5px;font-size:15px;background-color:limegreen;border: 2px limegreen solid;color:white;font-size:13px;font-weight:600"><svg  style="margin-bottom:3px;" height="16" viewBox="0 0 16 16" version="1.1" width="16" aria-hidden="true"><path style="fill:white" fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg> Edit profile</button></router-link>
					</div>
				</div>

				<router-view></router-view>
 
           </div>
		</div>
	</div>
@endsection
