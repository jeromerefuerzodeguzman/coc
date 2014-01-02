@extends('layouts.default')

@section('title')
Welcome {{ strtoupper($user->usertype->name) }}
@endsection


@section('content')
		{{ Form::open(array('url' => 'sales_list', 'method' => 'post', 'class' => 'custom')) }}
		<div class="row">
			<div class="large-4 columns">
				<div class="row collapse">
					<div class="small-3 columns">
						<span class="prefix">{{ Form::label('date', 'Date:') }}</span>
					</div>
					<div class="small-5 columns">
						{{ Form::text('date', $date, array('id' => 'datepicker')) }}
					</div>
					<div class="small-4 columns">
						<span class="postfix">{{ Form::submit('Search') }}</span>
					</div>
				</div>
			</div>
		</div>
		{{ Form::token() }}
		{{ Form::close(); }}
		<div>
			{{ Form::text('test_onkey_input', '' , array('id' => 'ontest', 'placeholder' => 'Search SALE here...')) }}
		</div>
		<h6 style="text-decoration: underline">SALES TODAY</h6>
		<table style="font-size: 14px;" width="720px" >
			<thead>
				<tr>
				@foreach($labels as $label)
					<th>{{ $label->label }}</th>
				@endforeach
			</tr>
			</thead>
			<tbody>
				@foreach($records as $record)
				<tr>
					@foreach($labels as $label)
					<td>{{ $answers[$record->id][$label->id] }}</td>
					@endforeach
				</tr>
				@endforeach
			</tbody>
		</table>
@endsection

@section('scripts')
	<script>
		function mouseOn(x) {
			x.style.backgroundColor='#D2E0F5';
		}

		function mouseOut(x) {
			x.style.backgroundColor='#FFFFFF';
		}

		$(function() {
			$("#datepicker").datepicker({ dateFormat: "mm-dd-yy" });
		});

		//Filter table 
		//add index column with all content.
		$("table tr:has(td)").each(function(){
			var t = $(this).text().toLowerCase(); //all row text
			$("<td class='indexColumn'></td>").hide().text(t).appendTo(this);
			});//each tr
		$("#ontest").keyup(function(){
			var s = $(this).val().toLowerCase().split(" ");
			if(s == "") {
				$("table tr:hidden").show();
			} else {
				//show all rows.
				$("table tr:hidden").show();
				$.each(s, function(){
					$("table tr:visible .indexColumn:not(:contains('"+ this + "'))").parent().hide();
				});//each
			}
		});//key up.
	</script>
@endsection