<!DOCTYPE html>
<html>
<head>
	<title id="Title">E-Student Wallet Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

     <style type="text/css">
     	@font-face {
			font-family: 'Material Icons';
			font-style: normal;
			font-weight: 400;
			src: url(/MaterialIcons-Regular.eot); /* For IE6-8 */
			src: local('Material Icons'),
				local('MaterialIcons-Regular'),
				url(/MaterialIcons-Regular.woff2) format('woff2'),
				url(/MaterialIcons-Regular.woff) format('woff'),
				url(/MaterialIcons-Regular.ttf) format('truetype');
		}
		.material-icons {
			font-family: 'Material Icons';
			font-weight: normal;
			font-style: normal;
		  	-size: 24px;  /* Preferred icon size */
			display: inline-block;
			line-height: 1;
			text-transform: none;
			letter-spacing: normal;
			word-wrap: normal;
			white-space: nowrap;
			direction: ltr;

			/* Support for all WebKit browsers. */
			-webkit-font-smoothing: antialiased;
			/* Support for Safari and Chrome. */
			text-rendering: optimizeLegibility;

			/* Support for Firefox. */
			-moz-osx-font-smoothing: grayscale;

			/* Support for IE. */
			font-feature-settings: 'liga';
		}
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type=number] {
			-moz-appearance: textfield;
		}
		
		.hide {
			position: absolute;
			visibility: hidden;
		}

		.a-hover:hover {
			background: transparent !important;
		}

		.hideScrollbar::-webkit-scrollbar {
			width: 0px;
		}
		 
		.hideScrollbar::-webkit-scrollbar-track {
		  	background: white;
		  	/*outline: 1px solid white*/
		}
		 
		.hideScrollbar::-webkit-scrollbar-thumb {
		  	background: black;
		  	/*outline: 1px solid white;*/
		}

     </style>
</head>
<body>
	<div id="root">

	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.com/libraries/Chart.js"></script>
	
	<script type="text/javascript">
		$("#root").load(window.location+ "/LoadView?<?php echo $QueryParam; ?>")
	</script>
</body>
</html>