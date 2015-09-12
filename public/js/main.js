(function (){
	var form = document.getElementById('create-form'),
		csrfToken = document.getElementById('csrf-token').value

		errorContainer = document.getElementById('error-container'),
		errorHolder = document.getElementById('error');

	var notifyUser = function (data) {
		var data = data.shoutout;

		if (! ('Notification' in window)) {
			alert('Web Notification is not supported');

			return;
		}

		Notification.requestPermission(function(permission){
			var notification = new Notification('@'+ data.handle +' said:', {
				body: data.content,
				icon: document.getElementById('site_image').content
			});

			notification.onclick = function() {
				location.href = '/';
			}
		});
	};

	var loadPusher = function (){
		Pusher.log = function(message) {
			if (window.console && window.console.log) {
				window.console.log(message);
			}
		};

		var pusher = new Pusher(document.getElementById('pusher_key').content);
		var channel = pusher.subscribe('shoutout-added');

		channel.bind('App\\Events\\ShoutoutAdded', notifyUser);
	};

	var serializeData = function (){
		var fields = document.getElementsByClassName('ajax-content');
		var query = [];

		for (var i = 0; i < fields.length; i++)
		{
			query.push(encodeURIComponent(fields[i].name) + '=' + encodeURIComponent(fields[i].value));
		}

		return query.join('&');
	};

	var validationFailed = function (response){
		var response = JSON.parse(response);
		var errors = [];

		for (var i in response)
		{
			for (var j = 0; j < response[i].length; j++)
			{
				errors.push('<li>' + response[i][j] + '</li>');
			}
		}

		errorHolder.innerHTML = errors.join();

		errorContainer.classList.remove('hide');
	};

	var shoutoutAdded = function (){
		var classList = errorContainer.classList;

		errorContainer.innerHTML = "Shoutout Added";

		classList.remove('mdl-color--red');
		classList.add('mdl-color--green');
		classList.remove('hide');

		setTimeout(function (){
			classList.add('hide');
		}, 5000);
	};

	var submitRequest = function (){
		var xhr = new XMLHttpRequest();

		xhr.onreadystatechange = function (){
			if (xhr.readyState === XMLHttpRequest.DONE) {
				if (xhr.status === 201) {
					return shoutoutAdded();
				}

				if (xhr.status === 422) {
					return validationFailed(xhr.response);
				}

				console.warn(xhr.status, xhr.responseText, xhr.responseJSON);
			}
		};

		xhr.open(form.method.toUpperCase(), form.action, true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

		xhr.send(serializeData());
	};

	form.addEventListener('submit', function(e) {
		submitRequest();

		e.preventDefault();
	});

	loadPusher();
})();
