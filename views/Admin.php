<div class="position-fixed" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width:100%; height: 100%">
	<div class="d-flex flex-column" style="background: #282828; color: #4caf50; width:100%; height: 100%">
		<div class="d-flex flex-row justify-content-center" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<!-- Create Account -->
			<div class="d-flex flex-column p-5" style="width:750px; height: 100%">
				<!-- Step 1 -->
				<div id="Create_StepArea1" class="d-flex flex-column">
					<div class="p-0 ml-2 mb-1" style="color: #7289da; min-width: 125px; font-weight: bold;">REGISTRATION</div>
					<!-- Create Account -->
					<div class="d-flex flex-column rounded p-3" style="background: #1e2124;">
						<h4 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Email</h4>
						<input id="Create_Emailbox" class="mb-4 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;" placeholder="Ex. sample@email.com">

						<div class="d-flex flex-row mb-4" style="width: 100%">
							<div class="d-flex flex-column" style="width: 200px;">
								<h6 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Account Type</h6>
								<select id="Create_TypeButton" class="custom-select m-0 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%; height: 50px;">
									<option value="ADMIN">ADMIN</option>
									<option value="DEPARTMENT">DEPARTMENT</option>
									<option value="CASHIER">CASHIER</option>
								</select>
							</div>
							<div class="d-flex flex-column ml-2" style="width: 100%">
								<h6 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Username</h6>
								<input id="Create_Usernamebox" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%; height: 50px;" placeholder="Ex. XXX XXX">
							</div>
						</div>

						<div class="d-flex flex-row mb-4" style="width: 100%">
							<div class="d-flex flex-column" style="width: 100%;">
								<h6 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Password</h6>
								<input id="Create_Passwordbox" type="password" placeholder="*************" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;">
							</div>
							<div class="d-flex flex-column ml-2" style="width: 100%">
								<h6 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Repeat Password</h6>
								<input id="Create_Repeatbox" type="password" placeholder="*************" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;">
							</div>
						</div>

						<button id="RegisterCreate_NextButton" onclick="new Register().Create_NextButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mt-2" style="background: #333333; color: #7289da; width: 125px;">Next</button>
					</div>
				</div>
				<!-- End of Step 1 -->
				<!-- Step 2 -->
				<div id="Create_StepArea2" class="d-flex flex-column hide">
					<div class="p-0 ml-2 mb-4" style="color: #7289da; min-width: 125px; font-weight: bold;">VERIFICATION CODE</div>

					<h6 class="ml-2 mb-1 mr-2" style="font-size: 14px; font-weight: bold;">To get your Verification Code, check your Email Account name <span id="Create_EmailLabel2"></span> and if the Verification Code is already send to your Inbox.</h6>
					<div class="d-flex flex-row mb-4">
						<input id="Create_Codebox" type="number" placeholder="Ex. 15730500" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%; height: 50px;">
						<button onclick="new Register().Create_ResendButton2()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 200px; height: 50px;">RESEND CODE</button>
					</div>

					<div class="d-flex flex-column rounded p-3 mb-2" style="background: #1e2124;">
						<div class="d-flex flex-column mb-4">
							<h6 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Name</h6>
							<div class="d-flex flex-row" style="width: 100%">
								<div class="d-flex flex-row rounded" style="background: #333333; width: 100%">
									<input id="Create_Lastnamebox" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;" placeholder="Lastname">
									<div class="d-flex align-items-end pb-3">,</div>
									<input id="Create_Firstnamebox" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;" placeholder="Firstname">
								</div>
								<input id="Create_Middlenamebox" class="border-0 rounded p-3 ml-1" style="background: #333333; color: #4caf50; width: 200px;" placeholder="Middlename">
							</div>
						</div>

						<div class="d-flex flex-row mb-4" style="width: 100%">
							<div class="d-flex flex-column" style="width: 300px;">
								<h4 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Position</h4>
								<input id="Create_Positionbox" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;" placeholder="Ex. Cashier, Director, ......">
							</div>
							<div class="d-flex flex-column ml-1" style="width: 100%">
								<h4 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Department</h4>
								<input id="Create_Departmentbox" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;" placeholder="Ex. IT Department, .......">
							</div>
						</div>

						<div class="d-flex flex-row mb-4" style="width: 100%">
							<div class="d-flex flex-column" style="width: 300px;">
								<h4 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Age</h4>
								<input id="Create_Agebox" type="number" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%; height: 50px;" placeholder="Ex. 69">
							</div>
							<div class="d-flex flex-column ml-1" style="width: 100%">
								<h4 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Gender</h4>
								<select id="Create_Genderbox" class="custom-select m-0 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%; height: 50px;">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>					

						<h4 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Contact Number (Optional)</h4>
						<input id="Create_Contactbox" type="number" class="mb-4 border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;" placeholder="Ex. +639123456789">

						<h6 class="ml-2 mb-1" style="font-size: 14px; font-weight: bold;">Employee ID</h6>
						<input id="Create_IDbox" type="number" placeholder="Ex. 15730500" class="border-0 rounded p-3" style="background: #333333; color: #4caf50; width: 100%;">
					</div>

					<div class="d-flex flex-row mb-5">
						<button onclick="new Register().Create_DoneButton()" id="RegisterCreate_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 125px;">DONE</button>
						<button onclick="new Register().Create_BackButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #e91e63; width: 125px;">BACK</button>
					</div>
				</div>
				<!-- End of Step 2 -->
				<!-- Step Final -->
				<div id="Create_StepArea3" class="d-flex flex-column hide">
					<div class="p-0 mb-4" style="color: #7289da; min-width: 125px; font-weight: bold;">REGISTRATION COMPLETE!</div>

					<h6 class="ml-2 mb-1 mr-2 mb-4"  style="color: #ffffff; font-size: 14px; font-weight: bold;">Congratulation! You are now done created a new Account. Try to logout in this Web Page and Relogin again.</h6>

					<button onclick="new Register().Create_OkButton()" id="RegisterCreate_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #7289da; color: #ffffff; width: 125px;">OK</button>
				</div>
				<!-- End of Step Final -->
			</div>
			<!-- End of Create Account -->
		</div>
		<!-- Taskbar -->
		<div class="d-flex flex-row p-1" style="background: #424549; width: 100%">
			<div class="d-flex flex-row" style="width: 500px;">
				<button onclick="new Search().View_LogoutButton()" class="material-icons border-0 rounded" style="background: #333333; color: #ffffff; min-width: 50px; max-width: 50px; height: 50px;">logout</button>
				<div class="d-flex flex-row border-0 rounded ml-1" style="background: #333333; color: #ffffff; width: 100%; height: 50px;">
					<input id="View_Searchbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%; height: 50px;" type="number" placeholder="Search Employee ID">
					<button onclick="new Search().View_SearchButton()" class="material-icons border-0 rounded" style="background: #333333; color: #ffffff; min-width: 50px; max-width: 50px; height: 50px;">search</button>
				</div>
			</div>
		</div>
		<!-- End of Taskbar -->
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
		this.Create_NextButton = function() {
			var Create_Emailbox = $("#Create_Emailbox")
			var Create_Usernamebox = $("#Create_Usernamebox")
			var Create_Passwordbox = $("#Create_Passwordbox")
			var Create_Repeatbox = $("#Create_Repeatbox")

			var Create_TypeButton = $("#Create_TypeButton option:selected")
			var RegisterCreate_NextButton = $("#RegisterCreate_NextButton")

			if(Create_Emailbox.val() != "" && Create_Usernamebox.val() != "" && Create_Passwordbox.val() != "" && Create_Repeatbox.val() != "") {
				if(Create_Passwordbox.val() == Create_Repeatbox.val()) {
					RegisterCreate_NextButton.attr('disabled', 'disabled')

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_NextButton", 
						method: 'POST',
						data: {
					 		RegisterEmail: Create_Emailbox.val(),
					 		RegisterUsername: Create_Usernamebox.val(),
					 		RegisterPassword: Create_Passwordbox.val(),
					 		RegisterRP: Create_Repeatbox.val(),
					 		RegisterType: Create_TypeButton.val()
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								$("#Create_StepArea1").addClass('hide')
								$("#Create_StepArea2").removeClass('hide')

								RegisterCreate_NextButton.removeAttr('disabled')
							}
							else {
								alert(data.ErrorDisplay)

								RegisterCreate_NextButton.removeAttr('disabled')
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Error: Unexpected Error Occur!")

					 		RegisterCreate_NextButton.removeAttr('disabled')
						}
					})
				}
				else alert("Error: Password Mismatch!")
			}
			else {
				var ErrorDisplay = "Error: "

				if(Create_Emailbox.val() == "") ErrorDisplay += "(Email) "
				if(Create_Usernamebox.val() == "") ErrorDisplay += "(Username) "
				if(Create_Passwordbox.val() == "") ErrorDisplay += "(Password) "
				if(Create_Repeatbox.val() == "") ErrorDisplay += "(Repeat Password) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = "Error: "
			}
		}

		this.Create_BackButton = function() {
			var Create_Emailbox = $("#Create_Emailbox")

			if(Create_Emailbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_BackButton", 
					method: 'POST',
					data: {
				 		RegisterEmail: Create_Emailbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							$("#Create_StepArea2").addClass('hide')
							$("#Create_StepArea1").removeClass('hide')
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else alert("Error: (Email) is Empty!")

			$("#Create_StepArea2").removeClass('hide')
			$("#Create_StepArea3").addClass('hide')
		}

		this.Create_DoneButton = function() {
			var Create_Codebox = $("#Create_Codebox")

			var Create_Lastnamebox = $("#Create_Lastnamebox")
			var Create_Firstnamebox = $("#Create_Firstnamebox")
			var Create_Middlenamebox = $("#Create_Middlenamebox")

			var Create_Positionbox = $("#Create_Positionbox")
			var Create_Departmentbox = $("#Create_Departmentbox")

			var Create_Agebox = $("#Create_Agebox")
			var Create_Genderbox = $("#Create_Genderbox option:selected")

			var Create_Contactbox = $("#Create_Contactbox")
			var Create_IDbox = $("#Create_IDbox")

			var RegisterCreate_DoneButton = $("#RegisterCreate_DoneButton")

			if(Create_Codebox.val() != "" && Create_Lastnamebox.val() != "" && Create_Firstnamebox.val() != "" && Create_Middlenamebox.val() != "" && Create_Positionbox.val() != "" && Create_Departmentbox.val() != "" && Create_Agebox.val() != "" && Create_IDbox.val() != "") {
				RegisterCreate_DoneButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/RegisterAdmin/Create_DoneButton", 
					method: 'POST',
					data: {
				 		RegisterCode: Create_Codebox.val(),
				 		RegisterName: JSON.stringify({
				 			"Lastname": Create_Lastnamebox.val(),
				 			"Firstname": Create_Firstnamebox.val(),
				 			"Middlename": Create_Middlenamebox.val()
				 		}),
				 		RegisterPosition: Create_Positionbox.val(),
				 		RegisterDepartment: Create_Departmentbox.val(),
				 		RegisterAge: Create_Agebox.val(),
				 		RegisterGender: Create_Genderbox.val(),
				 		RegisterContact: Create_Contactbox.val(),
				 		RegisterEI: Create_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							$("#Create_StepArea2").addClass('hide')
							$("#Create_StepArea3").removeClass('hide')

							RegisterCreate_DoneButton.removeAttr('disabled')
						}
						else {
							alert(data.ErrorDisplay)

							RegisterCreate_DoneButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")

				 		RegisterCreate_DoneButton.removeAttr('disabled')
					}
				})
			}
			else {
				var ErrorDisplay = "Error: "

				if(Create_Codebox.val() == "") ErrorDisplay += "(Verification Code) "
				if(Create_Lastnamebox.val() == "") ErrorDisplay += "(Lastname) "
				if(Create_Firstnamebox.val() == "") ErrorDisplay += "(Firstname) "
				if(Create_Middlenamebox.val() == "") ErrorDisplay += "(Middlename) "
				if(Create_Positionbox.val() == "") ErrorDisplay += "(Position) "
				if(Create_Departmentbox.val() == "") ErrorDisplay += "(Department) "
				if(Create_IDbox.val() == "") ErrorDisplay += "(Employee ID) "

				ErrorDisplay += "is Empty!"

				alert(ErrorDisplay)

				ErrorDisplay = "Error: "
			}
		}

		this.Create_OkButton = function() {
			$("#Create_StepArea3").addClass('hide')
			$("#Create_StepArea1").removeClass('hide')

			$("#Create_Emailbox").val('')
			$("#Create_Usernamebox").val('')
			$("#Create_Passwordbox").val('')
			$("#Create_Repeatbox").val('')

			$("#Create_Lastnamebox").val('')
			$("#Create_Firstnamebox").val('')
			$("#Create_Middlenamebox").val('')

			$("#Create_Positionbox").val('')
			$("#Create_Departmentbox").val('')

			$("#Create_Agebox").val('')

			$("#Create_Contactbox").val('')
			$("#Create_IDbox").val('')
		}
	}
</script>