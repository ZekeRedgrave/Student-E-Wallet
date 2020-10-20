<div class="position-fixed" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width:100%; height: 100%">
	<div class="d-flex flex-column" style="width:100%; height: 100%">
		<div class="d-flex justify-content-center border-bottom p-1" style="width: 100%">
			<div class="d-flex flex-row">
				<input id="View_Searchbox" class="form-control" type="number" placeholder="Search ID">
				<button onclick="new Search().View_SearchButton()" class="material-icons border rounded pl-3 pr-3 ml-1" style="background-color: white">search</button>
				<button onclick="new Search().View_LogoutButton()" class="material-icons border rounded pl-3 pr-3 ml-5" style="background-color: white">logout</button>
			</div>
		</div>

		<div class="d-flex flex-row justify-content-center" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<div class="d-flex flex-column p-5" style="height: 100%">
				<h4>Create System Administrator Account</h4>
				<!-- Create Account -->
				<div id="Create_StepArea1" class="d-flex flex-column">
					<h6 class="mb-3" style="font-weight: bold">Verification Code</h6>

					<h4 class="m-0" style="font-size: 12px; font-weight: bold;">Email</h4>
					<input id="Create_Emailbox1" placeholder="Ex. sample@email.com" class="form-control mb-2">
					<button onclick="new Register().Create_SendButton()" class="form-control mb-5" style="font-size: 14px; font-weight: bold;">SEND</button>

					<div id="Create_CodeArea" class="hide">
						<h6 class="mb-0 mt-3" style="font-size: 14px; font-weight: bold; word-break: break-all;">To get your Verification Code, check your Email Account name <span id="Create_EmailLabel1"></span> and if the Verification Code is already send to your Inbox.</h6>
						<input id="Create_Codebox1" type="number" placeholder="Ex. 15730500" class="form-control mb-2">
						<button onclick="new Register().Create_ResendButton1()" class="form-control mb-5" style="font-size: 14px; font-weight: bold;">RESEND CODE</button>
					</div>

					<h4 class="m-0" style="font-size: 12px; font-weight: bold;">Account Type</h4>
					<select id="Create_TypeButton" class="custom-select form-control">
						<option value="ADMIN">ADMIN</option>
						<option value="DEPARTMENT">DEPARTMENT</option>
						<option value="CASHIER">CASHIER</option>
					</select>

					<button onclick="new Register().Create_NextButton1()" class="form-control mt-2" style="font-size: 14px; font-weight: bold;">NEXT</button>
				</div>

				<div id="Create_StepArea2" class="d-flex flex-column hide">
					<h6 class="mb-3" style="font-weight: bold">Create New Account</h6>

					<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Username</h6>
					<input id="Create_Usernamebox" class="form-control mb-3" placeholder="Ex. XXX XXX" style="width: 100%">
					<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Email</h6>
					<input id="Create_Emailbox2" class="form-control mb-3" placeholder="Ex. studentewallet@email.com" style="width: 100%">
					<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Password</h6>
					<input id="Create_Passwordbox" type="password" placeholder="*************" class="form-control mb-3" style="width: 100%">
					<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Repeat Password</h6>
					<input id="Create_Repeatbox" type="password" placeholder="*************" class="form-control mb-5" style="width: 100%">

					<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Employee ID</h6>
					<input id="Create_IDbox" type="number" placeholder="Ex. 15730500" class="form-control mb-5" style="width: 100%">

					<button onclick="new Register().Create_NextButton2()" class="form-control" style="font-size: 14px; font-weight: bold;">NEXT</button>
				</div>

				<div id="Create_StepArea3" class="d-flex flex-column hide">
					<h6 class="mb-3" style="font-weight: bold">Verification Code</h6>

					<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">To get your Verification Code, check your Email Account name <span id="Create_EmailLabel2"></span> and if the Verification Code is already send to your Inbox.</h6>
					<input id="Create_Codebox2" type="number" placeholder="Ex. 15730500" class="form-control mb-2">
					<button onclick="new Register().Create_ResendButton2()" class="form-control mb-5" style="font-size: 14px; font-weight: bold;">RESEND CODE</button>

					<button onclick="new Register().Create_BackButton()" class="form-control mt-2" style="font-size: 14px; font-weight: bold;">BACK</button>
					<button onclick="new Register().Create_DoneButton()" class="form-control mt-2" style="font-size: 14px; font-weight: bold;">DONE</button>
				</div>

				<div id="Create_StepArea4" class="d-flex flex-column hide">
					<h6 class="mb-3" style="font-weight: bold">Registration Complete!</h6>

					<h6 class="mb-0"  style="font-size: 14px; font-weight: bold;">Congratulation! You are now done created a new Account. Try to logout in this Web Page and Relogin again.</h6>

					<button onclick="new Register().Create_OkButton()" class="form-control mt-2" style="font-size: 14px; font-weight: bold;">OK</button>
				</div>
				<!-- End of Create Account -->
			</div>
			<div class="d-flex flex-column p-5 border-left">
				<h4>Edit System Administrator Account</h4>
				<!-- Create Account -->
				<div class="d-flex flex-column">
					<h6 class="mb-3" style="font-weight: bold">Verification Code</h6>

					<h4 class="m-0" style="font-size: 12px; font-weight: bold;">Email</h4>
					<input id="Edit_Emailbox" placeholder="Ex. XXX XXX XXX" class="form-control mb-2">
					<button onclick="new Register().Edit_SendButton()" class="form-control mb-5" style="font-size: 14px; font-weight: bold;">SEND</button>

					<div id="Forgot_ConfirmationArea" class="hide">
						<h6 class="mb-0 mb-3" style="font-size: 14px; font-weight: bold; word-break: break-all;">To get your Verification Code, check your Email Account name <span id="Edit_EmailLabel"></span> and if the Verification Code is already send to your Inbox.</h6>

						<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Password</h6>
						<input id="Edit_Passwordbox" class="form-control mb-3" type="password" placeholder="Ex. XXX XXX XXX" style="width: 100%">

						<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Repeat Password</h6>
						<input id="Edit_RPbox" class="form-control mb-3" type="password" placeholder="Ex. XXX XXX XXX" style="width: 100%">

						<h6 class="mb-0" style="font-size: 14px; font-weight: bold;">Verification Code</h6>
						<input id="Edit_Codebox" class="form-control mb-3" type="number" placeholder="Ex. XXX XXX XXX" style="width: 100%">

						<button onclick="new Register().Edit_DoneButton()" class="form-control mt-2" style="font-size: 14px; font-weight: bold;">OK</button>
					</div>
				</div>
				<!-- End of Create Account -->
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Admin Default")
	})

	function Search() {
		this.View_SearchButton = function() {

		}

		this.View_LogoutButton = function() {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/View_LogoutButton", 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#root").load(window.location+ "/LoadView?"+data.QueryParag)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!")
				}
			})
		}
	}

	function Register() {
		this.Edit_SendButton = function() {
			var Forgot_ConfirmationArea = $("#Forgot_ConfirmationArea")
			var Edit_Emailbox = $("#Edit_Emailbox")

			var Edit_EmailLabel = $("#Edit_EmailLabel")

			if(Edit_Emailbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Edit_SendButton", 
					method: 'POST',
					data: {
				 		AccountEmail: Edit_Emailbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							Forgot_ConfirmationArea.removeClass('hide')
							Edit_EmailLabel.val(Edit_Emailbox.val())
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Emailbox is Empty!")
		}

		this.Edit_DoneButton = function() {
			var Forgot_ConfirmationArea = $("#Forgot_ConfirmationArea")
			var Edit_Emailbox = $("#Edit_Emailbox")
			var Edit_Passwordbox = $("#Edit_Passwordbox")
			var Edit_RPbox = $("#Edit_RPbox")
			var Edit_Codebox = $("#Edit_Codebox")

			if(Edit_Emailbox.val() != "" && Edit_Passwordbox.val() != "" && Edit_RPbox.val() != "" && Edit_Codebox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Edit_DoneButton", 
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
							Forgot_ConfirmationArea.addClass('hide')

							Edit_Emailbox.val('')
							Edit_Passwordbox.val('')
							Edit_RPbox.val('')
							Edit_Codebox.val('')
						}
						else alert(data.ErrorDisplay)
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

		this.Create_SendButton = function() {
			var Create_Emailbox1 = $("#Create_Emailbox1")
			var Create_EmailLabel1 = $("#Create_EmailLabel1")
			var Create_CodeArea = $("#Create_CodeArea")

			if(Create_Emailbox1.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_SendButton", 
					method: 'POST',
					data: {
				 		RegisterEmail: Create_Emailbox1.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							Create_CodeArea.removeClass('hide')
							Create_EmailLabel1.text(Create_Emailbox1.val())
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Emailbox is Empty!")
		}

		this.Create_ResendButton1 = function() {
			var Create_Emailbox1 = $("#Create_Emailbox1")

			if(Create_Emailbox1.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_ResendButton1", 
					method: 'POST',
					data: {
				 		RegisterEmail: Create_Emailbox1.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) alert(data.SuccessDisplay)
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Emailbox is Empty!")
		}

		this.Create_NextButton1 = function() {
			var Create_StepArea1 = $("#Create_StepArea1")
			var Create_StepArea2 = $("#Create_StepArea2")

			var Create_Emailbox1 = $("#Create_Emailbox1")
			var Create_Codebox1 = $("#Create_Codebox1")
			var Create_TypeButton = $("#Create_TypeButton option:selected")

			var Create_Emailbox2 = $("#Create_Emailbox2")

			if(Create_Emailbox1.val() != "" && Create_Codebox1.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_NextButton1", 
					method: 'POST',
					data: {
				 		RegisterEmail: Create_Emailbox1.val(),
				 		RegisterCode: Create_Codebox1.val(),
				 		RegisterType: Create_TypeButton.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							Create_StepArea1.addClass('hide')
							Create_StepArea2.removeClass('hide')

							Create_Emailbox2.val(Create_Emailbox1.val())
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else {
				var ErrorDisplay = "Error: "

				if(Create_Emailbox1.val() == "") ErrorDisplay += "(Email) "
				if(Create_Codebox1.val() == "") ErrorDisplay += "(Verification Code) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = "Error: "
			}
		}

		this.Create_NextButton2 = function() {
			var Create_StepArea2 = $("#Create_StepArea2")
			var Create_StepArea3 = $("#Create_StepArea3")

			var Create_Usernamebox = $("#Create_Usernamebox")
			var Create_Emailbox2 = $("#Create_Emailbox2")
			var Create_Passwordbox = $("#Create_Passwordbox")
			var Create_Repeatbox = $("#Create_Repeatbox")
			var Create_IDbox = $("#Create_IDbox")

			var Create_EmailLabel2 = $("#Create_EmailLabel2")

			if(Create_Usernamebox.val() != "" && Create_Emailbox2.val() != "" && Create_Passwordbox.val() != "" && Create_Repeatbox.val() != "" && Create_IDbox.val() != "") {
				if(Create_Passwordbox.val() == Create_Repeatbox.val()) {
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_NextButton2", 
						method: 'POST',
						data: {
					 		RegisterUsername: Create_Usernamebox.val(),
					 		RegisterEmail: Create_Emailbox2.val(),
					 		RegisterPassword: Create_Passwordbox.val(),
					 		RegisterRP: Create_Repeatbox.val(),
					 		RegisterEI: Create_IDbox.val()
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								Create_StepArea3.removeClass('hide')
								Create_StepArea2.addClass('hide')

								Create_EmailLabel2.text(Create_Emailbox2.val())
							}
							alert(data.ErrorDisplay)
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Error: Unexpected Error Occur!")
						}
					})
				}
				else alert("Error: Password Mismatch!")
			}
			else {
				var ErrorDisplay = "Error: "

				if(Create_Usernamebox.val() == "") ErrorDisplay += "(Username) "
				if(Create_Emailbox2.val() == "") ErrorDisplay += "(Email) "
				if(Create_Passwordbox.val() == "") ErrorDisplay += "(Password) "
				if(Create_Repeatbox.val() == "") ErrorDisplay += "(Repeat Password) "
				if(Create_IDbox.val() == "") ErrorDisplay += "(Employee ID) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = "Error: "
			}
		}

		this.Create_BackButton = function() {
			$("#Create_StepArea2").removeClass('hide')
			$("#Create_StepArea3").addClass('hide')
		}

		this.Create_ResendButton2 = function() {
			var Create_Emailbox2 = $("#Create_Emailbox2")

			if(Create_Emailbox2.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_ResendButton2", 
					method: 'POST',
					data: {
				 		RegisterEmail: Create_Emailbox2.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) alert(data.SuccessDisplay)
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Emailbox is Empty!")
		}

		this.Create_DoneButton = function() {
			var Create_StepArea3 = $("#Create_StepArea3")
			var Create_StepArea4 = $("#Create_StepArea4")

			var Create_Codebox2 = $("#Create_Codebox2")
			var Create_IDbox = $("#Create_IDbox")

			if(Create_Codebox2.val() != "" && Create_IDbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_DoneButton", 
					method: 'POST',
					data: {
				 		RegisterCode: Create_Codebox2.val(),
				 		RegisterEI: Create_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							Create_StepArea3.addClass('hide')
							Create_StepArea4.removeClass('hide')
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else {
				var ErrorDisplay = "Error: "

				if(Create_Codebox2.val() == "") ErrorDisplay += "(Verification Code) "
				if(Create_IDbox.val() == "") ErrorDisplay += "(Employee ID) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = "Error: "
			}
		}

		this.Create_OkButton = function() {
			$("#Create_StepArea1").removeClass('hide')
			$("#Create_CodeArea").addClass('hide')
			$("#Create_Emailbox1").val('')
			$("#Create_Codebox1").val('')

			$("#Create_Usernamebox").val('')
			$("#Create_Emailbox2").val('')
			$("#Create_Passwordbox").val('')
			$("#Create_Repeatbox").val('')
			$("#Create_IDbox").val('')

			$("#Create_StepArea4").addClass('hide')
			$("#Create_Codebox2").val('')
		}
	}
</script>