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
				<router-view></router-view>
 
           </div>
		</div>
	</div>
@endsection
