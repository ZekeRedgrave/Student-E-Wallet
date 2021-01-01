<!DOCTYPE html>
<html>
<head>
	<title id="Title">E-Student Wallet Request</title>
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
			background: #375692 !important;
			color: white !important;
		}

		.button-hover:hover {
			border-right: 5px solid #375692;
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

		.companyBackground {
			background: #375692 !important;
		}

		.companyForeground {
			color: #ffffff !important;
		}

		.companyStatus {
			background: #e8d15f !important;
			color: #ffffff !important;
		}

		.companyLabel {
			color: #555555 !important;
			font-weight: bold;
		}

		.companyInput {
			color: #555555 !important;
			font-weight: bold;
			background: #eeeeee !important;
		}

		input, button, select, textarea {
			background: #e8d15f !important;
			color: #ffffff !important;
			width: 100%;
			font-size: 14px;
			font-weight: bold;
			border: 0px;
		}

     </style>
</head>
<body>
	<div class="position-fixed d-flex flex-column companyLabel" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
		<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 mb-4 shadow-sm">
				<div class="d-flex align-items-center" style="width: 100%; font-weight: bold;">REQUEST STUDENT</div>

				<button onclick="new Request().View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="width: 125px; font-size: 14px; font-weight: bold;">Refresh</button>
			</div>

			<div class="d-flex flex-row mb-1 ml-4 mr-4">
				<input id="View_Searchbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1 companyInput" style="width: 100%;" placeholder="Search Request Name or Student ID Only!">
				<button onclick="new Request().View_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Search</button>
				
				<div style="width: 100%"></div>
				<select id="View_ItemButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyInput" style="width: 125px; font-size: 14px; font-weight: bold;">
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<option value="200">200</option>
					<option value="500">500</option>
					<option value="1000">1000</option>
					<option value="999999999999">All (This is might you break your Browser or CPU)</option>
				</select>
				<button onclick="new Request().View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Load</button>
			</div>
			<table class="table" style="width: 100%; color: #375692;">
				<thead style="width: 100%">
					<tr class="d-flex flex-row align-items-center" style="width: 100%;">
						<th class="border-0" style="min-width: 200px; width: 100%; font-weight: bold;">Request Name</th>
						<th class="border-0" style="min-width: 200px; width: 100%; font-weight: bold;">Quantity</th>
						<th class="border-0" style="min-width: 200px; width: 100%; font-weight: bold;">Student Name</th>
						<th class="border-0" style="min-width: 200px; width: 100%; font-weight: bold;">Student ID</th>
						<th class="border-0 red-text" style="min-width: 200px; width: 100%; font-weight: bold;">Status</th>
						<th class="border-0" style="min-width: 200px; max-width: 200px"></th>
					</tr>
				</thead>
				<tbody id="Request_TableLoad">
					<!-- <tr>
						<th class="border-0 white-text" style="min-width: 200px">N / A</th>
						<th class="border-0 white-text" style="min-width: 200px">N / A</th>
						<th class="border-0 white-text" style="min-width: 200px">N / A</th>
						<th class="border-0 white-text" style="min-width: 200px">N / A</th>
						<th class="border-0 white-text" style="min-width: 200px; max-width: 200px"></th>
					</tr> -->
				</tbody>
			</table>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(TableLoad())

		function TableLoad() {
			var View_ItemButton = $("#View_ItemButton option:selected")
			var Request_TableLoad = $("#Request_TableLoad")

			$.ajax({
				url: window.location.href+ "/View_TableLoad?load="+ View_ItemButton.val(), 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(data.isEmpty == false) {
							Request_TableLoad.html('')

							for(var x in data.RecordArray) {
								var HTML = `
									<tr id="` +data.RecordArray[x].RequestID+ `" class="d-flex flex-row align-items-center border-bottom" style="width: 100%;">
										<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].RequestName+ `</th>
										<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].Quantity+ `</th>
										<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].StudentName+ `</th>
										<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].StudentID+ `</th>
										<th class="border-0 red-text" style="min-width: 200px; width: 100%">` +data.RecordArray[x].Status+ `</th>
										<th class="d-flex flex-row border-0 mr-4" style="min-width: 225px; max-width: 225px; font-weight: bold">
											
								`

								if(data.RecordArray[x].isProcess == false) {
									HTML += `<button id="RequestView_ProcessButton` +data.RecordArray[x].RequestID+ `" onclick="new Request().View_ProcessButton(` +data.RecordArray[x].RequestID+ `)" class="d-flex justify-content-center rounded pt-2 pb-2 companyBackground" style="min-width: 125px; max-width: 125px;">Done Process</button>`
								}

								HTML += `
										<button onclick="new Request().View_ClaimButton(` +data.RecordArray[x].RequestID+ `)"  class="d-flex justify-content-center rounded pt-2 pb-2 ml-1 red" style="min-width: 100px; max-width: 100px;">Done Claim</button>
										</th>
									</tr>
								`
								Request_TableLoad.append(HTML)
							}
						}
						else Request_TableLoad.html(`
							<tr>
								<th class="border-0 white-text" style="min-width: 200px; width: 100%">N / A</th>
							</tr>
						`)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		function Request() {
			this.View_RefreshButton = function() {
				TableLoad()
			}

			this.View_SearchButton = function() {
				var View_ItemButton = $("#View_ItemButton option:selected")
				var View_Searchbox = $("#View_Searchbox")

				var Request_TableLoad = $("#Request_TableLoad")

				if(View_Searchbox.val() != "") {
					$.ajax({
						url: window.location.href+ "/View_SearchButton?load="+ View_ItemButton.val() +"&search="+ View_Searchbox.val(), 
						method: 'POST',
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								if(!data.isEmpty) {
									Request_TableLoad.html('')

									for(var x in data.RecordArray) {
										var HTML = `
											<tr id="` +data.RecordArray[x].RequestID+ `" class="d-flex flex-row align-items-center" style="width: 100%; border-bottom: 1px solid #333333">
												<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].RequestName+ `</th>
												<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].Quantity+ `</th>
												<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].StudentName+ `</th>
												<th class="border-0" style="min-width: 200px; width: 100%">` +data.RecordArray[x].StudentID+ `</th>
												<th class="border-0 red-text" style="min-width: 200px; width: 100%">` +data.RecordArray[x].Status+ `</th>
												<th class="d-flex flex-row border-0 mr-4" style="min-width: 225px; max-width: 225px; font-weight: bold">
													
										`

										if(data.RecordArray[x].isProcess == false) {
											HTML += `<button onclick="new Request().View_ProcessButton(` +data.RecordArray[x].RequestID+ `)" class="d-flex justify-content-center rounded pt-2 pb-2 companyBackground" style="min-width: 125px; max-width: 125px;">Done Process</button>`
										}

										HTML += `
												<button onclick="new Request().View_ClaimButton(` +data.RecordArray[x].RequestID+ `)"  class="d-flex justify-content-center rounded pt-2 pb-2 ml-1 red" style="min-width: 100px; max-width: 100px;">Done Claim</button>
												</th>
											</tr>
										`
										Request_TableLoad.append(HTML)
									}
								}
								else Request_TableLoad.html(`
									<tr>
										<th class="border-0 white-text" style="min-width: 200px; width: 100%">N / A</th>
									</tr>
								`)

								View_Searchbox.val('')
							}
							else alert(data.ErrorDisplay)
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))
						}
					})
				}
				else alert("(Search) is Empty!")
			}

			this.View_ProcessButton = function(id) {
				var RequestView_ProcessButton = $("#RequestView_ProcessButton"+ id)

				RequestView_ProcessButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href+ "/View_ProcessButton?id="+ id, 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							RequestView_ProcessButton.removeAttr('disabled')
							TableLoad()
						}
						else {
							alert(data.ErrorDisplay)

							RequestView_ProcessButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))


					}
				})
			}

			this.View_ClaimButton = function(id) {
				$.ajax({
					url: window.location.href+ "/View_ClaimButton?id="+ id, 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) TableLoad()
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
		}
	</script>
</body>
</html>