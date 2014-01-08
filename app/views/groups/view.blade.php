@extends('layouts.default')

@section('title')
{{ $group->description }}
@endsection

@section('content')
	@if(isset($group))
		<div class="row">
			<div class="large-12 columns">
				<div class="section-container tabs" data-section="tabs">
					<section class="section">
						<p class="title" data-section-title><a href="#info">Info</a></p>
						<div class="content" data-section-content>
							<div class="row">
								<div class="large-12 columns">
									<div class="row">
										<div class="large-12 columns">
											<h5>Details</h5>
											<table class="large-12">
												<tr>
													<td><h5 class="subheader">Description</h5></td><td>{{ $group->description }}</td>
												</tr>
												<tr>
													<td><h5 class="subheader">Offenses</h5></td><td>{{ count($group->offenses) }}</td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<section>
						<p class="title" data-section-title>{{ HTML::link("group/".$group->id."/offense", "Offense"); }}</p>
					</section>
				</div>
			</div>
		</div>
	@endif
@endsection