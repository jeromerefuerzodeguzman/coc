@extends('layouts.default')

@section('title')
Offenses Against
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			<div class="row">
				<div class="large-6 columns">
					{{ Form::open(array('url' => 'search', 'method' => 'post', 'class' => 'custom')) }}
					<fieldset>
						<legend>Section Search:</legend>
						<div class="row collapse">
							<div class="small-8 large-9 columns">
								{{ Form::text('description') }}
							</div>
							<div class="small-4 large-3 columns">
								<span class="postfix">{{ Form::submit('SEARCH', array('class' => 'small secondary button', 'style' =>  'height: 32px; width: 100%; position: absolute; left: 0px; top: 0px;')) }}</span>
							</div>
						</div>
						
					</fieldset>
					{{ Form::close(); }}
				</div>
			</div>
			<table>
				<?php $ctr=0; ?>
				@foreach($groups as $group)
				@if($ctr==0)
					<tr>
						<td>
							<div class="panel radius callout text-center">
								{{ HTML::link("dashboard/".$group->id, strtoupper($group->description)) }}</td>
							</div>
						</td>
					<?php $ctr++; ?>
				@else
						<td>
							<div class="panel radius callout text-center">
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