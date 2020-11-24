<div id="App" class="position-fixed hide" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 100%">
	<div class="d-flex flex-row" style="background: #282828; color: #ffffff; width: 100%; height: 100%">
		<!-- Sidebar -->
		<div id="App_SidebarArea"></div>
		<!-- End of Sidebar -->
		<!-- Container Area -->
		<div id="App_ContainerArea" style="width: 100%; height: 100%"></div>
		<!-- End of Container Area -->
	</div>
</div>

<div id="App_SettingArea" class="position-fixed hide" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 100%; background: #282828;">
	<div class="d-flex flex-row" style="width:100%; height: 100%">
		<!-- Setting Menu List -->
		<div class="d-flex flex-column pt-5 pb-5" style="background: #1e2124; color: #7289da; height: 100%;">
			<a onclick="new Setting().View_ProfileButton()" class="pl-5 pr-3 pt-1 pb-1 a-hover" style="width: 200px; font-weight: bold;">Profile</a>
			<a id="SettingView_BillingButton" onclick="new Setting().View_BillingButton()" class="pl-5 pr-3 pt-1 pb-1 a-hover" style="width: 200px; font-weight: bold;">Balance</a>
			<a onclick="new Setting().View_LogoutButton()" class="pl-5 pr-3 pt-1 pb-1 red-text a-hover" style="width: 200px; font-weight: bold;">Logout</a>
			<a onclick="new Setting().View_BackButton()" class="pl-5 pr-3 pt-1 pb-1 red-text a-hover" style="width: 200px; font-weight: bold;">Close</a>
			<div style="height: 100%"></div>
		</div>
		<!-- End of Setting Menu List -->
		<!-- Setting Loader -->
		<div class="p-5" style="min-width: 750px; width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<!-- Profile Area -->
			<div id="SettingProfile_Area" class="d-flex flex-column" style="width: 100%; color: #ffffff">
				<div class="d-flex justify-content-center" style="width: 100%">
					<div class="d-flex flex-column" style="width: 750px;">
						<div class="mb-1 ml-2" style="color: #7289da; font-weight: bold;">ACCOUNT</div>
						<div class="d-flex flex-row p-4 pt-3 pb-3 mb-5 rounded" style="background: #1e2124; color: #ffffff">
							<!-- Profile Image -->
							<div class="d-flex flex-column">
								<div class="d-flex justify-content-center">
									<div onmouseenter="new SettingProfile().Edit_OpenME()" onmouseleave="new SettingProfile().Edit_OpenML()" id="SettingProfile_OpenImage" class="rounded-circle" style="background-size: 100% 100%; width: 100px; height: 100px;">
										<div onclick="new SettingProfile().Edit_OpenButton()" id="SettingProfile_OpenButton" class="d-flex align-items-center justify-content-center rounded-circle hide" style="background: #00000075; color: white; width: 100%; height: 100%; cursor: pointer;">
											<div class="d-flex justify-content-center" style="font-weight: bold;">Upload</div>
										</div>
									</div>
								</div>

								<div class="d-flex justify-content-center">
									<input id="SettingProfile_FileButton" type="file" class="hide">
									<a onclick="new SettingProfile().Edit_RemoveButton()" id="SettingProfile_RemoveButton" class="mt-2 hide" style="font-weight: bold;">Remove</a>
								</div>

								<button onclick="new SettingProfile().Edit_OpenButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mt-2" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">UPLOAD</button>
							</div>
							<!-- End of Profile Image -->
							<!-- Profile Account -->
							<div class="d-flex flex-column ml-4" style="width: 100%">
								<h1 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 14px;">Username</h1>
								<div class="d-flex flex-row mb-2 rounded" style="background: #333333; width: 100%">
									<input id="SettingProfile_Usernamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" placeholder="XXX XXX XXX" style="background: #333333; color: #ffffff; width: 100%">
									<div id="SettingProfile_AccountIDLabel" class="d-flex align-items-center pl-3 pr-3" style="font-weight: bold;">@0001#01</div>
								</div>

								<h1 class="ml-2 mb-1 p-0 mt-4" style="font-weight: bold; font-size: 14px;">New Password (Optional: If you wanna change your Current into New Password)</h1>
								<input id="SettingProfile_NPbox" type="password" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="XXX XXX XXX">

								<div class="d-flex flex-row mt-4" style="width: 100%">
									<div class="d-flex flex-column" style="width: 100%">
										<h1 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 14px;">Email</h1>
										<input id="SettingProfile_Emailbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="XXX XXX XXX">
									</div>
									<div class="d-flex flex-column ml-2 mb-2" style="width: 100%">
										<h1 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 14px;">Password</h1>
										<input id="SettingProfile_Passwordbox" type="password" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="XXX XXX XXX">
									</div>
								</div>

								<button id="SettingProfileEdit_DoneButton" onclick="new SettingProfile().Edit_DoneButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">CHANGE</button>
							</div>
							<!-- End of Profile Account -->
						</div>

						<div class="mb-1 ml-2" style="color: #7289da; font-weight: bold;">PROFILE : STUDENT ID / EMPLOYEE ID #<span id="SettingProfile_IDLabel"></span></div>
						<div class="d-flex flex-column" style="color: #ffffff">
							<div class="d-flex flex-row mb-2" style="width: 100%">
								<div class="d-flex flex-column" style="width: 100%">
									<h1 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 14px;">Name</h1>
									<div class="d-flex flex-row mb-2">
										<div class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; width: 100%">
											<span id="SettingProfile_NameLabel">XXXXXXXXX</span>
											(<span id="SettingProfile_MNLabel">XXXXXXXXX</span>)
										</div>
									</div>
								</div>
								<div class="d-flex flex-column" style="width: 100%">
									<h1 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 14px; text-align: right;">Course</h1>
									<div id="SettingProfile_CourseLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%; text-align: right;"></div>
								</div>
							</div>
							
							<h1 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 14px;">Account Registration</h1>
							<div id="SettingProfile_RegisterLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">2020-01-01 00:00:00</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Profile Area -->
			<!-- Billing Area -->
			<div id="SettingBilling_Area" class="container d-flex flex-column hide" style="width: 100%">
				<div class="d-flex justify-content-center" style="width: 100%">
					<div class="d-flex flex-column" style="color: white; width: 500px;">
						<div class="d-flex align-items-center mb-1 ml-2" style="color: #7289da; font-weight: bold;">BALANCE</div>

						<div class="d-flex justify-content-center align-items-center rounded pt-3 pb-3" style="background: #1e2124; width: 100%">
							<div class="d-flex flex-row">
								<div class="mr-1" style="width: 150px;">
									<h4 style="margin: 0; font-weight: bold; font-size: 12px;">Student Money</h4>
									<div class="">P <span id="SettingBilling_SM">9999.99</span></div>
								</div>
								<div class="ml-1" style="width: 150px">
									<h4 style="margin: 0; font-weight: bold; font-size: 12px;">Student Tuition Fee</h4>
									<div class="">P <span id="SettingBilling_STF">999.99</span></div>
								</div>
							</div>
						</div>

						<div class="d-flex flex-column mt-5" style="width: 100%">
							<h4 class="ml-2 mb-4">Redeem Gift Code</h4>

							<h4 class="ml-2 mb-1 p-0" style="font-weight: bold; font-size: 12px;">Enter the Gift Code</h4>
							<div class="d-flex flex-row" style="width: 100%">
								<input id="SettingBilling_Redeembox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mr-1" style="background: #333333; color: #7289da; width: 100%; text-align: right;" type="number" placeholder="Ex. 0123456789">
								<button id="SettingBillingUpdate_RedeemButton" onclick="new SettingBilling().Update_RedeemButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff;">Redeem!</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Billing Area -->
		</div>
		<!-- End of Setting Loader -->
	</div>
</div>


<div id="App_StartingArea" class="position-fixed" style="top: 0px; bottom: 0px; left: 0px; right: 0px">
	<div class="d-flex align-items-center justify-content-center" style="background: #282828; color: #7289da; width: 100%; height: 100%">
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
						echo 'var DownloadBlob = ["payment", "bank"]';
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
			$("#App").removeClass('hide')
			// $("#App_SettingArea").removeClass('hide')
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
							'background-size': '100% 100%',
							'background-color': '#7289da'
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
			var SettingProfile_NPbox = $("#SettingProfile_NPbox") // Optional
			var SettingProfileEdit_DoneButton = $("#SettingProfileEdit_DoneButton")

			if(SettingProfile_FileButton.prop('files').length != 0) {
				if(SettingProfile_Passwordbox.val() != "") {
					var temp = new FormData()
					temp.append('AccountImage', SettingProfile_FileButton.prop('files')[0])
					temp.append('Package', JSON.stringify({
						"AccountEmail": SettingProfile_Emailbox.val(),
						"AccountUsername": SettingProfile_Usernamebox.val(),
						"AccountPassword": SettingProfile_Passwordbox.val(),
						"Account_NewPassword": SettingProfile_NPbox.val()
					}))

					SettingProfileEdit_DoneButton.attr('disabled', 'disabled')

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Account/Edit_DoneButton", 
						method: 'POST',
						data: temp,
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								SettingProfile_Passwordbox.val('')
								SettingProfile_NPbox.val('')
								SettingProfileEdit_DoneButton.removeAttr('disabled')

								new Setting().View_ProfileLoad()

								alert("Profile Updated!")
							}
							else {
								alert(data.ErrorDisplay)

								SettingProfileEdit_DoneButton.removeAttr('disabled')
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Error: Unexpected Error Occur!")

					 		SettingProfileEdit_DoneButton.removeAttr('disabled')
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
					SettingProfileEdit_DoneButton.attr('disabled', 'disabled')

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Account/Edit_DoneButton", 
						method: 'POST',
						data: {
							Package: JSON.stringify({
								"AccountEmail": SettingProfile_Emailbox.val(),
								"AccountUsername": SettingProfile_Usernamebox.val(),
								"AccountPassword": SettingProfile_Passwordbox.val(),
								"Account_NewPassword": SettingProfile_NPbox.val()
							})
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								SettingProfile_Passwordbox.val('')
								SettingProfile_NPbox.val('')
								SettingProfileEdit_DoneButton.removeAttr('disabled')

								new Setting().View_ProfileLoad()

								alert("Profile Updated!")
							}
							else {
								alert(data.ErrorDisplay)

								SettingProfileEdit_DoneButton.removeAttr('disabled')
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Error: Unexpected Error Occur!")

					 		SettingProfileEdit_DoneButton.removeAttr('disabled')
						}
					})
				}
				else alert("Error: Please Enter Your Password!")
			}
		}
	}

	function SettingBilling() {
		this.Update_RedeemButton = function() {
			var SettingBilling_Redeembox = $("#SettingBilling_Redeembox")
			var SettingBillingUpdate_RedeemButton = $("#SettingBillingUpdate_RedeemButton")

			if(SettingBilling_Redeembox.val() != "") {
				SettingBillingUpdate_RedeemButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Transaction/Update_RedeemButton?RedeemCode=" +SettingBilling_Redeembox.val(), 
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							SettingBilling_Redeembox.val('')
							SettingBillingUpdate_RedeemButton.removeAttr('disabled')

							new Setting().View_BalanceLoad()

							alert("Redeem Gift Code Successfully!")
						}
						else {
							alert(data.ErrorDisplay)

							SettingBillingUpdate_RedeemButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
				 		SettingBillingUpdate_RedeemButton.removeAttr('disabled')
					}
				})
			}
			else alert("Error: Redeem is Empty!")
		}
	}

</script>