<div id="App_AccountArea" class="d-flex flex-row hide" style="width:100%; height: 100%">
	<div class="d-flex flex-column" style="width: 100%; height: 100%">
		<div class="p-2" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">

			<h4 class="m-0 mt-2" style="">On-Hold New Register Account Information</h4>
			<div class="d-flex flex-column border rounded mt-1 p-2">
				<div class="d-flex flex-row">
					<a class="material-icons p-1 pl-3" style="font-size: 15px;">arrow_back_ios</a>
					<div class="d-flex align-items-center ml-4 mr-4" style="width: 100%; font-size: 13px;">Register ID #1</div>

					<a id="AccountRegister_DeleteButton" onclick="new Account().View_DeleteButton()" class="material-icons p-1 mr-1 red-text" style="font-size: 15px;">delete</a>
					<a id="AccountRegister_AcceptButton" onclick="new Account().View_AcceptButton()" class="material-icons p-1" style="font-size: 15px;">check</a>
				</div>

				<div class="d-flex flex-row mt-2" style="width: 100%">
					<div class="d-flex flex-column ml-2" style="width: 100%">
						<div style="font-size: 12px; font-weight: bold;">Student ID</div>
						<div id="AccountView_RegisterSI" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX-XXX-XXX</div>

						<div style="font-size: 12px; font-weight: bold;">Username</div>
						<div id="AccountView_RegisterUsername" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX-XXX-XXX</div>

						<div style="font-size: 12px; font-weight: bold;">Email</div>
						<div id="AccountView_RegisterEmail" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX-XXX-XXX</div>
					</div>
					<div class="d-flex flex-column mr-2" style="width: 100%">
						<div style="font-size: 12px; font-weight: bold;">Date and Time Register</div>
						<div id="AccountView_RegisterDT" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX-XXX-XXX</div>

						<div style="font-size: 12px; font-weight: bold;">Expiration</div>
						<div id="AccountView_RegisterExpiration" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2 red-text">XXX-XXX-XXX</div>
					</div>
				</div>
			</div>
			<h4 class="mt-5 mb-3">Personal Information</h4>
			<div class="mb-3" style="font-size: 12px; font-weight: bold;">Before accepting an incoming New Account, you can check the On-Hold New Register Users if he/she is student of the current school.</div>

			<!-- View Student -->
			<div style="font-size: 12px; font-weight: bold;">Search Student ID</div>
			<div class="d-flex flex-row">
				<input id="AccountRegister_Searchbox" class="form-control" type="number" placeholder="e.g. 15730500">
				<button onclick="new Search().Register_SearchButton()" class="material-icons border rounded ml-1 pl-3 pr-3 white">search</button>
			</div>
			
			<div class="d-flex flex-row mt-3" style="width: 100%;">
				<img id="AccountRegister_Image" src="http://localhost/Ewallet/avatar/avatar.png" width="150px" height="150px">
				<div class="d-flex flex-column ml-4" style="width: 100%">

					<div style="font-size: 12px; font-weight: bold;">Name</div>
					<div id="AccountRegister_StudentName" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX-XXX-XXX</div>

					<div style="font-size: 12px; font-weight: bold;">Student ID</div>
					<div id="AccountRegister_StudentID" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX XXX XXX</div>

					<div style="font-size: 12px; font-weight: bold;">Course and Year</div>
					<div id="AccountRegister_StudentCY" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX XXX XXX</div>

					<div style="font-size: 12px; font-weight: bold;">Status</div>
					<div id="AccountRegister_StudentStatus" class="form-control rounded-0 border-top-0 border-left-0 border-right-0 mb-2">XXX XXX XXX</div>

				</div>
			</div>
			<!-- End of View Student -->
		</div>
	</div>
	<div class="d-flex flex-column border-left" style="min-width: 300px; height: 100%">
		<h4 class="p-2 m-0" style="font-size: 17px;">View</h4>
		<div class="d-flex flex-row border-bottom pb-1">
			<button class="form-control ml-1">Student Registry</button>
			<button class="form-control ml-1 mr-1">Account Info</button>
		</div>

		<h4 class="border-bottom p-2 m-0" style="font-size: 17px;">On-Hold New Register Account</h4>
		<div id="AccountView_RegistrationLoader" class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<!-- <div id="AccountView_RegistrationID" onclick="new Account().View_RegisterItem()" class="d-flex flex-row p-1 border-bottom" style="width: 100%; cursor: pointer;">
				<img src="http://localhost/Ewallet/avatar/avatar.png" width="50px" height="50px">
				<div class="d-flex align-items-center ml-4" style="width: 100%; font-size: 14px; font-weight: bold;">ZeroRedgrave@15730500#1</div>
			</div> -->
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var AccountView_RegistrationLoader = $("#AccountView_RegistrationLoader")

		$.ajax({
			url: window.location.href.replace("/Access", "")+ "/Account/View_RegisterLoader",
			method: 'GET',
			dataType: 'json',
			success: function(data) {
				if(!data.isError) {
					for(id of data.RegisterID) {
						AccountView_RegistrationLoader.append(`
							<div id="AccountView_RegistrationID` +id+ `" onclick="new Account().View_RegisterButton(` +id+ `)" class="d-flex flex-row p-1 border-bottom" style="width: 100%; cursor: pointer;">
								<img src="http://localhost/Ewallet/avatar/avatar.png" width="50px" height="50px">
								<div id="AccountView_RNID` +id+ `" class="d-flex align-items-center ml-4" style="width: 100%; font-size: 14px; font-weight: bold;">ZeroRedgrave@15730500#1</div>
							</div>
						`)

						new Account().View_RegisterLoad(id)
					}
				}
			},
			error: function(ex) {
		 		console.log('Error: ' + JSON.stringify(ex, null, 2))
			}
		})
	})

	function Account() {
		this.View_RegisterLoad = function(id) {
			var AccountView_RIID = $("#AccountView_RIID"+ id)
			var AccountView_RNID = $("#AccountView_RNID"+ id)

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/View_RegisterLoad?RegisterID=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) AccountView_RNID.text(data.StudentID)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_RegisterButton = function(id) {
			var AccountView_RegisterSI = $("#AccountView_RegisterSI")
			var AccountView_RegisterUsername = $("#AccountView_RegisterUsername")
			var AccountView_RegisterEmail = $("#AccountView_RegisterEmail")
			var AccountView_RegisterDT = $("#AccountView_RegisterDT")
			var AccountView_RegisterExpiration = $("#AccountView_RegisterExpiration")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/View_RegisterButton?RegisterID=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						AccountView_RegisterUsername.text(data.RegisterUsername)
						AccountView_RegisterEmail.text(data.RegisterEmail)
						AccountView_RegisterSI.text(data.RegisterSI)
						AccountView_RegisterDT.text(data.RegisterDT)

						$("#AccountRegister_Searchbox").val(data.RegisterSI)
						$("#AccountRegister_DeleteButton").attr('onclick', 'new Account().View_DeleteButton(' +id+ ')')
						$("#AccountRegister_AcceptButton").attr('onclick', 'new Account().View_AcceptButton(' +id+ ')')

						if(!data.isExpire) AccountView_RegisterExpiration.removeClass('red-text').text(data.RegisterExpire)
						else AccountView_RegisterExpiration.text(data.RegisterExpire)

						new Search().Register_SearchButton()
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!")
				}
			})
		}

		this.View_DeleteButton = function(id) {
			var AccountView_RegistrationID = $("#AccountView_RegistrationID"+ id)

			var AccountView_RegisterSI = $("#AccountView_RegisterSI")
			var AccountView_RegisterUsername = $("#AccountView_RegisterUsername")
			var AccountView_RegisterEmail = $("#AccountView_RegisterEmail")
			var AccountView_RegisterDT = $("#AccountView_RegisterDT")
			var AccountView_RegisterExpiration = $("#AccountView_RegisterExpiration")

			var AccountRegister_Searchbox = $("#AccountRegister_Searchbox")

			var AccountRegister_Image = $("#AccountRegister_Image")
			var AccountRegister_StudentID = $("#AccountRegister_StudentID")
			var AccountRegister_StudentCY = $("#AccountRegister_StudentCY")
			var AccountRegister_StudentStatus = $("#AccountRegister_StudentStatus")
			var AccountRegister_StudentName = $("#AccountRegister_StudentName")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/View_DeleteButton?RegisterID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						AccountView_RegistrationID.remove()

						AccountView_RegisterSI.text('XXX-XXX-XXX')
						AccountView_RegisterUsername.text('XXX-XXX-XXX')
						AccountView_RegisterEmail.text('XXX-XXX-XXX')
						AccountView_RegisterDT.text('XXX-XXX-XXX')
						AccountView_RegisterExpiration.text('XXX-XXX-XXX')

						AccountRegister_Searchbox.val('')

						AccountRegister_Image.text('XXX-XXX-XXX')
						AccountRegister_StudentID.text('XXX-XXX-XXX')
						AccountRegister_StudentCY.text('XXX-XXX-XXX')
						AccountRegister_StudentName.text('XXX-XXX-XXX')
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!")
				}
			})
		}

		this.View_AcceptButton = function(id) {
			var AccountView_RegistrationID = $("#AccountView_RegistrationID"+ id)

			var AccountView_RegisterSI = $("#AccountView_RegisterSI")
			var AccountView_RegisterUsername = $("#AccountView_RegisterUsername")
			var AccountView_RegisterEmail = $("#AccountView_RegisterEmail")
			var AccountView_RegisterDT = $("#AccountView_RegisterDT")
			var AccountView_RegisterExpiration = $("#AccountView_RegisterExpiration")

			var AccountRegister_Searchbox = $("#AccountRegister_Searchbox")

			var AccountRegister_Image = $("#AccountRegister_Image")
			var AccountRegister_StudentID = $("#AccountRegister_StudentID")
			var AccountRegister_StudentCY = $("#AccountRegister_StudentCY")
			var AccountRegister_StudentStatus = $("#AccountRegister_StudentStatus")
			var AccountRegister_StudentName = $("#AccountRegister_StudentName")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/View_AcceptButton?RegisterID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						AccountView_RegistrationID.remove()

						AccountView_RegisterSI.text('XXX-XXX-XXX')
						AccountView_RegisterUsername.text('XXX-XXX-XXX')
						AccountView_RegisterEmail.text('XXX-XXX-XXX')
						AccountView_RegisterDT.text('XXX-XXX-XXX')
						AccountView_RegisterExpiration.text('XXX-XXX-XXX')

						AccountRegister_Searchbox.val('')

						AccountRegister_Image.text('XXX-XXX-XXX')
						AccountRegister_StudentID.text('XXX-XXX-XXX')
						AccountRegister_StudentCY.text('XXX-XXX-XXX')
						AccountRegister_StudentName.text('XXX-XXX-XXX')
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

	function Search() {
		this.Register_SearchButton = function() {
			var AccountRegister_Searchbox = $("#AccountRegister_Searchbox")

			var AccountRegister_Image = $("#AccountRegister_Image")
			var AccountRegister_StudentID = $("#AccountRegister_StudentID")
			var AccountRegister_StudentCY = $("#AccountRegister_StudentCY")
			var AccountRegister_StudentStatus = $("#AccountRegister_StudentStatus")
			var AccountRegister_StudentName = $("#AccountRegister_StudentName")

			if(AccountRegister_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/Register_SearchButton?RegisterSI=" +AccountRegister_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							AccountRegister_Image.attr('src', window.location.href.replace("index.php/Access", "avatar/"+ data.SearchImage));
							AccountRegister_StudentID.text(data.SearchCY)
							AccountRegister_StudentCY.text(data.SearchSI)
							AccountRegister_StudentStatus.text(data.SearchStatus)
							AccountRegister_StudentName.text(data.SearchName)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					},
				})
			}
		}
	}
</script>