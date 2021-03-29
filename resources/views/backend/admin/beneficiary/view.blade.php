@extends('layouts.backend')
@section('title','ভিজিডি উপকারভোগী')
@section('content')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-users"></i>
			</div>
			<div class="media-body">
				
				<h4>ভিজিডি উপকারভোগী তালিকা</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	<div class="contentpanel">
		<table id="basicTable" class="table table-striped  table-hover">
			<thead>
				<tr>
					<th>কার্ড নং</th>                    
					<th>এনআইডি নম্বর</th>
					<th>নাম</th>
                    <th>পিতার/স্বামীর নাম</th>
                    <th>মাতার নাম</th>
                    <th>ওয়ার্ড নং</th>
                    <th>গ্রাম</th>
					<th>মোবাইল নম্বর</th>
					<th>একশন</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>45654654556</td>
					<td>হাসানুজ্জামান কঞ্চন</td>
					<td>করিম মন্ডল</td>
					<td>করিমন বিবি</td>
                    <td>01</td>
					<td>হরিপুর</td>
					<td>01777615690</td>
					<td>   
						<a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-eye"></i></a>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-edit"></i></a>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
				
				<tr>
					<td>1</td>
					<td>45654654556</td>
					<td>হাসানুজ্জামান কঞ্চন</td>
					<td>করিম মন্ডল</td>
					<td>করিমন বিবি</td>
                    <td>01</td>
					<td>হরিপুর</td>
					<td>01777615690</td>
					<td>   
						<a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-eye"></i></a>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-edit"></i></a>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-trash-o"></i></a>
					</td>
				</tr>

                <tr>
					<td>1</td>
					<td>45654654556</td>
					<td>হাসানুজ্জামান কঞ্চন</td>
					<td>করিম মন্ডল</td>
					<td>করিমন বিবি</td>
                    <td>01</td>
					<td>হরিপুর</td>
					<td>01777615690</td>
					<td>   
						<a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-eye"></i></a>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-edit"></i></a>
                        <a href="profile.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true"> <i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div><!-- panel -->
</div><!-- mainwrapper -->
@endsection


