@extends('layouts.default')

@section('title')
{{ $group->description }}
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			<table class="offense table">
				<thead >
					<tr>
						<th width="150px">Section</th>
						<th>1st</th>
						<th>2nd</th>
						<th>3rd</th>
						<th>4th</th>
						<th>5th</th>
					</tr>
				</thead>
				<tbody>
					@foreach($offenses as $offense)
					<tr>
						<td><strong>{{ $offense->group_id }}.{{ $offense->section }}</strong> {{ $offense->description }}</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection