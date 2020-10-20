<div id="App" class="position-fixed hide" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 100%">
	<div class="d-flex flex-row" style="width: 100%; height: 100%">
		<!-- Sidebar -->
		<div id="App_SidebarArea"></div>
		<!-- End of Sidebar -->
		<!-- Container Area -->
		<div id="App_ContainerArea" style="width: 100%; height: 100%"></div>
		<!-- End of Container Area -->
	</div>
</div>

<div id="App_SettingArea" class="position-fixed hide" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 100%">
	<div class="container d-flex flex-row" style="width:100%; height: 100%">
		<!-- Setting Menu List -->
		<div class="d-flex flex-column border-right pt-5 pr-5" style="height: 100%">
			<a onclick="new Setting().View_ProfileButton()" class="mb-1" style="font-weight: bold;">Profile</a>
			<a id="SettingView_BillingButton" onclick="new Setting().View_BillingButton()" class="mb-1" style="font-weight: bold;">Billing</a>
			<a onclick="new Setting().View_LogoutButton()" class="mb-1 red-text" style="font-weight: bold;">Logout</a>
			<div style="height: 100%"></div>
		</div>
		<!-- End of Setting Menu List -->
		<!-- Setting Loader -->
		<div class="container pt-5 pb-5 mr-4" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<!-- Profile Area -->
			<div id="SettingProfile_Area" class="d-flex flex-column hide" style="width: 100%;">
				<h4 class="mb-3">Profile</h4>
				<div class="d-flex flex-row" style="width: 100%">
					<div>
						<div onmouseenter="new SettingProfile().Edit_OpenME()" onmouseleave="new SettingProfile().Edit_OpenML()" id="SettingProfile_OpenImage" class="border" style="background: center no-repeat url('http://localhost/Ewallet/avatar/avatar.png'); background-size: 100% 100%; width: 100px; height: 100px;">
							<div onclick="new SettingProfile().Edit_OpenButton()" id="SettingProfile_OpenButton" class="d-flex align-items-center justify-content-center hide" style="background: #00000075; color: white; width: 100%; height: 100%; cursor: pointer;">
								<div class="d-flex flex-column">
									<div class="material-icons d-flex justify-content-center">add</div>
									<div class="d-flex justify-content-center">Upload</div>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<input id="SettingProfile_FileButton" type="file" class="hide">
							<a onclick="new SettingProfile().Edit_RemoveButton()" id="SettingProfile_RemoveButton" class="mt-2 hide" style="font-weight: bold;">Remove</a>
						</div>
					</div>
					<div class="ml-4" style="width: 100%">
						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Email</h1>
						<input id="SettingProfile_Emailbox" class="form-control mb-2" placeholder="XXX XXX XXX">
						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Username</h1>
						<div class="d-flex flex-row mb-2" style="width: 100%">
							<input id="SettingProfile_Usernamebox" class="form-control" placeholder="XXX XXX XXX" style="width: 100%">
							<div id="SettingProfile_AccountIDLabel" class="d-flex align-items-center border rounded pl-3 pr-3 ml-2" style="font-weight: bold;">@0001#01</div>
						</div>
						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Password</h1>
						<input id="SettingProfile_Passwordbox" class="form-control mb-2" type="password" placeholder="XXX XXX XXX">
						<button onclick="new SettingProfile().Edit_DoneButton()" class="form-control" style="font-weight: bold">Change</button>


						<h3 class="mt-5 mb-3">Profile</h3>


						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Name</h1>
						<div class="d-flex flex-row mb-2">
							<div id="SettingProfile_NameLabel" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 mr-1">Redgrave, Zeke S.</div>
							<div id="SettingProfile_MNLabel" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 ml-1" style="width: 25%">Saber</div>
						</div>
						

						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Student ID / Employee ID</h1>
						<div id="SettingProfile_IDLabel" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 mb-2">0123456789</div>
						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Account Registration</h1>
						<div id="SettingProfile_RegisterLabel" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 mb-2">2020-01-01 00:00:00</div>

						<h1 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Course</h1>
						<div id="SettingProfile_CourseLabel" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 mb-2"></div>

					</div>
				</div>
			</div>
			<!-- End of Profile Area -->
			<!-- Billing Area -->
			<div id="SettingBilling_Area" class="container d-flex flex-column" style="width: 100%">
				<h4 class="mb-3">Billing</h4>
				<div style="width: 100%">
					<div class="d-flex flex-row" style="width: 100%">
						<div class="mr-1" style="width: 100%">
							<h4 style="font-weight: bold; font-size: 12px;">Student Money</h4>
							<div class="form-control">P <span id="SettingBilling_SM">9999.99</span></div>
						</div>
						<div class="ml-1" style="width: 100%">
							<h4 style="font-weight: bold; font-size: 12px;">Student Tuition Fee</h4>
							<div class="form-control">P <span id="SettingBilling_STF">999.99</span></div>
						</div>
					</div>

					<h4 class="mt-5 mb-3">Top-up</h4>
					<div id="SettingTopup_FormArea" class="">
						<h4 class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Select Card Options</h4>
						<div class="d-flex flex-row mb-3 mt-3">
							<div class="d-flex flex-row">
								<div class="d-flex align-items-center mr-3">
									<input id="SettingTopup_PaypalRadio" type="radio" checked="checked">
								</div>
								<div>Paypal</div>
							</div>
						</div>

						<h4 class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Enter your Amount</h4>
						<input id="SettingTopup_Amountbox" class="form-control mb-4" type="number" placeholder="XXX-XXX-XXX">

						<h4 class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Card Number</h4>
						<input id="SettingTopup_Cardbox" class="form-control mb-2" placeholder="XXX-XXX-XXX">
						<h4 class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Security Code</h4>
						<input id="SettingTopup_Securitybox" class="form-control mb-2" placeholder="XXX-XXX-XXX">
						<h4 class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Name on Card</h4>
						<input id="SettingTopup_Namebox" class="form-control mb-2" placeholder="XXX-XXX-XXX">

						<h4 class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Expiration Date</h4>
						<div class="d-flex flex-row mb-2">
							<select onclick="new SettingBilling().Create_DayButton()" id="SettingTopup_Yearbox" class="custom-select"></select>
							<select onclick="new SettingBilling().Create_DayButton()" id="SettingTopup_Monthbox" class="custom-select ml-1 mr-1"></select>
							<select id="SettingTopup_Daybox" class="custom-select"></select>
						</div>
						<h4  class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Address Line 1</h4>
						<input id="SettingTopup_Line1box" class="form-control mb-2" placeholder="XXX-XXX-XXX">
						<h4  class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Address Line 2</h4>
						<input id="SettingTopup_Line2box" class="form-control mb-2" placeholder="XXX-XXX-XXX">
						<h4  class="p-0 m-0" style="font-weight: bold; font-size: 12px;">City / Province</h4>
						<input id="SettingTopup_CPbox" class="form-control mb-2" placeholder="XXX-XXX-XXX">
						<h4  class="p-0 m-0" style="font-weight: bold; font-size: 12px;">State / Region</h4>
						<input id="SettingTopup_SRbox" class="form-control mb-2" placeholder="XXX-XXX-XXX">
						<h4  class="p-0 m-0" style="font-weight: bold; font-size: 12px;">Zip Code</h4>
						<input id="SettingTopup_Zipbox" class="form-control mb-2" placeholder="XXX-XXX-XXX">

						<div class="d-flex flex-row">
							<div class="d-flex flex-row">
								<div class="d-flex align-items-center mr-3">
									<input id="SettingTopup_TOSCheckbox" type="checkbox" name="">
								</div>
								<div class="d-flex align-items-center mr-3">
									<div>I Understand the Terms and Service(or TOS) Agreements for Legallity.</div>
								</div>
							</div>
						</div>

						<button onclick="new SettingBilling().Create_DoneButton()" class="form-control mt-5">DONE</button>
					</div>

					<h4 class="mt-5 mb-3">Transaction Records</h4>
					<table class="table" style="width: 100%">
						<thead>
							<tr>
								<th class="p-0" style="font-weight: bold;">#</th>
								<th class="p-0" style="font-weight: bold; width: 75%">Name</th>
								<th class="p-0" style="font-weight: bold; width: 25%">Amount</th>
								<th class="p-0" style="font-weight: bold; min-width: 175px; max-width: 175px;">Purchase Date</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- End of Billing Area -->
		</div>
		<!-- End of Setting Loader -->
		<div class="pt-5">
			<button onclick="new Setting().View_BackButton()" class="material-icons form-control border rounded-circle" style="background: white">close</button>
			<h1 class="d-flex justify-content-center mt-2" style="font-size: 14px; font-weight: bold;">Back</h1>
		</div>
	</div>
</div>


<div id="App_StartingArea" class="position-fixed" style="top: 0px; bottom: 0px; left: 0px; right: 0px">
	<div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">
		<div class="border-0" style="width: 350px">
			<div class="progress form-control hide" style="background-color: white; width: 100%; height: 25px;">
			 	<div id="App_Progressbar" class="progress-bar" style="width:70%;"></div>
			</div>
			<h4 id="App_ProgressbarText" class="mt-2 ml-2" style="font-weight: bold;">
				Loading
			</h4>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Loading....")

		$("#App_SidebarArea").load(window.location + "/LoadView?Load=views&Name=sidebar", function() {
			<?php 

				switch (strtoupper($AccountType)) {
					case "STUDENT":
						echo 'var DownloadBlob = ["store", "records"]';
						break;

					case "CASHIER":
						echo 'var DownloadBlob = ["payment"]';
						break;

					case "DEPARTMENT":
						echo 'var DownloadBlob = ["timeline", "account", "payment"]';
						break;

					case "ADMIN":
						echo 'var DownloadBlob = ["timeline", "account", "payment"]';
						break;
					
					default:
						// code...
						break;
				}

			?>

			for(var i of DownloadBlob) $.get(window.location +"/LoadView?Load=views&Name="+ i, function(data) {
				$("#App_ContainerArea").append(data)
			})

			new Setting().View_ProfileLoad()
			new Setting().View_BalanceLoad()

			$("#App_ContainerArea").load(AppLoader())
		})
	})

	function AppLoader() {
		$(document).ready(function() {
			$("#App_StartingArea").addClass('hide')
			// $("#App").removeClass('hide')
			$("#App_SettingArea").removeClass('hide')
		})
	}

	function Setting() {
		this.View_ProfileLoad = function() {
			var SettingProfile_OpenImage = $("#SettingProfile_OpenImage")
			var SettingProfile_Emailbox = $("#SettingProfile_Emailbox")
			var SettingProfile_Usernamebox = $("#SettingProfile_Usernamebox")
			var SettingProfile_AccountIDLabel = $("#SettingProfile_AccountIDLabel")

			var SettingProfile_NameLabel = $("#SettingProfile_NameLabel")
			var SettingProfile_MNLabel = $("#SettingProfile_MNLabel")
			var SettingProfile_IDLabel = $("#SettingProfile_IDLabel")
			var SettingProfile_RegisterLabel = $("#SettingProfile_RegisterLabel")
			var SettingProfile_CourseLabel = $("#SettingProfile_CourseLabel")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/View_ProfileLoad", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#StorePost_UserImage").attr('src', window.location.href.replace("index.php/Access", "avatar/"+ data.AccountImage))
						$("#TimelineView_UserImage").attr('src', window.location.href.replace("index.php/Access", "avatar/"+ data.AccountImage))

						SettingProfile_OpenImage.css({
							'background': "center no-repeat url('" +window.location.href.replace("index.php/Access", "avatar/"+ data.AccountImage)+ "')",
							'background-size': '100% 100%'
						})
						SettingProfile_Emailbox.val(data.AccountEmail)
						SettingProfile_Usernamebox.val(data.AccountUsername)

						SettingProfile_NameLabel.text(data.AccountName)
						SettingProfile_MNLabel.text(data.AccountMN)
						SettingProfile_IDLabel.text(data.AccountID.split("#")[1])
						SettingProfile_AccountIDLabel.text(data.AccountID)
						SettingProfile_RegisterLabel.text(data.AccountDT)
						SettingProfile_CourseLabel.text(data.AccountCourse)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				}
			})
		}

		this.View_BalanceLoad = function() {
			var SettingBilling_SM = $("#SettingBilling_SM")
			var SettingBilling_STF = $("#SettingBilling_STF")
			var SettingTopup_Yearbox = $("#SettingTopup_Yearbox")
			var SettingTopup_Monthbox = $("#SettingTopup_Monthbox")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_BalanceLoad", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						SettingBilling_SM.text(data.Account_SM)
						SettingBilling_STF.text(data.Account_STF)

						for (var i = 1970; i < new Date().getFullYear() + 20; i++) SettingTopup_Yearbox.append('<option value="' +i+ '">' +i+ '</option>')
						for (var i = 0; i < 12; i++) SettingTopup_Monthbox.append('<option value="' +i+ '">' +(i+1)+ '</option>')
					}
					else {
						$("#SettingBilling_Area").remove()
						$("#SettingView_BillingButton").remove()
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))


				}
			})
		}

		this.View_ProfileButton = function() {
			$("#SettingProfile_Area").removeClass('hide')
			$("#SettingBilling_Area").addClass('hide')
		}

		this.View_BillingButton = function() {
			$("#SettingProfile_Area").addClass('hide')
			$("#SettingBilling_Area").removeClass('hide')
		}

		this.View_BackButton = function() {
			$("#App_SettingArea").addClass('hide')
			$("#App").removeClass('hide')
		}

		this.View_LogoutButton = function() {
			$("#root").load(window.location+ "/LoadView?Load=views&Name=entrance")
		}
	}

	function SettingProfile() {
		this.Edit_OpenME = function() {
			$("#SettingProfile_OpenButton").removeClass('hide')
		}

		this.Edit_OpenML = function() {
			$("#SettingProfile_OpenButton").addClass('hide')
		}

		this.Edit_OpenButton = function() {
			var SettingProfile_FileButton = $("#SettingProfile_FileButton")
			var SettingProfile_RemoveButton = $("#SettingProfile_RemoveButton")
			var SettingProfile_OpenImage = $("#SettingProfile_OpenImage")

			SettingProfile_FileButton.click()
			SettingProfile_FileButton.change(function() {
				if(SettingProfile_FileButton.prop('files').length != 0) {
					SettingProfile_RemoveButton.removeClass('hide')
					SettingProfile_OpenImage.css({
						'background': "center no-repeat url('" +URL.createObjectURL(SettingProfile_FileButton.prop('files')[0])+ "')",
						'background-size': '100% 100%'
					})
				}
				else {
					SettingProfile_RemoveButton.addClass('hide')
					SettingProfile_OpenImage.css('background', "center no-repeat url('" +window.location.href.replace("index.php/Access", "avatar/avatar.png")+ "')")
				}
			})
		}

		this.Edit_RemoveButton = function() {
			$("#SettingProfile_FileButton").val('')
			$("#SettingProfile_RemoveButton").addClass('hide')
			$("#SettingProfile_OpenImage").css({
				'background': "center no-repeat url('" +window.location.href.replace("index.php/Access", "avatar/avatar.png")+ "')",
				'background-size': '100% 100%'
			})
		}

		this.Edit_DoneButton = function() {
			var SettingProfile_FileButton = $("#SettingProfile_FileButton")
			var SettingProfile_Emailbox = $("#SettingProfile_Emailbox")
			var SettingProfile_Usernamebox = $("#SettingProfile_Usernamebox")
			var SettingProfile_Passwordbox = $("#SettingProfile_Passwordbox")

			if(SettingProfile_FileButton.prop('files').length != 0) {
				if(SettingProfile_Passwordbox.val() != "") {
					var temp = new FormData()
					temp.append('AccountImage', SettingProfile_FileButton.prop('files')[0])
					temp.append('Package', JSON.stringify({
						"AccountEmail": SettingProfile_Emailbox.val(),
						"AccountUsername": SettingProfile_Usernamebox.val(),
						"AccountPassword": SettingProfile_Passwordbox.val()
					}))

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Account/Edit_DoneButton", 
						method: 'POST',
						data: temp,
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								SettingProfile_Passwordbox.val('')
								new Setting().View_ProfileLoad()

								alert("Profile Updated!")
							}
							else alert(data.ErrorDisplay)
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Error: Unexpected Error Occur!")
						},
						xhr: function() {
							var xhr = new XMLHttpRequest()
					
							xhr.upload.addEventListener("progress", function(e){
								if(e.lengthComputable) {
									var current = e.loaded
									var total = e.total
									var progressBar = parseInt((current / total) * 100)
					
									
								}
							}, false)
					
							return xhr
						},
						contentType: false,
						cache: false,
						processData: false
					})
				}
				else alert("Error: Please Enter Your Password!")
			}
			else {
				if(SettingProfile_Passwordbox.val() != "") {
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Account/Edit_DoneButton", 
						method: 'POST',
						data: {
							Package: JSON.stringify({
								"AccountEmail": SettingProfile_Emailbox.val(),
								"AccountUsername": SettingProfile_Usernamebox.val(),
								"AccountPassword": SettingProfile_Passwordbox.val()
							})
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								SettingProfile_Passwordbox.val('')
								new Setting().View_ProfileLoad()

								alert("Profile Updated!")
							}
							else alert(data.ErrorDisplay)
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Error: Unexpected Error Occur!")
						}
					})
				}
				else alert("Error: Please Enter Your Password!")
			}
		}
	}

	function SettingBilling() {
		this.View_BalanceLoad = function() {

		}

		this.View_RecordLoad = function() {

		}

		this.Create_DayButton = function() {
			var SettingTopup_Yearbox = $("#SettingTopup_Yearbox option:selected")
			var SettingTopup_Monthbox = $("#SettingTopup_Monthbox option:selected")
			var SettingTopup_Daybox = $("#SettingTopup_Daybox")

			var HTML = ''
			var x = new Date(SettingTopup_Yearbox.val(), parseInt(SettingTopup_Monthbox.val()), 1)

			while(x.getMonth() === parseInt(SettingTopup_Monthbox.val())) {
				HTML += '<option value="' +new Date(x).getDate()+ '">' +new Date(x).getDate()+ '</option>'

				x.setDate(x.getDate() + 1)
			}

			SettingTopup_Daybox.html(HTML)
		}

		this.Create_DoneButton = function() {
			var SettingTopup_PaypalRadio = $("#SettingTopup_PaypalRadio")
			var SettingTopup_Amountbox = $("#SettingTopup_Amountbox")

			var SettingTopup_Cardbox = $("#SettingTopup_Cardbox")
			var SettingTopup_Securitybox = $("#SettingTopup_Securitybox")
			var SettingTopup_Namebox = $("#SettingTopup_Namebox")

			var SettingTopup_Yearbox = $("#SettingTopup_Yearbox option:selected")
			var SettingTopup_Monthbox = $("#SettingTopup_Monthbox option:selected")
			var SettingTopup_Daybox = $("#SettingTopup_Daybox option:selected")

			var SettingTopup_Line1box = $("#SettingTopup_Line1box")
			var SettingTopup_Line2box = $("#SettingTopup_Line2box")
			var SettingTopup_CPbox = $("#SettingTopup_CPbox")
			var SettingTopup_SRbox = $("#SettingTopup_SRbox")
			var SettingTopup_Zipbox = $("#SettingTopup_Zipbox")

			var SettingTopup_TOSCheckbox = $("#SettingTopup_TOSCheckbox")

			if(SettingTopup_TOSCheckbox.is(':checked')) {
				if(SettingTopup_Amountbox.val() != "" && SettingTopup_Cardbox.val() != "" && SettingTopup_Namebox.val() != "" && SettingTopup_Line1box.val() != "" && SettingTopup_Line2box.val() != "" && SettingTopup_CPbox.val() != "" && SettingTopup_SRbox.val() != "" && SettingTopup_Zipbox.val() != "" && SettingTopup_Yearbox.val() != "" && SettingTopup_Monthbox.val() != "" && SettingTopup_Daybox.val() != "") {
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Transaction/Create_DoneButton", 
						method: 'POST',
						data: {
					 		CardType: "PAYPAL",
					 		Amount: SettingTopup_Amountbox.val(),

					 		CardNumber: SettingTopup_Amountbox.val(),
					 		SecurityNumber: SettingTopup_Amountbox.val(),
					 		CardName: SettingTopup_Amountbox.val(),

					 		ExpireYear: SettingTopup_Amountbox.val(),
					 		ExpireMonth: SettingTopup_Amountbox.val(),
					 		ExpireDay: SettingTopup_Amountbox.val(),

					 		AddressLine_A: SettingTopup_Amountbox.val(),
					 		AddressLine_B: SettingTopup_Amountbox.val(),
					 		AddressCP: SettingTopup_Amountbox.val(),
					 		AddressSR: SettingTopup_Amountbox.val(),
					 		ZipNumber: SettingTopup_Amountbox.val(),

					 		isTOS: SettingTopup_TOSCheckbox.is(':checked')
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {

							}
							else alert(data.ErrorDisplay)
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))
						}
					})
				}
				else {
					var ErrorDisplay = ""

					if(SettingTopup_Amountbox.val() == "") ErrorDisplay += "(Amount) "

					if(SettingTopup_Cardbox.val() == "") ErrorDisplay += "(Card Number) "
					if(SettingTopup_Securitybox.val() == "") ErrorDisplay += "(Security Code) "
					if(SettingTopup_Namebox.val() == "") ErrorDisplay += "(Name) "

					if(SettingTopup_Yearbox.val() == "") ErrorDisplay += "(Year) "
					if(SettingTopup_Monthbox.val() == "") ErrorDisplay += "(Month) "
					if(SettingTopup_Daybox.val() == "") ErrorDisplay += "(Day) "

					if(SettingTopup_Line1box.val() == "") ErrorDisplay += "(Address Line 1) "
					if(SettingTopup_Line2box.val() == "") ErrorDisplay += "(Address Line 2) "
					if(SettingTopup_CPbox.val() == "") ErrorDisplay += "(City / Provice) "
					if(SettingTopup_SRbox.val() == "") ErrorDisplay += "(State / Region) "
					if(SettingTopup_Zipbox.val() == "") ErrorDisplay += "(Zip Code) "

					alert(ErrorDisplay+ "is Empty!")

					ErrorDisplay = ""
				}
			}
			else alert("Error: Please press the Checkbox TOS to Agree!")
		}
	}

</script>