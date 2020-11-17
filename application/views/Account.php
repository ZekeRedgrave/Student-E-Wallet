<div id="App_AccountArea" class="d-flex flex-row hide" style="width:100%; height: 100%">
	<div id="ViewAccount_MainArea" class="d-flex flex-row" style="width: 100%; height: 100%">
		<div class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<div id="Account_HomeArea" class="d-flex flex-column p-3">
				<!-- Logs Area -->
				<h4 class="mb-5">Logs</h4>
				<table class="table">
					<thead>
						<tr>
							<th class="p-0" style="font-weight: bold; width: 50%">Name</th>
							<th class="p-0" style="font-weight: bold;">Type</th>
							<th class="p-0" style="font-weight: bold; width: 50%">Activity</th>
							<th class="p-0" style="font-weight: bold; min-width: 175px; max-width: 175px;">Timeline</th>
						</tr>
					</thead>
					<tbody id="AccountLog_ListLoader">

					</tbody>
				</table>
				<!-- End of Logs Area -->
				<div style="width: 100%"></div>
				<!-- Assessment Area -->
				<div id="" class="d-flex flex-column p-3">
					<h4 class="mb-5">Assessment</h4>

					<!-- View Student Assessment Area-->
					<div id="View_AssessmentArea" class="">
						<div class="d-flex flex-row mb-3">
							<input id="ViewAssessment_Searchbox" class="form-control" placeholder="Search Student ID">
							<button onclick="new Assessment().View_SearchButton()" class="form-control ml-1" style="min-width: 75px; max-width: 75px;">Search</button>

							<div style="width: 100%"></div>

							<button class="form-control" style="min-width: 75px; max-width: 75px;">Edit</button>
							<button onclick="new Assessment().View_AddButton()" class="form-control ml-1" style="min-width: 75px; max-width: 75px;">Add</button>
						</div>
						<div class="d-flex flex-row p-2 mb-5">
							<img id="ViewAssessment_Image" src="http://localhost/Ewallet/avatar/avatar.png" width="50px" height="50px">
							<div class="d-flex flex-column ml-4" style="width: 100%">
								<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Name</h4>
								<div id="ViewAssessment_NameLabel" class="form-control mb-2">XXX-XXX-XXX</div>

								<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Course and Year</h4>
								<div id="ViewAssessment_CYLabel" class="form-control mb-2">XXX-XXX-XXX</div>

								<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Status</h4>
								<div id="ViewAssessment_StatusLabel" class="form-control mb-2 red-text">XXX-XXX-XXX</div>
							</div>
						</div>
						<table class="table border-top">
							<thead>
								<tr>
									<th style="width: 100%">Amount</th>
									<th style="width: 100%">Remainding</th>
									<th style="min-width: 135px; max-width: 135px">Course and Year</th>
									<th style="min-width: 125px; max-width: 125px">Status</th>
									<th style="min-width: 125px; max-width: 125px">Timeline</th>
								</tr>
							</thead>
							<tbody id="ViewAssessment_TableLoad">
								<!-- <tr>
									<th style="width: 100%">P XXXX.XX</th>
									<th class="red-text" style="width: 100%">P XXXX.XX</th>
									<th style="min-width: 135px; max-width: 135px">BSIT-4</th>
									<th class="red-text" style="min-width: 125px; max-width: 125px">BALANCE</th>
									<th style="min-width: 175px; max-width: 175px">2020-01-01 00:00:00</th>
								</tr> -->
							</tbody>
						</table>
					</div>
					<!-- End of View Student Assessment Area-->
					<!-- Add Student Assessment Area -->
					<div id="Create_AssessmentArea" class="hide">
						<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
						<input id="CreateAssessment_SIbox" class="form-control mb-4" type="number" placeholder="XXX-XXX-XXX">

						<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Tuition Fee</h4>
						<input id="CreateAssessment_TFbox" class="form-control mb-4" type="number" placeholder="P XXXX.XX">

						<div style="min-width: 125px; max-width: 125px;">
							<button onclick="new Assessment().Create_DoneButton()" class="form-control mb-1">Done</button>
							<button onclick="new Assessment().Create_CancelButton()" class="form-control">Cancel</button>
						</div>
					</div>
				</div>
				<!-- End of Assessment Area -->
			</div>
			<div id="AccountRegister_StudentArea" class="d-flex flex-column hide" style="width: 100%; height: 100%">
				<div class="p-2" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">

					<h4 class="m-0 mt-2" style="">On-Hold New Register Account Information</h4>
					<div class="d-flex flex-column border rounded mt-1 p-2">
						<div class="d-flex flex-row">
							<a id="AccountRegister_BackButton" onclick="new Account().View_BackButton()" class="material-icons p-1 pl-3" style="font-size: 15px;">arrow_back_ios</a>
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
		</div>
		<div class="d-flex flex-column border-left" style="min-width: 300px; height: 100%">
			<h4 class="p-2 m-0" style="font-size: 17px;">View</h4>
			<div class="d-flex flex-row border-bottom pb-1">
				<button onclick="new Account().View_SRButton()" class="form-control ml-1">Student Registry</button>
				<button class="form-control ml-1 mr-1">Account Info</button>
			</div>

			<h4 class="border-bottom p-2 m-0" style="font-size: 17px;">On-Hold New Register Account</h4>
			<div id="AccountView_RegistrationLoader" class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;"></div>
		</div>
	</div>

	<!-- Student Registry -->
	<div id="ViewAccount_SR" class="pt-3 pb-3 hide" style="width: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="pl-3 pr-3" style="width: 100%">
			<h4 class="m-0 p-0">School Registry</h4>
			<!-- Create -->
			<div id="SR_CreateArea" class="mt-5 hide">
				<h4 class="m-0 p-0 mb-3" style="font-weight: bold; font-size: 14px;">Create New Student</h4>

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Name</h4>
				<div class="d-flex flex-row mb-2">
					<input id="SR_Lastnamebox" class="form-control m-0 mr-1" placeholder="Lastname">
					<input id="SR_Firstnamebox" class="form-control m-0" placeholder="Firstname">
					<div style="width: 100%"></div>
					<input id="SR_Middlenamebox" class="form-control m-0" placeholder="Middlename">
				</div>

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Student ID</h4>
				<input id="SR_IDbox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Gender</h4>
				<select id="SR_GenderButton" class="custom-select form-control mb-2">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Age</h4>
				<input id="SR_Agebox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Contact No. (Optional)</h4>
				<input id="SR_Numberbox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Status</h4>
				<select id="SR_StatusButton" class="custom-select mb-2">
					<option value="non-graduated">Non-Graduated / Enrolled</option>
					<option value="graduated">Graduated</option>
					<option value="not enrolled">Not Enrolled</option>
					<option value="dropped">Dropped</option>
				</select>

				<h4 class="m-0 p-0 mt-3 mb-3" style="font-weight: bold; font-size: 14px;">Course</h4>
				<input id="SR_Coursebox" class="form-control m-0 mb-2" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Level</h4>
				<input id="SR_Levelbox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<div class="d-flex flex-row">
					<button onclick="new SR().Create_DoneButton()" class="form-control mr-1" style="min-width: 125px; max-width: 125px;">Done</button>
					<button onclick="new SR().Create_CancelButton()" class="form-control" style="min-width: 125px; max-width: 125px;">Cancel</button>
				</div>
			</div>
			<!-- End of Create -->
			<!-- View -->
			<div id="SR_ViewArea" class="mt-5" style="width: 100%">
				<div class="d-flex flex-row">
					<input id="SR_ViewSDbox" class="form-control m-0" type="number" placeholder="Search Student ID">
					<button onclick="new SR().View_SearchButton()" class="form-control ml-1" style="min-width: 75px; max-width: 75px;">Search</button>
					<button onclick="new SR().View_BackButton()" class="form-control ml-1" style="min-width: 75px; max-width: 75px;">Back</button>

					<div style="width: 100%"></div>

					<button onclick="new SR().View_CreateButton()" class="form-control" style="min-width: 75px; max-width: 75px;">Add</button>
					<button onclick="new SR().View_EditButton()" class="form-control ml-1" style="min-width: 75px; max-width: 75px;">Edit</button>
				</div>
				<div class="d-flex flex-row mt-5" style="width: 100%">
					<img id="View_ImageLoad" src="" style="min-width: 150px; max-width: 150px; height: 150px">
					<div class="d-flex flex-column ml-4" style="width: 100%">
						<h4 class="m-0 p-0 mb-4" style="font-weight: bold; font-size: 14px;">Personal</h4>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Name</h4>
						<div id="View_NameLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Student ID</h4>
						<div id="View_SILabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Gender</h4>
						<div id="View_GenderLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Age</h4>
						<div id="View_AgeLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Contact Number</h4>
						<div id="View_ContactLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0 mt-3" style="font-weight: bold; font-size: 14px;">Course and Level</h4>
						<div id="View_CYLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Status</h4>
						<div id="View_StatusLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0 mt-5 mb-4" style="font-weight: bold; font-size: 14px;">Account</h4>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Email</h4>
						<div id="View_EmailLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Username</h4>
						<div id="View_UsernameLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Deposits</h4>
						<div id="View_DepositLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>

						<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Tuition Fee Left</h4>
						<div id="View_TuitionLabel" class="form-control mb-2" style="width: 100%">XXX-XXX-XXX</div>


						<button onclick="new SR().View_RemoveButton()" id="View_RemoveButton" class="form-control mt-5" style="min-width: 200px; max-width: 200px;">Delete Permanently</button>
					</div>
				</div>
			</div>
			<!-- End of View -->
			<!-- Edit -->
			<div id="SR_EditArea" class="mt-5 hide" style="width: 100%">
				<h4 class="m-0 p-0 mb-3" style="font-weight: bold; font-size: 14px;">Edit Student Info</h4>

				<div class="d-flex flex-row mb-5">
					<input id="SR_EditIDbox" class="form-control m-0 mb-2" type="number" placeholder="Search Student ID">
					<button onclick="new SR().Edit_SearchButton()" class="form-control ml-1" style="min-width: 125px; max-width: 125px;">Search</button>
				</div>

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Name</h4>
				<div class="d-flex flex-row mb-2">
					<input id="SR_EditLastnamebox" class="form-control m-0 mr-1" placeholder="Lastname">
					<input id="SR_EditFirstnamebox" class="form-control m-0" placeholder="Firstname">
					<div style="width: 100%"></div>
					<input id="SR_EditMiddlenamebox" class="form-control m-0" placeholder="Middlename">
				</div>

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Gender</h4>
				<select id="SR_EditGenderButton" class="custom-select form-control mb-2">
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Age</h4>
				<input id="SR_EditAgebox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Contact No. (Optional)</h4>
				<input id="SR_EditNumberbox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Status</h4>
				<select id="SR_EditStatusButton" class="custom-select mb-2">
					<option value="non-graduated">Non-Graduated / Enrolled</option>
					<option value="graduated">Graduated</option>
					<option value="not enrolled">Not Enrolled</option>
					<option value="dropped">Dropped</option>
				</select>

				<h4 class="m-0 p-0 mt-3 mb-3" style="font-weight: bold; font-size: 14px;">Course</h4>
				<input id="SR_EditCoursebox" class="form-control m-0 mb-2" placeholder="XXX">

				<h4 class="m-0 p-0" style="font-weight: bold; font-size: 14px;">Level</h4>
				<input id="SR_EditLevelbox" class="form-control m-0 mb-2" type="number" placeholder="XXX">

				<div class="d-flex flex-row">
					<button onclick="new SR().Edit_DoneButton()" class="form-control mr-1" style="min-width: 125px; max-width: 125px;">Done</button>
					<button onclick="new SR().Edit_CancelButton()" class="form-control" style="min-width: 125px; max-width: 125px;">Cancel</button>
				</div>
			</div>
			<!-- End of View -->
		</div>
	</div>
	<!-- End of Student Registry -->
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var AccountView_RegistrationLoader = $("#AccountView_RegistrationLoader")
		var AccountLog_ListLoader = $("#AccountLog_ListLoader")

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

		$.ajax({
			url: window.location.href.replace("/Access", "")+ "/Logs/View_LogLoader", 
			method: 'GET',
			dataType: 'json',
			success: function(data) {
				if(!data.isError) {
					if(!data.isEmpty) {
						for(var value of data.LogArray) {
							AccountLog_ListLoader.append(`
								<tr id="Log_ItemID` +value+ `" class="border-bottom">
									<th class="p-0">
										<div class="d-flex flex-row pt-1 pb-1">
											<img id="LogItem_ImageID` +value+ `" src="http://localhost/Ewallet/avatar/avatar.png" width="50px" height="50px">
											<div id="LogItem_NameID` +value+ `" class="d-flex align-items-center ml-4" style="font-weight: bold; word-break: keep-all; width: 100%">
												XXX XXX XXX
											</div>
										</div>
									</th>
									<th>
										<div id="LogItem_TypeID` +value+ `" class="d-flex align-items-center pt-1 pb-1 red-text">STUDENT</div>
									</th>
									<th>
										<div id="LogItem_ActivityID` +value+ `" class="d-flex align-items-center pt-1 pb-1">Unknown</div>
									</th>
									<th>
										<div id="LogItem_DTID` +value+ `" class="d-flex align-items-center pt-1 pb-1">2020-01-01 00:00:00</div>
									</th>
								</tr>
							`)
						}
						for(var value of data.LogArray) new Log().View_LogLoad(value)
					}
				}
				else alert(data.ErrorDisplay)
			},
			error: function(ex) {
		 		console.log('Error: ' + JSON.stringify(ex, null, 2))

		 		alert("Error: Unexpected Error Occur!")
			}
		})
	})

	function Log() {
		this.View_LogLoad = function(id) {
			var LogItem_ImageID = $("#LogItem_ImageID" + id)
			var LogItem_NameID = $("#LogItem_NameID" + id)
			var LogItem_TypeID = $("#LogItem_TypeID" + id)
			var LogItem_ActivityID = $("#LogItem_ActivityID" + id)
			var LogItem_DTID = $("#LogItem_DTID" + id)

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Logs/View_LogLoad?LogID=" + id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						LogItem_ImageID.attr('src', window.location.href.replace("/index.php/Access", "/avatar/")+ data.LogImage)
						LogItem_NameID.text(data.LogName)
						LogItem_TypeID.text(data.LogType)
						LogItem_ActivityID.text(data.LogActivity)
						LogItem_DTID.text(data.LogDT)
					}
					else console.log(data)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Log().View_LogLoad(id)
				}
			})
		}
		// this.getLogData = function() {
		// 	$.ajax({
		// 		url: window.location.href.replace("/Access", "")+ "/Logs/getLogData", 
		// 		method: 'GET',
		// 		dataType: 'json',
		// 		success: function(data) {
		// 			if(!data.isError) {
						
		// 			}
		// 			else alert(data.ErrorDisplay)
		// 		},
		// 		error: function(ex) {
		// 	 		console.log('Error: ' + JSON.stringify(ex, null, 2))
		// 		}
		// 	})
		// }
	}

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

			 		new Account().View_RegisterLoad(id)
				}
			})
		}

		this.View_RegisterButton = function(id) {
			var AccountView_RegisterSI = $("#AccountView_RegisterSI")
			var AccountView_RegisterUsername = $("#AccountView_RegisterUsername")
			var AccountView_RegisterEmail = $("#AccountView_RegisterEmail")
			var AccountView_RegisterDT = $("#AccountView_RegisterDT")
			var AccountView_RegisterExpiration = $("#AccountView_RegisterExpiration")

			var AccountRegister_StudentArea = $("#AccountRegister_StudentArea")
			var Account_HomeArea = $("#Account_HomeArea")

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

						Account_HomeArea.addClass('hide')
						AccountRegister_StudentArea.removeClass('hide')

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

		this.View_BackButton = function() {
			$("#AccountRegister_StudentArea").addClass('hide')
			$("#Account_HomeArea").removeClass('hide')
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

		this.View_SRButton = function() {
			$("#ViewAccount_SR").removeClass('hide')
			$("#ViewAccount_MainArea").addClass('hide')
		}
	}

	function SR() {
		this.View_SearchButton = function() {
			var SR_ViewSDbox = $("#SR_ViewSDbox")

			if(SR_ViewSDbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/SRView_SearchButton?ID=" +SR_ViewSDbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							$("#View_ImageLoad").attr('src', window.location.href.replace("/index.php/Access", "/avatar/" + data.Image))
							$("#View_NameLabel").text(data.Name)
							$("#View_SILabel").text(data.StudentID)
							$("#View_GenderLabel").text(data.Gender)
							$("#View_AgeLabel").text(data.Age)
							$("#View_ContactLabel").text(data.Contact)
							$("#View_CYLabel").text(data.CY)
							$("#View_StatusLabel").text(data.Status)

							$("#View_EmailLabel").text(data.Email)
							$("#View_UsernameLabel").text(data.Username)
							$("#View_DepositLabel").text(data.Deposits)
							$("#View_TuitionLabel").text(data.Tuition)


							$("#View_RemoveButton").attr('onclick', 'new SR().View_RemoveButton(' +SR_ViewSDbox.val()+ ')')
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Please Enter the Sudent ID First!")
		}

		this.View_RemoveButton = function(id) {
			if(id != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/SRView_RemoveButton?ID="+ id, 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							$("#View_ImageLoad").attr('src', '')
							$("#View_NameLabel").text('')
							$("#View_SILabel").text('')
							$("#View_GenderLabel").text('')
							$("#View_AgeLabel").text('')
							$("#View_ContactLabel").text('')
							$("#View_CYLabel").text('')
							$("#View_StatusLabel").text('')

							$("#View_EmailLabel").text('')
							$("#View_UsernameLabel").text('')
							$("#View_DepositLabel").text('')
							$("#View_TuitionLabel").text('')


							$("#View_RemoveButton").attr('onclick', 'new SR().View_RemoveButton()')
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
		}

		this.View_BackButton = function() {
			$("#ViewAccount_SR").addClass('hide')
			$("#ViewAccount_MainArea").removeClass('hide')
		}

		this.View_CreateButton = function() {
			$("#SR_ViewArea").addClass('hide')
			$("#SR_CreateArea").removeClass('hide')
		}

		this.Create_DoneButton = function() {
			var SR_Lastnamebox = $("#SR_Lastnamebox")
			var SR_Firstnamebox = $("#SR_Firstnamebox")
			var SR_Middlenamebox = $("#SR_Middlenamebox")

			var SR_GenderButton = $("#SR_GenderButton option:selected")

			var SR_Agebox = $("#SR_Agebox")
			var SR_Numberbox = $("#SR_Numberbox")

			var SR_StatusButton = $("#SR_StatusButton option:selected")

			var SR_Coursebox = $("#SR_Coursebox")
			var SR_Levelbox = $("#SR_Levelbox")

			var SR_IDbox = $("#SR_IDbox")

			if(SR_Lastnamebox.val() != "" && SR_Firstnamebox.val() != "" && SR_Middlenamebox.val() != "" && SR_Agebox.val() != "" && SR_Numberbox.val() != "" && SR_Coursebox.val() != "" && SR_Levelbox.val() != "" && SR_IDbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/SRCreate_DoneButton", 
					method: 'POST',
					data: {
				 		Lastname: SR_Lastnamebox.val(),
				 		Firstname: SR_Firstnamebox.val(),
				 		Middlename: SR_Middlenamebox.val(),

				 		Gender: SR_GenderButton.val(),

				 		Age: SR_Agebox.val(),
				 		Contact: SR_Numberbox.val(),

				 		Status: SR_StatusButton.val(),

				 		Course: SR_Coursebox.val(),
				 		Level: SR_Levelbox.val(),

				 		ID: SR_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) new SR().Create_CancelButton()
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else {
				var ErrorDisplay = "Error: "

				if(SR_Lastnamebox.val() == "") ErrorDisplay += "(Lastname) "
				if(SR_Firstnamebox.val() == "") ErrorDisplay += "(Firstname) "
				if(SR_Middlenamebox.val() == "") ErrorDisplay += "(Middlename) "

				if(SR_Agebox.val() == "") ErrorDisplay += "(Age) "
				if(SR_Numberbox.val() == "") ErrorDisplay += "(Contact No.) "

				if(SR_Coursebox.val() == "") ErrorDisplay += "(Course) "
				if(SR_Levelbox.val() == "") ErrorDisplay += "(Level) "

				if(SR_IDbox.val() == "") ErrorDisplay += "(Student ID) "

				alert(ErrorDisplay + "is Empty!")

				ErrorDisplay = ""
			}
		}

		this.Create_CancelButton = function() {
			$("#SR_Lastnamebox").val('')
			$("#SR_Firstnamebox").val('')
			$("#SR_Middlenamebox").val('')

			$("#SR_Agebox").val('')
			$("#SR_Numberbox").val('')

			$("#SR_Coursebox").val('')
			$("#SR_Levelbox").val('')

			$("#SR_CreateArea").addClass('hide')
			$("#SR_ViewArea").removeClass('hide')
		}

		this.View_EditButton = function() {
			$("#SR_ViewArea").addClass('hide')
			$("#SR_EditArea").removeClass('hide')
		}

		this.Edit_SearchButton = function() {
			var SR_EditIDbox = $("#SR_EditIDbox")

			if(SR_EditIDbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/SREdit_SearchButton?ID="+ SR_EditIDbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							var Name = JSON.parse(data.Name)

							$("#SR_EditLastnamebox").val(Name.Lastname)
							$("#SR_EditFirstnamebox").val(Name.Firstname)
							$("#SR_EditMiddlenamebox").val(Name.Middlename)

							$("#SR_EditGenderButton option:selected").val(data.Gender)

							$("#SR_EditAgebox").val(data.Age)
							$("#SR_EditNumberbox").val(data.	ContactNumber)

							$("#SR_EditStatusButton option:selected").val(data.Status)

							$("#SR_EditCoursebox").val(data.Course)
							$("#SR_EditLevelbox").val(data.Level)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		console.log("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Search ID is Empty!")
		}

		this.Edit_DoneButton = function() {
			var SR_Lastnamebox = $("#SR_EditLastnamebox")
			var SR_Firstnamebox = $("#SR_EditFirstnamebox")
			var SR_Middlenamebox = $("#SR_EditMiddlenamebox")

			var SR_GenderButton = $("#SR_EditGenderButton option:selected")

			var SR_Agebox = $("#SR_EditAgebox")
			var SR_Numberbox = $("#SR_EditNumberbox")

			var SR_StatusButton = $("#SR_EditStatusButton option:selected")

			var SR_Coursebox = $("#SR_EditCoursebox")
			var SR_Levelbox = $("#SR_EditLevelbox")

			var SR_IDbox = $("#SR_EditIDbox")

			if(SR_Lastnamebox.val() != "" && SR_Firstnamebox.val() != "" && SR_Middlenamebox.val() != "" && SR_Agebox.val() != "" && SR_Numberbox.val() != "" && SR_Coursebox.val() != "" && SR_Levelbox.val() != "" && SR_IDbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/SREdit_DoneButton", 
					method: 'POST',
					data: {
				 		Lastname: SR_Lastnamebox.val(),
				 		Firstname: SR_Firstnamebox.val(),
				 		Middlename: SR_Middlenamebox.val(),

				 		Gender: SR_GenderButton.val(),

				 		Age: SR_Agebox.val(),
				 		Contact: SR_Numberbox.val(),

				 		Status: SR_StatusButton.val(),

				 		Course: SR_Coursebox.val(),
				 		Level: SR_Levelbox.val(),

				 		ID: SR_IDbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) new SR().Edit_CancelButton()
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else {
				var ErrorDisplay = "Error: "

				if(SR_Lastnamebox.val() == "") ErrorDisplay += "(Lastname) "
				if(SR_Firstnamebox.val() == "") ErrorDisplay += "(Firstname) "
				if(SR_Middlenamebox.val() == "") ErrorDisplay += "(Middlename) "

				if(SR_Agebox.val() == "") ErrorDisplay += "(Age) "
				if(SR_Numberbox.val() == "") ErrorDisplay += "(Contact No.) "

				if(SR_Coursebox.val() == "") ErrorDisplay += "(Course) "
				if(SR_Levelbox.val() == "") ErrorDisplay += "(Level) "

				if(SR_IDbox.val() == "") ErrorDisplay += "(Student ID) "

				alert(ErrorDisplay + "is Empty!")

				ErrorDisplay = ""
			}
		}

		this.Edit_CancelButton = function() {
			$("#SR_EditLastnamebox").val('')
			$("#SR_EditFirstnamebox").val('')
			$("#SR_EditMiddlenamebox").val('')

			$("#SR_EditAgebox").val('')
			$("#SR_EditNumberbox").val('')

			$("#SR_EditCoursebox").val('')
			$("#SR_EditLevelbox").val('')

			$("#SR_EditArea").addClass('hide')
			$("#SR_ViewArea").removeClass('hide')
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

	function Assessment() {
		this.View_SearchButton = function() {
			var ViewAssessment_Searchbox = $("#ViewAssessment_Searchbox")
			var ViewAssessment_Image = $("#ViewAssessment_Image")
			var ViewAssessment_NameLabel = $("#ViewAssessment_NameLabel")
			var ViewAssessment_CYLabel = $("#ViewAssessment_CYLabel")
			var ViewAssessment_StatusLabel = $("#ViewAssessment_StatusLabel")

			if(ViewAssessment_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/ViewAssessment_SearchButton?id=" +ViewAssessment_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							ViewAssessment_Image.attr('src', window.location.href.replace("/index.php/Access", "/")+ "avatar/" + data.Image)
							ViewAssessment_NameLabel.text(data.Name)
							ViewAssessment_CYLabel.text(data.CY)
							ViewAssessment_StatusLabel.text(data.Status)

							new Assessment().View_TableLoad(ViewAssessment_Searchbox.val())
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Error: Student ID's Searchbox is Emtpy!")
		}

		this.View_TableLoad = function(id) {
			var ViewAssessment_TableLoad = $("#ViewAssessment_TableLoad")

			// $.ajax({
			// 	url: window.location.href.replace("/Access", "")+ "/Account/View_TableLoad?id=" +id, 
			// 	method: 'POST',
			// 	dataType: 'json',
			// 	success: function(data) {
					
			// 	},
			// 	error: function(ex) {
			//  		console.log('Error: ' + JSON.stringify(ex, null, 2))
			// 	}
			// })
		}

		this.View_AddButton = function() {
			$("#Create_AssessmentArea").removeClass('hide')
			$("#View_AssessmentArea").addClass('hide')
		}

		this.Create_DoneButton = function() {
			var Create_AssessmentArea = $("#Create_AssessmentArea")
			var CreateAssessment_SIbox = $("#CreateAssessment_SIbox")
			var CreateAssessment_TFbox = $("#CreateAssessment_TFbox")

			var View_AssessmentArea = $("#View_AssessmentArea")

			if(CreateAssessment_SIbox.val() != "" && CreateAssessment_TFbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/CreateAssessment_DoneButton", 
					method: 'POST',
					data: {
				 		StudentID: CreateAssessment_SIbox.val(),
				 		TuitionFee: CreateAssessment_TFbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							CreateAssessment_SIbox.val('')
							CreateAssessment_TFbox.val('')

							Create_AssessmentArea.addClass('hide')
							View_AssessmentArea.removeClass('hide')
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

				if(CreateAssessment_SIbox.val() == "") ErrorDisplay += "(Student ID) "
				if(CreateAssessment_TFbox.val() == "") ErrorDisplay += "(Tuition Fee) "

				alert(ErrorDisplay+ "is Empty!")

				ErrorDisplay = ""
			}
		}

		this.Create_CancelButton = function() {
			$("#View_AssessmentArea").removeClass('hide')
			$("#Create_AssessmentArea").addClass('hide')
		}
	}
</script>