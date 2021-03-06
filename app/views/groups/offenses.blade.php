@extends('layouts.default')

@section('title')
{{ $group->description }}
@endsection

@section('content')
	@if(isset($group))
		<div class="row">
			<div class="large-12 columns">
				<div class="section-container tabs" data-section="tabs">
					<section>
						<p class="title" data-section-title>{{ HTML::link("group/".$group->id, "Info"); }}</p>
					</section>
					<section class="active">
						<p class="title" data-section-title><a href="#info">Offense</a></p>
						<div class="content" data-section-content>
							<div class="row">
								<div class="large-12 columns">
									<div class="row">
										<div class="large-12 columns">
											<table class="large-12">
												<thead>
													<tr>
														<th class="large-2 text-left">Description</th>
														<th class="large-2 text-center">1ST</th>
														<th class="large-2 text-center">2ND</th>
														<th class="large-2 text-center">3RD</th>
														<th class="large-2 text-center">4TH</th>
														<th class="large-2 text-center">5TH</th>
													</tr>
												</thead>
												<tbody>
													@foreach($offenses as $offense)
													<tr>
														<td class="text-justify"><a href="#" data-tooltip class="edit-link" title="Edit" id="{{ $offense->id }}">{{ $offense->section.'. '.$offense->description }}</a></td>
														<?php 
															//populate actions
															$ctr = 0;
															$holder = array();
															foreach ($offense->actions as $action) {
																$holder[$action->order] = $action->description;
															}
														?>
														@for($i=1;$i<6;$i++)
															@if(isset($holder[$i]))
																<td>{{ $holder[$i] }}</td>
															@else
																<td></td>
															@endif
														@endfor
													</tr>
													@endforeach
												</tbody>
											</table>
											<a href="#" data-tooltip class="has-tip tip-right" title="Add new offense" data-reveal-id="myModal"><i class="general foundicon-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	@endif
@endsection

@section('popups')
<div id="myModal" class="reveal-modal small" data-reveal>
	<h4>Add New Offense</h4>
	<hr />
	<div class="large-12">
		{{ Form::open(array('url' => 'group/'.$group->id.'/offense/add', 'method' => 'post', 'class' => 'custom')) }}
		<fieldset>
	    	<legend>Fillup fields</legend>
			<div class="row">
				<div class="large-12">
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">Offense Group</label>
						</div>
						<div class="large-9 columns">
							{{ $group->description }}
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">Section</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('section'))
								{{ Form::text('section', Input::old('section'), array('class'=>'error')) }}
								<small class="error">{{ $errors->first('section') }}</small>
							@else
								{{ Form::text('section', Input::old('section')) }}
							@endif
						</div>
					</div>
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
					<h6>Offense</h6>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">1ST</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('1st'))
								{{ Form::select('1st', $actions, '', array('class'=>'error')) }}
								<small class="error">{{ $errors->first('1st') }}</small>
							@else
								{{ Form::select('1st', $actions) }}
							@endif
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">2ND</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('2nd'))
								{{ Form::select('2nd', $actions, '', array('class'=>'error')) }}
								<small class="error">{{ $errors->first('2nd') }}</small>
							@else
								{{ Form::select('2nd', $actions) }}
							@endif
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">3RD</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('3rd'))
								{{ Form::select('3rd', $actions, '', array('class'=>'error')) }}
								<small class="error">{{ $errors->first('3rd') }}</small>
							@else
								{{ Form::select('3rd', $actions) }}
							@endif
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">4TH</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('4th'))
								{{ Form::select('4th', $actions, '', array('class'=>'error')) }}
								<small class="error">{{ $errors->first('4th') }}</small>
							@else
								{{ Form::select('4th', $actions) }}
							@endif
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">5TH</label>
						</div>
						<div class="large-9 columns">
							@if($errors->has('5th'))
								{{ Form::select('5th', $actions, '', array('class'=>'error')) }}
								<small class="error">{{ $errors->first('5th') }}</small>
							@else
								{{ Form::select('5th', $actions) }}
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


<div id="editModal" class="reveal-modal small" data-reveal>
	<h4>Edit Offense</h4>
	<hr />
	<div class="large-12">
		{{ Form::open(array('url' => 'offense/update', 'method' => 'post', 'class' => 'custom', 'id' => 'editForm')) }}
		<fieldset>
	    	<legend>Fillup fields</legend>
			<div class="row">
				<div class="large-12">
					<h6>Offense</h6>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">1ST</label>
						</div>
						<div class="large-9 columns">
							{{ Form::select('e1', $actions, '', array('id' => 'e1')) }}
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">2ND</label>
						</div>
						<div class="large-9 columns">
							{{ Form::select('e2', $actions, '', array('id' => 'e2')) }}
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">3RD</label>
						</div>
						<div class="large-9 columns">
							{{ Form::select('e3', $actions, '', array('id' => 'e3')) }}
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">4TH</label>
						</div>
						<div class="large-9 columns">
							{{ Form::select('e4', $actions, '', array('id' => 'e4')) }}
						</div>
					</div>
					<div class="row">
						<div class="large-3 columns">
							<label for="right-label" class="right inline">5TH</label>
						</div>
						<div class="large-9 columns">
							{{ Form::select('e5', $actions, '', array('id' => 'e5')) }}
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
		{{ Form::hidden('eid', 0, array('id' => 'eid')) }}
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
	<script type="text/javascript">
        $('.edit-link').click(function(){
			var id = $(this).attr('id');
			$('#eid').val(id);
			
			$.getJSON( "{{ URL::to('/') }}/offense/"+ id +"/getinfo", function( data ) {
				var items = [];
				$.each( data, function( key, val ) {
					$("#e" + val['order'] + " option[value='" + val['action_id'] + "']").attr("selected", "selected");
					//$('#e' + val['order']).val(val['action_id']);
					Foundation.libs.forms.refresh_custom_select($('#e' + val['order']), true);
				});
				
				$('#editModal').foundation('reveal', 'open');
			});

		});

		@if(count($errors)>0)
			$('#{{ Session::get('from') }}Modal').foundation('reveal', 'open');
		@endif
	</script>
@endsection