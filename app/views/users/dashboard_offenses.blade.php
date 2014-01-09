@extends('layouts.default')

@section('title')
{{ $group->description }}
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			<table class="offense table">
				<thead>
					<tr>
						<th width="150px">Section</th>
						<th>1st Offense</th>
						<th>2nd Offense</th>
						<th>3rd Offense</th>
						<th>4th Offense</th>
						<th>5th Offense</th>
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