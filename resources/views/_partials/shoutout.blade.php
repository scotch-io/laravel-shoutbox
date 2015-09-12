<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
	<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop 
				mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100
				mdl-color-text--white mdl-layout--large-screen-only">

		<img src="{{ gravatar($shoutout->email, 'http://i.imgur.com/WI7Ckyw.jpg', 215) }}"
				alt="profile of {{ $shoutout->handle }}">
	</header>

	<div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
		<div class="mdl-card__supporting-text">
			<h4>
				{{ '@'. $shoutout->handle }}
				<strong>
					<small>&nbsp;said:</small>
				</strong>
			</h4>
			{{ $shoutout->content }}
		</div>
		<div class="mdl-card__actions">
			<a href="{{ 'https://twitter.com/' . $shoutout->handle }}"
				class="mdl-button" target="_blank">Visit {{ '@' . $shoutout->handle }}
			</a>
		</div>
	</div>
</section>
