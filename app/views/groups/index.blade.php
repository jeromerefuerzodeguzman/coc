@extends('layouts.default')

@section('title')
Groups
@endsection

@section('content')
	<div class="row">
		<div class="large-12 columns">
			@if(count($groups) > 0)
			<table class="large-8">
				<thead>
					<tr>
						<th>Description</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($groups as $group)
					<tr>
						<td id="description_{{ $group->id }}">{{ HTML::link("group/".$group->id, strtoupper($group->description)) }}</td>
						<td><a href="#" data-tooltip class="has-tip tip-right edit-link" title="Edit" id="{{ $group->id }}"><i class="general foundicon-edit"></i></a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<a href="#" data-tooltip class="has-tip tip-right" data-reveal-id="addModal" title="Add new group"><i class="general foundicon-plus"></i></a>
		</div>
	</div>
@endsection

@section('popups')
<div id="editModal" class="reveal-modal small" data-reveal>
	<h4>Edit Group</h4>
	<hr />
	<div class="large-12">
		{{ Form::open(array('url' => '', 'method' => 'post', 'class' => 'custom form-edit')) }}
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
								{{ Form::textarea('description', Input::old('description'), array('id' => 'description', 'class' => 'error')) }}
								<small class="error">{{ $errors->first('description') }}</small>
							@else
								{{ Form::textarea('description', Input::old('description'), array('id' => 'description')) }}
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
		{{ Form::hidden('group_id', '', array('id' => 'group_id')) }}
		{{ Form::close() }}
	</div>
</div>

<div id="addModal" class="reveal-modal small" data-reveal>
	<h4>Add Group</h4>
	<hr />
	<div class="large-12">
		{{ Form::open(array('url' => 'group/add', 'method' => 'post', 'class' => 'custom')) }}
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
								{{ Form::textarea('description', Input::old('description'), array('id' => 'description', 'class' => 'error')) }}
								<small class="error">{{ $errors->first('description') }}</small>
							@else
								{{ Form::textarea('description', Input::old('description'), array('id' => 'description')) }}
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
	<script type="text/javascript">
		$('.edit-link').click(function(){
			var id = $(this).attr('id');
			var description = $('#description_' + id + ' a').html();
			$('#description').val(description);
			$('.form-edit').attr('action', '{{ URL::to('/'); }}/group/' + id + '/edit');
			$('#group_id').val(id);
			$('#editModal').foundation('reveal', 'open');
		});

		@if(count($errors)>0)
			$('#{{ Session::get('from') }}Modal').foundation('reveal', 'open');
		@endif
	</script>

@endsection