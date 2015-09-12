<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A shoutbox for Scotch.io">
    <meta id="pusher_key" content="{{ env('PUSHER_KEY') }}">

	<title>Welcome - Scotchbox</title>
	
    <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.4/material.deep_purple-purple.min.css" /> 
    <link rel="stylesheet" href="/css/style.min.css">

	<link rel="canonical" href="{{ route('home') }}">
	<link id="site_image" content="http://i.imgur.com/WI7Ckyw.jpg">

	@include('_partials.styles')
</head>
<body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		@include('_partials.header')

		<main class="mdl-layout__content">
			@include('_partials.notices')

			<div class="mdl-layout__tab-panel mdl-color--grey-100 is-active" id="shoutouts">	
				@forelse($shoutouts as $shoutout)
					@include('_partials.shoutout', compact('shoutout'))
				@empty
					<h1>Nothing to Show</h1>
				@endforelse

				{!! $shoutouts->render() !!}
			</div>

			@include('_partials.add-shoutout')

			@include('_partials.footer')
		</main>
    </div>

	<script src="//storage.googleapis.com/code.getmdl.io/1.0.4/material.min.js"></script>
	<script src="//js.pusher.com/2.2/pusher.min.js"></script>
	<script src="/js/main.js"></script>
  </body>
</html>
