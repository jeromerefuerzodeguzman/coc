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
					</tr>
				</thead>
				<tbody>
					@foreach($groups as $group)
					<tr>
						<td>{{ HTML::link("group/".$group->id, strtoupper($group->description)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			You can add another {{ HTML::link("group/add", "here..") }}
			@else
			No group yet. You can add {{ HTML::link("group/add", "here..") }}
			@endif
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$(".delete").click(function(e){
			$( "#dialog-confirm" ).open();
		});

		$( "#dialog-confirm" ).dialog({
			autoOpen: false,
			height: 150,
			modal: true,
			buttons: {
				Delete: function() {
					return true;
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
		});
	</script>
@endsection