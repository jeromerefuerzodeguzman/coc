@extends('layouts.default')

@section('title')
Offenses Against
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			<table>
				<?php $ctr=0; ?>
				@foreach($groups as $group)
				@if($ctr==0)
					<tr>
						<td>
							<div class="panel radius callout">
								{{ HTML::link("dashboard/".$group->id, strtoupper($group->description)) }}</td>
							</div>
						</td>
					<?php $ctr++; ?>
				@else
						<td>
							<div class="panel radius callout">
								{{ HTML::link("dashboard/".$group->id, strtoupper($group->description)) }}</td>
							</div>
						</td>
						<?php $ctr=0; ?>
					</tr>
				@endif
				@endforeach
			</table>
		</div>
	</div>
@endsection