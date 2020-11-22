<div class="position-fixed" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex justify-content-center align-items-center" style="background: #282828; width: 100%; height: 100%; color: #4caf50;">
		<div class="d-flex flex-row">
			<div class="d-flex flex-column pt-3 mr-2 pl-2 pr-2">
				<button onclick="new Entrance().View_LoginButton()" class="material-icons rounded form-control mb-2 border-0" style="background: #333333; color: #4caf50; width: 50px; height: 50px">login</button>
				<button onclick="new Entrance().View_RegisterButton()" class="material-icons rounded form-control border-0" style="background: #333333; color: #4caf50; width: 50px; height: 50px">how_to_reg</button>
			</div>
			<div class="d-flex flex-column p-3 rounded" style="width: 500px; height: 100%;">
				<div id="EntranceLogin_Area" class="d-flex flex-column" style="width: 100%">
					<h2 class="mb-5" style="color: #7289da; font-weight: bold;">Student E-Wallet</h2>

					<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Email</h6>
					<input id="View_Usernamebox" class="mb-4 border-0 rounded p-3" placeholder="Ex. 123456789" style="background: #333333; color: #4caf50; width: 100%;">
					<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Password</h6>
					<input id="View_Passwordbox" type="password" placeholder="*************" class="mb-4 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%">

					<button id="LoginView_DoneButton" onclick="new Login().View_DoneButton()" class="border-0 mb-5 rounded pt-3 pb-3" style="background: #7289da; color: #ffffff; font-size: 14px; font-weight: bold;">LOGIN</button>
					<a onclick="new Login().View_ForgotButton()" class="border-0" style="color: #7289da; font-size: 14px; font-weight: bold;">FORGOT PASSWORD</a>
				</div>

				<div id="EntranceRegister_Area" class="d-flex flex-column hide" style="width: 100%">
					<h2 class="mb-5" style="color: #7289da; font-weight: bold;">Student E-Wallet</h2>

					<div class="d-flex flex-row" style="width: 100%">
						<div class="d-flex flex-column mr-1" style="width: 100%">
							<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Username</h6>
							<input id="Create_Usernamebox" class="mb-4 border-0 rounded p-3" placeholder="Ex. XXX XXX" style="background: #333333; color: #4caf50; width: 100%;">
						</div>
						<div class="d-flex flex-column ml-1" style="width: 100%">
							<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Email</h6>
							<input id="Create_Emailbox" class="mb-4 border-0 rounded p-3" placeholder="Ex. studentewallet@email.com" style="background: #333333; color: #4caf50; width: 100%;">
						</div>
					</div>

					<div class="d-flex flex-row" style="width: 100%">
						<div class="d-flex flex-column mr-1" style="width: 100%">
							<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Password</h6>
							<input id="Create_Passwordbox" type="password" placeholder="*************" class="mb-4 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;">
						</div>
						<div class="d-flex flex-column ml-1" style="width: 100%">
							<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Repeat Password</h6>
							<input id="Create_Repeatbox" type="password" placeholder="*************" class="mb-4 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;">
						</div>
					</div>

					<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Student ID</h6>
					<input id="Create_IDbox" type="number" placeholder="Ex. 15730500" class="mb-4 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;">

					<button id="RegisterCreate_NextButton" onclick="new Register().Create_NextButton()" class="border-0 rounded pt-3 pb-3" style="background: #333333; color: #4caf50; font-size: 14px; font-weight: bold;">NEXT</button>
				</div>

				<div id="EntranceVerification_Area" class="d-flex flex-column hide" style="width: 100%">
					<h2 class="mb-5" style="color: #7289da; font-weight: bold;">Verification Code</h2>

					<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">To get your Verification Code, check your Email Account name <span id="View_EmailLabel"></span> and if the Verification Code is already send to your Inbox.</h6>

					<div class="d-flex flex-row" style="width: 100%">
						<div class="d-flex flex-column mr-1" style="width: 100%">
							<input id="Create_Codebox" type="number" placeholder="XXX-XXX-XXX" class="border-0 rounded p-3 mb-1" style="background: #333333; color: #4caf50; width: 100%; height: 50px;">
						</div>
						<div class="d-flex flex-column ml-1" style="width: 50%">
							<button id="RegisterCreate_ResendButton" onclick="new Register().Create_ResendButton()" class="border-0 rounded p-3 mb-5" style="background: #333333; color: #4caf50; font-size: 14px; font-weight: bold; height: 50px;">RESEND CODE</button>
						</div>
					</div>
					

					<button onclick="new Register().Create_DoneButton()" id="RegisterCreate_DoneButton" class="border-0 rounded pt-3 pb-3 mb-1" style="background: #7289da; color: #ffffff; font-size: 14px; font-weight: bold;">DONE</button>
					<button onclick="new Register().Create_BackButton()" class="border-0 rounded pt-3 pb-3" style="background: #333333; color: #4caf50; font-size: 14px; font-weight: bold;">BACK</button>
				</div>

				<div id="EntranceDone_Area" class="d-flex flex-column hide" style="width: 100%">
					<h2 class="mb-5" style="color: #7289da; font-weight: bold;">Registration Complete!</h2>

					<h6 class="mb-0 pl-2 pb-1 pr-2" style="font-size: 14px; font-weight: bold;">The School will send you a message to your inbox at least 1 month. If you never got a message in just 1 month, you will have to register again or contact the School to fix the issue.</h6>

					<button onclick="new Register().Create_OkButton()" class="border-0 rounded pt-3 pb-3" style="background: #7289da; color: #ffffff; font-size: 14px; font-weight: bold;">OK</button>
				</div>

				<div id="EntranceForgot_Area" class="d-flex flex-column hide" style="width: 100%">
					<h2 class="mb-5" style="color: #7289da; font-weight: bold;">Forgot Password</h2>

					<h6 class="mb-0 pl-2 pb-1 pr-2" style="font-size: 14px; font-weight: bold;">Email</h6>
					<input id="Edit_Emailbox" class="border-0 rounded p-3 mb-1" placeholder="Ex. XXX XXX" style="background: #333333; color: #4caf50;width: 100%">
					<button onclick="new Login().Edit_SendButton()" id="LoginEdit_SendButton" class="border-0 rounded pt-3 pb-3" style="background: #333333; color: #4caf50; font-size: 14px; font-weight: bold;">OK</button>

					<div id="Forgot_ConfirmationArea" class="d-flex flex-column mt-3 mb-3 hide">
						<h6 class="mb-0 pl-2 pb-3 pr-2" style="font-size: 14px; font-weight: bold;">To get your Verification Code, check your Email Account name <span id="Edit_EmailLabel"></span> and if the Verification Code is already send to your Inbox.</h6>

						<div class="d-flex flex-row mb-3" style="width: 100%">
							<div class="d-flex flex-column mr-1" style="width: 100%">
								<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Password</h6>
								<input id="Edit_Passwordbox" placeholder="XXX-XXX-XXX" class="border-0 rounded p-3 mb-1" style="background: #333333; color: #4caf50; width: 100%">
							</div>
							<div class="d-flex flex-column ml-1" style="width: 100%">
								<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Repeat Password</h6>
								<input id="Edit_RPbox" placeholder="XXX-XXX-XXX" class="border-0 rounded p-3 mb-1" style="background: #333333; color: #4caf50; width: 100%">
							</div>
						</div>

						<h6 class="mb-0 pl-2 pb-1" style="font-size: 14px; font-weight: bold;">Verification Code</h6>
						<input id="Edit_Codebox" placeholder="XXX-XXX-XXX" class="border-0 rounded p-3 mb-1" style="background: #333333; color: #4caf50; width: 100%">

						<button onclick="new Login().Edit_DoneButton()" id="LoginEdit_DoneButton" class="border-0 mb-5 rounded pt-3 pb-3" style="background: #7289da; color: #ffffff; font-size: 14px; font-weight: bold;">OK</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Login")
	})

	function Entrance() {
		this.View_LoginButton = function() {
			$("#EntranceLogin_Area").removeClass('hide')
			$("#EntranceRegister_Area").addClass('hide')
			$("#EntranceForgot_Area").addClass('hide')

			$("title").text("E-Student Wallet Access - Login")
		}

		this.View_RegisterButton = function() {
			$("#EntranceLogin_Area").addClass('hide')
			$("#EntranceRegister_Area").removeClass('hide')
			$("#EntranceForgot_Area").addClass('hide')

			$("title").text("E-Student Wallet Access - Register")
		}
	}

	function Login() {
		this.View_DoneButton = function() {
			var View_Usernamebox = $("#View_Usernamebox")
			var View_Passwordbox = $("#View_Passwordbox")
			var LoginView_DoneButton = $("#LoginView_DoneButton")

			if(View_Usernamebox.val() != "" && View_Passwordbox.val() != "") {
				LoginView_DoneButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Login/View_DoneButton", 
					method: 'POST',
					data: {
				 		AccountUsername: View_Usernamebox.val(),
				 		AccountPassword: View_Passwordbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							
							$("#root").html('').load(window.location.href+ "/LoadView?" + data.QueryParag)
						}
						else {
							LoginView_DoneButton.attr('disabled', '')
							alert(data.ErrorDisplay)
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")

				 		LoginView_DoneButton.attr('disabled', '')
					}
				})
			}
			else alert("Error: Either Student ID or Password is Empty!")
		}

		this.View_ForgotButton = function() {
			$("#EntranceLogin_Area").addClass('hide')
			$("#EntranceRegister_Area").addClass('hide')
			$("#EntranceForgot_Area").removeClass('hide')

			$("title").text("E-Student Wallet Access - Forgot Password")
		}

		this.Edit_SendButton = function() {
			var Edit_Emailbox = $("#Edit_Emailbox")
			var LoginEdit_SendButton = $("#LoginEdit_SendButton")
			var Forgot_ConfirmationArea = $("#Forgot_ConfirmationArea")

			var Edit_EmailLabel = $("#Edit_EmailLabel")

			if(Edit_Emailbox.val() != "") {
				LoginEdit_SendButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterStudent/Edit_SendButton", 
					method: 'POST',
					data: {
				 		AccountEmail: Edit_Emailbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							Forgot_ConfirmationArea.removeClass('hide')
							Edit_EmailLabel.text(Edit_Emailbox.val())
							LoginEdit_SendButton.attr('disabled', '')
						} 
						else {
							alert(data.ErrorDisplay)
							LoginEdit_SendButton.attr('disabled', '')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")

				 		LoginEdit_SendButton.attr('disabled', '')
					}
				})
			}
			else alert("Error: Emailbox is Empty!")
		}

		this.Edit_DoneButton = function() {
			var EntranceForgot_Area = $("#EntranceForgot_Area")
			var Edit_Emailbox = $("#Edit_Emailbox")

			var Forgot_ConfirmationArea = $("#Forgot_ConfirmationArea")
			var Edit_Passwordbox = $("#Edit_Passwordbox")
			var Edit_RPbox = $("#Edit_RPbox")
			var Edit_Codebox = $("#Edit_Codebox")
			var LoginEdit_DoneButton = $("#LoginEdit_DoneButton")

			var EntranceLogin_Area = $("#EntranceLogin_Area")

			if(Edit_Emailbox.val() != "" && Edit_Passwordbox.val() != "" && Edit_RPbox.val() != "" && Edit_Codebox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterStudent/Edit_DoneButton", 
					method: 'POST',
					data: {
				 		AccountEmail: Edit_Emailbox.val(),
				 		AccountPassword: Edit_Passwordbox.val(),
				 		AccountRP: Edit_RPbox.val(),
				 		RegisterCode: Edit_Codebox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EntranceForgot_Area.addClass('hide')
							EntranceLogin_Area.removeClass('hide')

							Forgot_ConfirmationArea.addClass('hide')

							Edit_Emailbox.val('')
							Edit_Passwordbox.val('')
							Edit_RPbox.val('')
							Edit_Codebox.val('')
						}
						else {
							alert(data.ErrorDisplay)
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else {
				var ErrorDisplay = ""

				if(Edit_Emailbox.val() != "") ErrorDisplay += "(Email) "
				if(Edit_Passwordbox.val() != "") ErrorDisplay += "(Password) "
				if(Edit_RPbox.val() != "") ErrorDisplay += "(Repeat Password) "
				if(Edit_Codebox.val() != "") ErrorDisplay += "(Code) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = ""
			}
		}
	}

	function Register() {
		this.Create_NextButton = function() {
			var EntranceRegister_Area = $("#EntranceRegister_Area")
			var Create_Usernamebox = $("#Create_Usernamebox")
			var Create_Emailbox = $("#Create_Emailbox")
			var Create_Passwordbox = $("#Create_Passwordbox")
			var Create_Repeatbox = $("#Create_Repeatbox")
			var Create_IDbox = $("#Create_IDbox")
			var RegisterCreate_NextButton = $("#RegisterCreate_NextButton")

			var EntranceVerification_Area = $("#EntranceVerification_Area")
			var View_EmailLabel = $("#View_EmailLabel")

			if(Create_Usernamebox.val() != "" && Create_Emailbox.val() != "" && Create_Passwordbox.val() != "" && Create_Repeatbox.val() != "" && Create_IDbox.val() != "") {
				RegisterCreate_NextButton.attr('disabled', 'disabled')
				
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterStudent/Create_NextButton",
					method: 'POST',
					data: {
				 		RegisterUsername: Create_Usernamebox.val(),
				 		RegisterEmail: Create_Emailbox.val(),
				 		RegisterPassword: Create_Passwordbox.val(),
				 		RegisterRP: Create_Repeatbox.val(),
				 		RegisterSI: Create_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EntranceVerification_Area.removeClass('hide')
							EntranceRegister_Area.addClass('hide')
							RegisterCreate_NextButton.removeAttr('disabled')
							View_EmailLabel.text(Create_Emailbox.val())
						}
						else {
							alert(data.ErrorDisplay)

							RegisterCreate_NextButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!\nPlease Try Again")

				 		RegisterCreate_NextButton.removeAttr('disabled')
					}
				})
			}
			else {
				var ErrorDisplay = ""

				if(Create_Usernamebox.val() == "") ErrorDisplay += "(Username) "
				if(Create_Emailbox.val() == "") ErrorDisplay += "(Email) "
				if(Create_Passwordbox.val() == "") ErrorDisplay += "(Password) "
				if(Create_Repeatbox.val() == "") ErrorDisplay += "(Repeat Password) "
				if(Create_IDbox.val() == "") ErrorDisplay += "(Student ID) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = ""
			}
		}

		this.Create_ResendButton = function() {
			var Create_Usernamebox = $("#Create_Usernamebox")
			var Create_Emailbox = $("#Create_Emailbox")
			var Create_IDbox = $("#Create_IDbox")
			var RegisterCreate_ResendButton = $("#RegisterCreate_ResendButton")

			var EntranceVerification_Area = $("#EntranceVerification_Area")
			var EntranceDone_Area = $("#EntranceDone_Area")

			if(Create_Usernamebox.val() != "" && Create_Emailbox.val() != "" && Create_Passwordbox.val() != "" && Create_Repeatbox.val() != "" && Create_IDbox.val() != "") {
				RegisterCreate_ResendButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterStudent/Create_ResendButton?Resend=1",
					method: 'POST',
					data: {
				 		RegisterUsername: Create_Usernamebox.val(),
				 		RegisterEmail: Create_Emailbox.val(),
				 		RegisterSI: Create_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EntranceDone_Area.removeClass('hide')
							EntranceVerification_Area.addClass('hide')

							RegisterCreate_ResendButton.removeAttr('disabled')

							alert("Server: Check your email now to get Verification COde in your Email Address!")
						}
						else {
							alert(data.ErrorDisplay)

							RegisterCreate_ResendButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!\nPlease Try Again")

				 		RegisterCreate_ResendButton.removeAttr('disabled')
					}
				})
			}
			else {
				var ErrorDisplay = ""

				if(Create_Usernamebox.val() == "") ErrorDisplay += "(Username) "
				if(Create_Emailbox.val() == "") ErrorDisplay += "(Email) "
				if(Create_IDbox.val() == "") ErrorDisplay += "(Student ID) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = ""
			}
		}

		this.Create_BackButton = function() {
			var Create_IDbox = $("#Create_IDbox")

			var EntranceVerification_Area = $("#EntranceVerification_Area")
			var EntranceRegister_Area = $("#EntranceRegister_Area")

			if(Create_IDbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterStudent/Create_BackButton?RegisterSI="+ Create_IDbox.val(), 
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EntranceVerification_Area.addClass('hide')
							EntranceRegister_Area.removeClass('hide')
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!\nPlease Try Again")
					}
				})
			}
		}

		this.Create_DoneButton = function() {
			var Create_Usernamebox = $("#Create_Usernamebox")
			var Create_Emailbox = $("#Create_Emailbox")
			var Create_Passwordbox = $("#Create_Passwordbox")
			var Create_Repeatbox = $("#Create_Repeatbox")
			var Create_IDbox = $("#Create_IDbox")
			var Create_Codebox = $("#Create_Codebox")
			var RegisterCreate_DoneButton = $("#RegisterCreate_DoneButton")

			var EntranceDone_Area = $("#EntranceDone_Area")
			var EntranceVerification_Area = $("#EntranceVerification_Area")

			if(Create_Codebox.val() != "") {
				RegisterCreate_DoneButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterStudent/Create_DoneButton", 
					method: 'POST',
					data: {
				 		RegisterCode: Create_Codebox.val(),
				 		RegisterSI: Create_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EntranceVerification_Area.addClass('hide')
							EntranceDone_Area.removeClass('hide')
							RegisterCreate_DoneButton.attr('disabled', '')

							Create_Codebox.val('')
							Create_IDbox.val('')
							Create_Repeatbox.val('')
							Create_Passwordbox.val('')
							Create_Emailbox.val('')
							Create_Usernamebox.val('')
						}
						else {
							alert(data.ErrorDisplay)

							RegisterCreate_DoneButton.attr('disabled', '')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!\nPlease Try Again")

				 		RegisterCreate_DoneButton.attr('disabled', '')
					}
				})
			}
			else alert("Error: Verification Codebox is Empty!")
		}

		this.Create_OkButton = function() {
			$("#EntranceDone_Area").addClass('hide')
			$("#EntranceLogin_Area").removeClass('hide')
		}
	}
</script>