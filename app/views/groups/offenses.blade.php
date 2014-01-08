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
														<th class="large-1">Section</th>
														<th>Description</th>
														<th class="large-1">Action</th>
													</tr>
												</thead>
												<tbody>
													@foreach($offenses as $offense)
													<tr>
														<td>{{ $offense->section }}</td>
														<td>{{ $offense->description }}</td>
														<td></td>
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