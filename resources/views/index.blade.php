@extends('_layouts.master')

@section('page.content')
	@foreach($shoutouts as $shoutout)
		<div class="mdl-grid">
			<div class="mdl-layout-spacer"></div>

			<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
				<div class="card-wide mdl-card mdl-shadow--2dp mdl-cell--12-col">
					<div class="mdl-card__title">
						<h2 class="mdl-card__title-text">
							{{ '@' . $shoutout->handle }}
							<strong>
								<small>&nbsp;said:</small>
							</strong>
						</h2>
					</div>

					<div class="mdl-card__supporting-text">{{ $shoutout->content }}</div>

					<div class="mdl-card__actions mdl-card--border">
						<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
							href="https://twitter.com/{{ $shoutout->handle }}" target="_blank">
							{{ 'Visit @' . $shoutout->handle }}
						</a>
					</div>
				</div>
			</div>
			
			<div class="mdl-layout-spacer"></div>
		</div>
	@endforeach
@stop
