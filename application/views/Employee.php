<div id="App_EmployeeArea" class="d-flex flex-column hide companyLabel" style="width:100%; height: 100%">
	<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 shadow-sm" style="width: 100%; font-weight: bold;">
		<div class="d-flex align-items-center" style="width: 100%">EMPLOYEE ACCOUNT</div>
		<div class="d-flex flex-row" style="width: 100%">
				<input id="EmployeeView_Searchbox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1 companyInput" style="width: 100%;" placeholder="Search Employee ID Only!">
				<button onclick="new Employee().View_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-4" style="width: 125px; font-size: 14px; font-weight: bold;">Search</button>
			</div>
	</div>
	<div id="Employee_ViewArea" class="d-flex justify-content-center pt-4 pb-4" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="d-flex flex-row mb-4">
			<div>
				<div class="ml-2" style="width: 100%; font-weight: bold; ">EMPLOYEE INFORMATION</div>
				<div class="d-flex flex-row p-4 mb-1" style="width: 600px;">
					<div>
						<img id="EmployeeView_ImageLoad" class="rounded-circle companyBackground" width="125px" height="125px">
					</div>
					<div class="ml-4" style="width: 100%">
						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name</h6>
						<div id="EmployeeView_NameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

						<div class="d-flex flex-row mt-4 mb-4">
							<div style="width: 100%;">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Age</h6>
								<div id="EmployeeView_AgeLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>
							</div>
							<div class="ml-2" style="width: 100%;">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Gender</h6>
								<div id="EmployeeView_GenderLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>
							</div>
						</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Contact Number</h6>
						<div id="EmployeeView_NumberLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>
					</div>
				</div>

				<div class="ml-2 mt-5 mb-4" style="width: 100%; font-weight: bold; ">COMPANY INFORMATION</div>
				<div>
					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Company Name(Display N /A if 3rd Party Account)</h6>
					<div id="EmployeeView_CNLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Company Business ID / Licence(Display N /A if 3rd Party Account)</h6>
					<div id="EmployeeView_CBLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Company Position</h6>
					<div id="EmployeeView_CPLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Company Department</h6>
					<div id="EmployeeView_CDLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Company Employee ID</h6>
					<div id="EmployeeView_CILabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Company Status</h6>
					<div id="EmployeeView_CSLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>
				</div>

				<div style="min-height: 100px; max-height: 100px;"></div>
			</div>

			<div class="ml-4">
				<div class="ml-2" style="width: 100%; font-weight: bold; ">EMPLOYEE LOGS</div>
				<div id="EmployeeView_LogLoad" style="width: 100%; height: 92.75%; overflow: hidden; overflow-y: scroll;">

					<!-- <div class="d-flex flex-row pt-2 pb-2 pl-3 pr-3 border-bottom" title="Timeline" style="cursor: zoom-in;">
						<div>
							<img class="rounded-circle" src="http://localhost/Ewallet/avatar/avatar.png" width="50px" height="50px">
						</div>
						<div class="ml-3">
							<div style="font-weight: bold;">Name</div>
							<div style="margin-top: -5px; font-weight: bold; font-size: 12px;">Type - Activity</div>
						</div>
					</div> -->

					<h4 class="d-flex justify-content-center align-items-center p-4" style="height: 100%; word-break: break-all;">
						<div style="min-width: 200px; max-width: 200px;">
							The Log Box is Full of Nothing but Darkness and Emptiness!
						</div>
					</h4>

				</div>

				<div class="mt-4 ml-2" style="width: 100%; font-weight: bold; ">EMPLOYEE ACCOUNT</div>
				<div class="p-4">
					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Username</h6>
					<div id="EmployeeView_UsernameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Type</h6>
					<div id="EmployeeView_TypeLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Email</h6>
					<div id="EmployeeView_EmailLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4 companyInput" style="width: 100%">XXX-XXX-XXX</div>

					<div class="d-flex flex-row" style="">
						<button onclick="new Employee().View_EditButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Edit</button>
						<button onclick="new Employee().View_DeleteButton()" id="EmployeeView_DeleteButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 red" title="Input the Employee ID First on Searchbox Before Deleting the Employee Account Permanently" style="width: 200px;">Delete Permanently</button>
					</div>
				</div>

				<div style="min-height: 100px; max-height: 100px;"></div>
			</div>
		</div>
	</div>

	<!-- <div class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="ml-2 pt-4 pb-4" style="width: 100%; font-weight: bold; ">LIST OF EMPLOYEE</div>

		<div>
			<div class="pb-1 pl-4 pr-4 border-bottom" style="">DEPARTMENT</div>

			<div class="container mb-2">
				<div class="row pt-2">
					<div class="companyBackground" style="min-width: 250px; max-width: 250px; height: 375px; overflow-y: hidden;">
						<div class="d-flex justify-content-center" style="width: 100%">
							<img src="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
</div>

<div id="Employee_EditArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%">
		<div class="p-5 companyLabel" style="width: 100%">
			<div class="d-flex flex-column rounded p-3" style="background: white !important">
				<div class="p-0 ml-2 mb-4" style="min-width: 125px; font-weight: bold;">EDIT EMPLOYEE INFORMATION</div>

				<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Name</h4>
				<div class="d-flex flex-row mb-4">
					<input id="EmployeeEdit_Lastnamebox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1 companyInput" style="width: 100%;" placeholder="Lastname">
					<input id="EmployeeEdit_Firstnamebox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-2 companyInput" style="width: 100%;" placeholder="Firstname">
					<input id="EmployeeEdit_Middlenamebox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 ml-2 companyInput" style="width: 100%;" placeholder="Middlename">
				</div>

				<div class="d-flex flex-row" style="width: 100%">
					<div style="width: 25%">
						<div class="d-flex justify-content-center mt-4 mb-4">
							<img id="EmployeeEdit_ImageLoad" class="rounded-circle companyBackground" width="125px" height="125px">
						</div>

						<div class="d-flex flex-row mt-4 mb-4">
							<div style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Age</h4>
								<input id="EmployeeEdit_Agebox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1 companyInput" style="width: 100%; height: 40px;" placeholder="Ex. 99">
							</div>
							<div class="ml-1" style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Gender</h4>
								<select id="EmployeeEdit_GenderButton" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%; height: 40px;">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>

						<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Contact No</h4>
						<input id="EmployeeEdit_Numberbox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1 companyInput" style="width: 100%;" placeholder="Ex. 99">
					</div>
					<div class="ml-4 pl-4 pr-4 border rounded" style="width: 75%">
						<div class="d-flex flex-row mt-4 mb-4">
							<div style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Company Name(Only 3rd Party) <span id="warning1" class="red-text">Disabled</span></h4>
								<input id="EmployeeEdit_CNbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 companyInput" disabled style="width: 100%;" placeholder="Ex. Director of IT Department">
							</div>
							<div class="ml-1" style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Company Business ID / Licence(Only 3rd Party) <span id="warning2" class="red-text">Disabled</span></h4>
								<input id="EmployeeEdit_CBbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 companyInput" disabled style="width: 100%;" placeholder="Ex. IT Department, Cashier, Record, ....">
							</div>
						</div>

						<div class="p-0 ml-2 mt-4" style="min-width: 125px; font-weight: bold;">SELECT PARTY INVOLVED</div>
						<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 mb-4" style="width: 100%">
							<div onclick="new Employee().Edit_SchoolRadio()" class="d-flex flex-row" style="width: 25%; cursor: pointer;">
								<div>
									<input id="EmployeeEdit_SchoolRadio" type="radio" name="" checked="checked" style="min-width: 25px; max-width: 25px;">
								</div>
								<div style="min-width: 125px; max-width: 125px;">School Only</div>
							</div>
							<div id="_Create_OtherArea" onclick="new Employee().Edit_OtherRadio()" class="d-flex flex-row" style="width: 25%; cursor: pointer;">
								<div>
									<input id="EmployeeEdit_OtherRadio" type="radio" name="" style="min-width: 25px; max-width: 25px;">
								</div>
								<div style="min-width: 125px; max-width: 125px;">3rd Party Only</div>
							</div>
							<div style="width: 100%"></div>
						</div>

						<div class="d-flex flex-row mt-4 mb-4">
							<div style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Company Position</h4>
								<input id="EmployeeEdit_CPbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 companyInput" style="width: 100%;" placeholder="Ex. Director of IT Department">
							</div>
							<div class="ml-1" style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Company Department</h4>
								<input id="EmployeeEdit_CDbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 companyInput" style="width: 100%;" placeholder="Ex. IT Department, Cashier, Record, ....">
							</div>
						</div>

						<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Company Employee ID</h4>
						<input id="EmployeeEdit_CIbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mb-4 companyInput" style="width: 100%;" placeholder="Ex. IT Department, Cashier, Record, ....">

						<div class="d-flex flex-row mb-4">
							<input id="EmployeeEdit_isRetiredbox" type="checkbox" style="width: 50px;">
							<h4 class="ml-2 mb-1 p-0" style="width: 100%; font-size: 14px; font-weight: bold;">is Employee Retired or Resign Already?</h4>
						</div>

					</div>
				</div>

				<div class="d-flex justify-content-end mt-4">
					<div class="d-flex flex-row">
						<button onclick="new Employee().Edit_DoneButton()" id="EmployeeEdit_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1 companyBackground" style=" width: 100px;">Done</button>
						<button onclick="new Employee().Edit_CancelButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1 red" style="width: 100px;">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#EmployeeView_ImageLoad, #EmployeeEdit_ImageLoad").attr('src', window.location.href.replace("index.php/Access", "avatar/avatar.png"))
	})

	function Employee() {
		this.View_SearchButton = function() {
			var EmployeeView_Searchbox = $("#EmployeeView_Searchbox")

			var EmployeeView_ImageLoad = $("#EmployeeView_ImageLoad")
			var EmployeeView_NameLabel = $("#EmployeeView_NameLabel")
			var EmployeeView_AgeLabel = $("#EmployeeView_AgeLabel")
			var EmployeeView_GenderLabel = $("#EmployeeView_GenderLabel")
			var EmployeeView_NumberLabel = $("#EmployeeView_NumberLabel")

			var EmployeeView_CNLabel = $("#EmployeeView_CNLabel")
			var EmployeeView_CBLabel = $("#EmployeeView_CBLabel")
			var EmployeeView_CPLabel = $("#EmployeeView_CPLabel")
			var EmployeeView_CDLabel = $("#EmployeeView_CDLabel")
			var EmployeeView_CILabel = $("#EmployeeView_CILabel")
			var EmployeeView_CSLabel = $("#EmployeeView_CSLabel")

			var EmployeeView_UsernameLabel = $("#EmployeeView_UsernameLabel")
			var EmployeeView_TypeLabel = $("#EmployeeView_TypeLabel")
			var EmployeeView_EmailLabel = $("#EmployeeView_EmailLabel")

			var EmployeeView_LogLoad = $("#EmployeeView_LogLoad")

			if(EmployeeView_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("Access", "")+ "Account/EmployeeView_SearchButton?id="+ EmployeeView_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EmployeeView_ImageLoad.attr('src', window.location.href.replace("index.php/Access", "avatar/")+ data.Image)
							EmployeeView_NameLabel.text(data.Name)
							EmployeeView_AgeLabel.text(data.Age)
							EmployeeView_GenderLabel.text(data.Gender)
							EmployeeView_NumberLabel.text(data.Number)

							EmployeeView_CNLabel.text(data.Company)
							EmployeeView_CBLabel.text(data.Licence)
							EmployeeView_CPLabel.text(data.Position)
							EmployeeView_CDLabel.text(data.Department)
							EmployeeView_CILabel.text(data.ID)
							if(data.Status == "Retired") EmployeeView_CSLabel.text(data.Status).addClass('red-text')
							else EmployeeView_CSLabel.text(data.Status).removeClass('red-text')

							EmployeeView_UsernameLabel.text(data.Username)
							EmployeeView_TypeLabel.text(data.Type)
							EmployeeView_EmailLabel.text(data.Email)

							if(!data.isEmpty) {
								EmployeeView_LogLoad.html('')

								for(var x in data.LogArray) {
									EmployeeView_LogLoad.append(`
										<div class="d-flex flex-row pt-2 pb-2 pl-3 pr-3 border-bottom" title="Timeline" style="cursor: zoom-in;">
											<div>
												<img class="rounded-circle" src="` +(window.location.href.replace("index.php/Access", "avatar/")+ data.LogArray[x].Image)+ `" width="50px" height="50px">
											</div>
											<div class="ml-3">
												<div style="font-weight: bold;">` +data.LogArray[x].Name+ `</div>
												<div style="margin-top: -5px; font-weight: bold; font-size: 12px;">` +data.LogArray[x].Type+ ` - ` +data.LogArray[x].Activity+ `</div>
											</div>
										</div>
									`)
								}
							}
							else EmployeeView_LogLoad.html(`
								<h4 class="d-flex justify-content-center align-items-center p-4" style="height: 100%; word-break: break-all;">
									<div style="min-width: 200px; max-width: 200px;">
										The Log Box is Full of Nothing but Darkness and Emptiness!
									</div>
								</h4>
							`)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Unexpected Error Occur!")
					}
				})
			}
			else alert("Search Employee ID is Empty!")
		}

		this.View_EditButton = function() {
			if($("#EmployeeView_Searchbox").val() != "") {
				new Employee().Edit_SearchButton()

				$("#Employee_EditArea").removeClass('hide')
			}
			else alert("Input Search ID First Before Clicking the Edit Button")
		}

		this.View_DeleteButton = function() {
			var EmployeeView_Searchbox = $("#EmployeeView_Searchbox")
			var EmployeeView_DeleteButton = $("#EmployeeView_DeleteButton")

			if(EmployeeView_Searchbox.val() != "") {
				EmployeeView_DeleteButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("Access", "")+ "Account/EmployeeView_DeleteButton?id="+ EmployeeView_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EmployeeView_DeleteButton.removeAttr('disabled')

							new Employee().View_ClearButton()
						}
						else {
							alert(data.ErrorDisplay)

							EmployeeView_DeleteButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Unexpected Error Occur!")

				 		EmployeeView_DeleteButton.removeAttr('disabled')
					}
				})
			}
			else alert("Search Employee ID is Empty!")
		}

		this.View_ClearButton = function() {
			$("#EmployeeView_Searchbox").val('')
			$("#EmployeeView_ImageLoad").attr('src', window.location.href.replace("index.php/Access", "avatar/")+ "avatar.png")

			$("#EmployeeView_NameLabel").text('XXX-XXX-XXX')

			$("#EmployeeView_AgeLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_GenderLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_NumberLabel").text('XXX-XXX-XXX')

			$("#EmployeeView_CPLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_CDLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_CNLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_CBLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_CILabel").text('XXX-XXX-XXX')
			$("#EmployeeView_StatusLabel").text('XXX-XXX-XXX')

			$("#EmployeeView_UsernameLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_TypeLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_EmailLabel").text('XXX-XXX-XXX')
		}

		this.Edit_CancelButton = function() {
			$("#Employee_EditArea").addClass('hide')

			$("#EmployeeEdit_Searchbox").val('')

			$("#EmployeeEdit_Lastnamebox").val('')
			$("#EmployeeEdit_Firstnamebox").val('')
			$("#EmployeeEdit_Middlenamebox").val('')

			$("#EmployeeEdit_Agebox").val('')

			$("#EmployeeEdit_Numberbox").val('')

			$("#EmployeeEdit_CPbox").val('')
			$("#EmployeeEdit_CDbox").val('')
		}

		this.Edit_SearchButton = function() {
			var EmployeeView_Searchbox = $("#EmployeeView_Searchbox")

			var EmployeeEdit_ImageLoad = $("#EmployeeEdit_ImageLoad")

			var EmployeeEdit_Lastnamebox = $("#EmployeeEdit_Lastnamebox")
			var EmployeeEdit_Firstnamebox = $("#EmployeeEdit_Firstnamebox")
			var EmployeeEdit_Middlenamebox = $("#EmployeeEdit_Middlenamebox")

			var EmployeeEdit_Agebox = $("#EmployeeEdit_Agebox")
			var EmployeeEdit_GenderButton = $("#EmployeeEdit_GenderButton")
			var EmployeeEdit_Numberbox = $("#EmployeeEdit_Numberbox")

			var EmployeeEdit_SchoolRadio = $("#EmployeeEdit_SchoolRadio")
			var EmployeeEdit_OtherRadio = $("#EmployeeEdit_OtherRadio")

			var EmployeeEdit_CNbox = $("#EmployeeEdit_CNbox")
			var EmployeeEdit_CBbox = $("#EmployeeEdit_CBbox")
			var EmployeeEdit_CPbox = $("#EmployeeEdit_CPbox")
			var EmployeeEdit_CDbox = $("#EmployeeEdit_CDbox")
			var EmployeeEdit_CIbox = $("#EmployeeEdit_CIbox")

			var EmployeeEdit_isRetiredbox = $("#EmployeeEdit_isRetiredbox")

			var warning1 = $("#warning1")
			var warning2 = $("#warning2")

			if(EmployeeView_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("Access", "")+ "Account/EmployeeEdit_SearchButton?id="+ EmployeeView_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EmployeeEdit_Lastnamebox.val(data.Name.Lastname)
							EmployeeEdit_Firstnamebox.val(data.Name.Firstname)
							EmployeeEdit_Middlenamebox.val(data.Name.Middlename)

							EmployeeEdit_ImageLoad.attr('src', window.location.href.replace("index.php/Access", "avatar/") + data.Image)
							EmployeeEdit_Agebox.val(data.Age)
							EmployeeEdit_GenderButton.val(data.Gender)
							EmployeeEdit_Numberbox.val(data.Number)

							if(data.PartyInvolved != "3RD-PARTY") {
								EmployeeEdit_SchoolRadio.attr('checked', 'checked')
								EmployeeEdit_SchoolRadio.prop('checked', true)

								EmployeeEdit_OtherRadio.removeAttr('checked')
								EmployeeEdit_OtherRadio.prop('checked', false)

								EmployeeEdit_CNbox.attr('disabled', 'disabled')
								EmployeeEdit_CBbox.attr('disabled', 'disabled')

								warning1.text('Disabled')
								warning2.text('Disabled')
							}
							else {
								EmployeeEdit_SchoolRadio.removeAttr('checked')
								EmployeeEdit_SchoolRadio.prop('checked', false)

								EmployeeEdit_OtherRadio.attr('checked', 'checked')
								EmployeeEdit_OtherRadio.prop('checked', true)

								EmployeeEdit_CNbox.removeAttr('disabled')
								EmployeeEdit_CBbox.removeAttr('disabled')

								warning1.text('')
								warning2.text('')
							}

							EmployeeEdit_CNbox.val(data.Company)
							EmployeeEdit_CBbox.val(data.Licence)
							EmployeeEdit_CPbox.val(data.Position)
							EmployeeEdit_CDbox.val(data.Department)
							EmployeeEdit_CIbox.val(data.ID)

							if(data.isRetired == true) EmployeeEdit_isRetiredbox.attr('checked', 'checked')
							else EmployeeEdit_isRetiredbox.removeAttr('checked')
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Unexpected Error Occur!")
					}
				})
			}
			else alert("Search Employee ID is Empty!")
		}

		this.Edit_SchoolRadio = function() {
			var EmployeeEdit_SchoolRadio = $("#EmployeeEdit_SchoolRadio")
			var EmployeeEdit_OtherRadio = $("#EmployeeEdit_OtherRadio")
			var EmployeeEdit_CNbox = $("#EmployeeEdit_CNbox")
			var EmployeeEdit_CBbox = $("#EmployeeEdit_CBbox")

			EmployeeEdit_SchoolRadio.attr('checked', 'checked')
			EmployeeEdit_SchoolRadio.prop('checked', true)

			EmployeeEdit_OtherRadio.removeAttr('checked')
			EmployeeEdit_OtherRadio.prop('checked', false)

			EmployeeEdit_CNbox.attr('disabled', 'disabled')
			EmployeeEdit_CBbox.attr('disabled', 'disabled')

			$("#warning1").text('Disabled')
			$("#warning2").text('Disabled')
		}

		this.Edit_OtherRadio = function() {
			var EmployeeEdit_SchoolRadio = $("#EmployeeEdit_SchoolRadio")
			var EmployeeEdit_OtherRadio = $("#EmployeeEdit_OtherRadio")
			var EmployeeEdit_CNbox = $("#EmployeeEdit_CNbox")
			var EmployeeEdit_CBbox = $("#EmployeeEdit_CBbox")

			EmployeeEdit_SchoolRadio.removeAttr('checked')
			EmployeeEdit_SchoolRadio.prop('checked', false)

			EmployeeEdit_OtherRadio.attr('checked', 'checked')
			EmployeeEdit_OtherRadio.prop('checked', true)

			EmployeeEdit_CNbox.removeAttr('disabled')
			EmployeeEdit_CBbox.removeAttr('disabled')

			$("#warning1").text('')
			$("#warning2").text('')
		}

		this.Edit_DoneButton = function() {
			var EmployeeView_Searchbox = $("#EmployeeView_Searchbox")

			var EmployeeEdit_Lastnamebox = $("#EmployeeEdit_Lastnamebox")
			var EmployeeEdit_Firstnamebox = $("#EmployeeEdit_Firstnamebox")
			var EmployeeEdit_Middlenamebox = $("#EmployeeEdit_Middlenamebox")

			var EmployeeEdit_Agebox = $("#EmployeeEdit_Agebox")
			var EmployeeEdit_GenderButton = $("#EmployeeEdit_GenderButton option:selected")
			var EmployeeEdit_Numberbox = $("#EmployeeEdit_Numberbox")

			var EmployeeEdit_SchoolRadio = $("#EmployeeEdit_SchoolRadio")
			var EmployeeEdit_OtherRadio = $("#EmployeeEdit_OtherRadio")

			var EmployeeEdit_CNbox = $("#EmployeeEdit_CNbox")
			var EmployeeEdit_CBbox = $("#EmployeeEdit_CBbox")
			var EmployeeEdit_CPbox = $("#EmployeeEdit_CPbox")
			var EmployeeEdit_CDbox = $("#EmployeeEdit_CDbox")
			var EmployeeEdit_CIbox = $("#EmployeeEdit_CIbox")

			var EmployeeEdit_isRetiredbox = $("#EmployeeEdit_isRetiredbox")

			var EmployeeEdit_DoneButton = $("#EmployeeEdit_DoneButton")

			if(EmployeeView_Searchbox.val() != "" && EmployeeEdit_Lastnamebox.val() != "" && EmployeeEdit_Firstnamebox.val() != "" && EmployeeEdit_Middlenamebox.val() != "" && EmployeeEdit_Agebox.val() != "" && EmployeeEdit_CPbox.val() != "" && EmployeeEdit_CDbox.val() != "" && EmployeeEdit_CIbox.val() != "") {
				var data = {}
				var gate = false

				if(EmployeeEdit_SchoolRadio.is(':checked') == true) {
					data = {
						EmployeeID: EmployeeView_Searchbox.val(),

					 	Lastname: EmployeeEdit_Lastnamebox.val(),
					 	Firstname: EmployeeEdit_Firstnamebox.val(),
					 	Middlename: EmployeeEdit_Middlenamebox.val(),

					 	Age: EmployeeEdit_Agebox.val(),
					 	Gender: EmployeeEdit_GenderButton.val(),
					 	Number: EmployeeEdit_Numberbox.val(),

					 	Position: EmployeeEdit_CPbox.val(),
					 	Department: EmployeeEdit_CDbox.val(),
					 	ID: EmployeeEdit_CIbox.val(),

					 	PartyInvolved: "SCHOOL",

					 	isRetired: EmployeeEdit_isRetiredbox.is(':checked')
					}

					gate = true
				}
				else if(EmployeeEdit_OtherRadio.is(':checked') == true) {
					if(EmployeeEdit_CNbox.val() != "" && EmployeeEdit_CBbox.val() != "") {
						data = {
							EmployeeID: EmployeeView_Searchbox.val(),

						 	Lastname: EmployeeEdit_Lastnamebox.val(),
						 	Firstname: EmployeeEdit_Firstnamebox.val(),
						 	Middlename: EmployeeEdit_Middlenamebox.val(),

						 	Age: EmployeeEdit_Agebox.val(),
						 	Gender: EmployeeEdit_GenderButton.val(),
						 	Number: EmployeeEdit_Numberbox.val(),

						 	Company: EmployeeEdit_CNbox.val(),
						 	Licence: EmployeeEdit_CNbox.val(),
						 	Position: EmployeeEdit_CPbox.val(),
						 	Department: EmployeeEdit_CDbox.val(),
						 	ID: EmployeeEdit_CIbox.val(),

						 	PartyInvolved: "3RD-PARTY",

						 	isRetired: EmployeeEdit_isRetiredbox.is(':checked')
						}

						gate = true
					}
					else {
						var ErrorDisplay = ""

						if(EmployeeEdit_CNbox.val() == "") ErrorDisplay += "(Company Name) "
						if(EmployeeEdit_CBbox.val() == "") ErrorDisplay += "(Company Business ID / Licence) "

						alert(ErrorDisplay +"is Empty!")

						ErrorDisplay = ""
					}
				}

				console.log(Object.keys(data).length)

				if(Object.keys(data).length != 0) {
					EmployeeEdit_DoneButton.attr('disabled', 'disabled')

					$.ajax({
						url: window.location.href.replace("Access", "")+ "Account/EmployeeEdit_DoneButton?id="+ EmployeeView_Searchbox.val(), 
						method: 'POST',
						data: data,
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								new Employee().Edit_CancelButton()

								EmployeeEdit_DoneButton.removeAttr('disabled')
							}
							else {
								EmployeeEdit_DoneButton.removeAttr('disabled')

								alert(data.ErrorDisplay)
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		alert("Unexpected Error Occur!")

					 		EmployeeEdit_DoneButton.removeAttr('disabled')
						}
					})
				}
				else alert("Please Select Party Involved First!")
			}
			else {
				var ErrorDisplay = ""

				if(EmployeeView_Searchbox.val() == "") ErrorDisplay += "(Search) "

				if(EmployeeEdit_Lastnamebox.val() == "") ErrorDisplay += "(Lastname) "
				if(EmployeeEdit_Firstnamebox.val() == "") ErrorDisplay += "(Firstname) "
				if(EmployeeEdit_Middlenamebox.val() == "") ErrorDisplay += "(Middlename) "

				if(EmployeeEdit_Agebox.val() == "") ErrorDisplay += "(Age) "

				if(EmployeeEdit_CPbox.val() == "") ErrorDisplay += "(Company Position) "
				if(EmployeeEdit_CDbox.val() == "") ErrorDisplay += "(Company Department) "
				if(EmployeeEdit_CIbox.val() == "") ErrorDisplay += "(Company Employee ID) "

				alert(ErrorDisplay +"is Empty!")

				ErrorDisplay = ""
			}
		}
	}
</script>