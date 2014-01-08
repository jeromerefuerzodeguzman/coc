@extends('layouts.default')

@section('title')
Actions
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			@if(count($actions) > 0)
			<table class="large-8">
				<thead>
					<tr>
						<th>Description</th>
					</tr>
				</thead>
				<tbody>
					@foreach($actions as $action)
					<tr>
						<td>{{ $action->description }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<a href="#" data-tooltip class="has-tip tip-right" title="Add new action" data-reveal-id="myModal"><i class="general foundicon-plus"></i></a>
		</div>
	</div>
@endsection

@section('popups')
<div id="myModal" class="reveal-modal small" data-reveal>
	<h4>Add New Action</h4>
	<hr />
	<div class="large-12">
		{{ Form::open(array('url' => 'action/add', 'method' => 'post', 'class' => 'custom')) }}
		<fieldset>
	    	<legend>Fillup fields</legend>
			<div class="row">
				<div class="large-12">
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">Description</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('description'))
								{{ Form::textarea('description', Input::old('description'), array('rows' => '15', 'class' => 'error')) }}
								<small class="error">{{ $errors->first('description') }}</small>
							@else
								{{ Form::textarea('description', Input::old('description'), array('rows' => '15')) }}
							@endif
							
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="large-12">
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline"></label>
						</div>
						<div class="large-9 columns">
							<input type="submit" class="button small">
						</div>
					</div>
				</div>
			</div>
		</fieldset>
		{{ Form::close() }}
	</div>
</div>

@endsection

@section('scripts')
@if(count($errors)>0)
	<script type="text/javascript">
		$('#myModal').foundation('reveal', 'open');
	</script>
@endif
@endsection