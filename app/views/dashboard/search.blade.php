@extends('layouts.default')

@section('title')
Search result for "{{ $keyword }}"
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			<table class="offense table">
				<thead >
					<tr>
						<th width="150px">Section</th>
						<th width="114px">1st</th>
						<th width="114px">2nd</th>
						<th width="114px">3rd</th>
						<th width="114px">4th</th>
						<th width="114px">5th</th>
					</tr>
				</thead>
				<tbody>
					@foreach($offenses as $offense)
					<tr>
						<td><strong>{{ $offense->group_id }}.{{ $offense->section }}</strong> {{ $offense->description }}</td>
						<?php $ctr = 0; ?>
						@foreach($offense->actions as $action)
							<?php $ctr++; ?>
							<td>{{ $action->description }}</td>
						@endforeach
						@for($i=0;$i<(5-$ctr);$i++)
							<td></td>
						@endfor
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection