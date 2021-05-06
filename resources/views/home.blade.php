@extends('layouts.app')

@section('content')
<div class="container" style="position: relative;top: 100px; left: 0px;">
    <div class="row profile" >
		<div class="col-md-3">
			<div class="profile-sidebar" >
				<!-- SIDEBAR USERPIC -->
					<img src="{{asset('assets/'.Auth::user()->avatar)}}" class="img-responsive profile-userpic" alt="">
				
				<!-- END SIDEBAR USERPIC -->
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
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div>
	</div>
@endsection
