<div class="position-fixed" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex flex-row" style="background: center no-repeat url(''); background-size: 100% auto; width: 100%; height: 100%;">
		<div style="width: 100%">
		</div>
		<div class="d-flex flex-row" style="background-color: #ffffffee">
			<div class="d-flex flex-column mt-3 mr-2 pl-2">
				<button id="SigninButton" class="material-icons rounded-circle form-control mb-2" style="background: white; width: 50px; height: 50px">login</button>
				<button id="SignupButton" class="material-icons rounded-circle form-control" style="background: white; width: 50px; height: 50px">how_to_reg</button>
			</div>
			<div id="AccountForm_Area" class="border-left p-3" style="width: 275px">
				<h4 class="mb-5">E-Student Wallet</h4>
				<h6 style="margin: 0">Student ID: </h6>
				<input id="LoginID" type="number" class="form-control mb-3" placeholder="Ex. 123456789" style="width: 100%">
				<h6 style="margin: 0">Password ID: </h6>
				<input id="LoginPassword" type="password" placeholder="*************" class="form-control mb-3" style="width: 100%">
				<button id="LoginButton" onclick="LoginButton()" class="form-control" style="font-size: 14px; font-weight: bold;">LOGIN</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Login")
		
		var AccountForm_Area = $("#AccountForm_Area")

		var LoginHTML = `
			<h4 class="mb-5">E-Student Wallet</h4>
			<h6 style="margin: 0">Student ID: </h6>
			<input id="LoginID" type="number" class="form-control mb-3" placeholder="Ex. 123456789" style="width: 100%">
			<h6 style="margin: 0">Password ID: </h6>
			<input id="LoginPassword" type="password" placeholder="*************" class="form-control mb-3" style="width: 100%">
			<button id="LoginButton" onclick="LoginButton()" class="form-control" style="font-size: 14px; font-weight: bold;">LOGIN</button>
		`
		var RegisterHTML = `

		`
		
		$("#SigninButton").click(function() {
			$("title").text("E-Student Wallet Access - Login")
			AccountForm_Area.html(LoginHTML)
		})
		$("#SignupButton").click(function() {
			$("title").text("E-Student Wallet Access - Register")
			AccountForm_Area.html(RegisterHTML)
		})
	})

	function LoginButton() {
		$(document).ready(function() {
			var LoginID = $("#LoginID")
			var LoginPassword = $("#LoginPassword")

			if(LoginID.val() != "" && LoginPassword.val() != "") {
				$.ajax({
					url: window.location + "/LoginAccess?formType=login", 
					method: 'POST',
					data: {
				 		LoginID: LoginID.val(),
				 		LoginPassword: LoginPassword.val()
					},
					dataType: 'json',
					success: function(data) {
						if(data.isError == false) {
							$("#root").html("").load(window.location+ "/LoadView?" +data.QueryParam)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				 		$("#LoginButton").removeAttr('disabled')

					},
					beforeSend: function() {
						$("#LoginButton").attr('disabled', 'disabled')
					}
				})
			}
			else alert("Error: Either Student ID or Password are Empty!")
		})
	}
</script>