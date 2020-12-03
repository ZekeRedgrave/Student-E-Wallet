<div id="App_EmployeeArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div id="Employee_ViewArea" class="d-flex justify-content-center pt-4" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="d-flex flex-column" style="width: 750px;">
			<div class="ml-2 mb-4" style="color: #7289da; width: 100%; font-weight: bold; ">EMPLOYEE ACCOUNT</div>
			<div class="d-flex flex-row" style="background: #282828;">
				<input id="EmployeeView_Searchbox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Search Employee ID Only!">
				<button onclick="new Employee().View_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Search</button>

				<div style="width: 100%"></div>

				<button onclick="new Employee().View_EditButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Edit</button>
			</div>
			<div class="ml-2 mt-4" style="color: #7289da; width: 100%; font-weight: bold; ">EMPLOYEE INFORMATION</div>
			<div class="d-flex justify-content-center">
				<div class="d-flex flex-row p-4 rounded" style="background: #1e2124; width: 600px;">
					<div>
						<img id="EmployeeView_ImageLoad" src="http://localhost/Ewallet/avatar/avatar.png" class="rounded-circle" width="125px" height="125px" style="background: #7289da">
					</div>
					<div class="ml-4" style="width: 100%">
						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name</h6>
						<div id="EmployeeView_NameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

						<div class="d-flex flex-row mt-4 mb-4">
							<div style="width: 100%;">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Age</h6>
								<div id="EmployeeView_AgeLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
							</div>
							<div class="ml-2" style="width: 100%;">
								<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Gender</h6>
								<div id="EmployeeView_GenderLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
							</div>
						</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Contact Number</h6>
						<div id="EmployeeView_NumberLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Position</h6>
						<div id="EmployeeView_PositionLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Department</h6>
						<div id="EmployeeView_DepartmentLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Status</h6>
						<div id="EmployeeView_StatusLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
					</div>
				</div>
			</div>

			<div class="ml-2 mt-4" style="color: #7289da; width: 100%; font-weight: bold; ">EMPLOYEE ACCOUNT</div>

			<div class="mt-1 pb-4">
				<div class="d-flex flex-row mt-4 mb-4">
					<div style="width: 100%;">
						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Username</h6>
						<div id="EmployeeView_UsernameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
					</div>
					<div class="ml-2" style="width: 100%;">
						<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Type</h6>
						<div id="EmployeeView_TypeLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
					</div>
				</div>

				<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Email</h6>
				<div id="EmployeeView_EmailLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

				<button onclick="new Employee().View_DeleteButton()" id="EmployeeView_DeleteButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 200px;">Delete Permanently</button>
			</div>
		</div>
	</div>
</div>

<div id="Employee_EditArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%">
		<div style="width: 600px;">
			<div class="p-0 ml-2 mb-1" style="color: #7289da; min-width: 125px; font-weight: bold;">EDIT EMPLOYEE INFORMATION</div>

			<div class="d-flex flex-column rounded p-3" style="background: #1e2124;">
				<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Employee ID</h4>
				<div class="d-flex flex-row mb-4" style="background: #282828;">
					<input id="EmployeeEdit_Searchbox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Employee ID Only!">
					<button onclick="new Employee().Edit_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Search</button>
				</div>

				<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Name</h4>
				<div class="d-flex flex-row">
					<input id="EmployeeEdit_Lastnamebox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Lastname">
					<input id="EmployeeEdit_Firstnamebox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-2" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Firstname">
					<input id="EmployeeEdit_Middlenamebox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 ml-2" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Middlename">
				</div>

				<div class="d-flex flex-row mt-4 mb-4">
					<div style="width: 100%">
						<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Age</h4>
						<input id="EmployeeEdit_Agebox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Ex. 99">
					</div>
					<div class="ml-1" style="width: 100%">
						<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Gender</h4>
						<select id="EmployeeEdit_GenderButton" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>

				<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Contact No</h4>
				<input id="EmployeeEdit_Numberbox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Ex. 99">

				<div class="d-flex flex-row mt-4 mb-4">
					<div style="width: 100%">
						<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Position</h4>
						<input id="EmployeeEdit_Positionbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Ex. Director of IT Department">
					</div>
					<div class="ml-1" style="width: 100%">
						<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Department</h4>
						<input id="EmployeeEdit_Departmentbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Ex. IT Department, Cashier, Record, ....">
					</div>
				</div>

				<div class="d-flex flex-row">
					<input id="EmployeeEdit_isRetiredbox" type="checkbox">
					<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">is Employee Retired or Resign Already?</h4>
				</div>

				<div class="d-flex flex-row mt-2">
					<button onclick="new Employee().Edit_DoneButton()" id="EmployeeEdit_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 100px;">Done</button>
					<button onclick="new Employee().Edit_CancelButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1 red-text" style="background: #333333; color: #7289da; width: 100px;">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function Employee() {
		this.View_SearchButton = function() {
			var EmployeeView_Searchbox = $("#EmployeeView_Searchbox")

			var EmployeeView_ImageLoad = $("#EmployeeView_ImageLoad")
			var EmployeeView_NameLabel = $("#EmployeeView_NameLabel")
			var EmployeeView_AgeLabel = $("#EmployeeView_AgeLabel")
			var EmployeeView_GenderLabel = $("#EmployeeView_GenderLabel")
			var EmployeeView_NumberLabel = $("#EmployeeView_NumberLabel")
			var EmployeeView_PositionLabel = $("#EmployeeView_PositionLabel")
			var EmployeeView_DepartmentLabel = $("#EmployeeView_DepartmentLabel")
			var EmployeeView_StatusLabel = $("#EmployeeView_StatusLabel")
			var EmployeeView_UsernameLabel = $("#EmployeeView_UsernameLabel")
			var EmployeeView_TypeLabel = $("#EmployeeView_TypeLabel")
			var EmployeeView_EmailLabel = $("#EmployeeView_EmailLabel")

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
							EmployeeView_PositionLabel.text(data.Position)
							EmployeeView_DepartmentLabel.text(data.Department)
							if(data.Status == "Retired") EmployeeView_StatusLabel.text(data.Status).addClass('red-text')
							else EmployeeView_StatusLabel.text(data.Status).removeClass('red-text')
							EmployeeView_UsernameLabel.text(data.Username)
							EmployeeView_TypeLabel.text(data.Type)
							EmployeeView_EmailLabel.text(data.Email)
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

		this.View_EditButton = function() { $("#Employee_EditArea").removeClass('hide') }

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
			$("#EmployeeView_PositionLabel").text('XXX-XXX-XXX')
			$("#EmployeeView_DepartmentLabel").text('XXX-XXX-XXX')
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

			$("#EmployeeEdit_Positionbox").val('')
			$("#EmployeeEdit_Departmentbox").val('')
		}

		this.Edit_SearchButton = function() {
			var EmployeeEdit_Searchbox = $("#EmployeeEdit_Searchbox")

			var EmployeeEdit_Lastnamebox = $("#EmployeeEdit_Lastnamebox")
			var EmployeeEdit_Firstnamebox = $("#EmployeeEdit_Firstnamebox")
			var EmployeeEdit_Middlenamebox = $("#EmployeeEdit_Middlenamebox")

			var EmployeeEdit_Agebox = $("#EmployeeEdit_Agebox")
			var EmployeeEdit_GenderButton = $("#EmployeeEdit_GenderButton")

			var EmployeeEdit_Numberbox = $("#EmployeeEdit_Numberbox")

			var EmployeeEdit_Positionbox = $("#EmployeeEdit_Positionbox")
			var EmployeeEdit_Departmentbox = $("#EmployeeEdit_Departmentbox")
			var EmployeeEdit_isRetiredbox = $("#EmployeeEdit_isRetiredbox")

			if(EmployeeEdit_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("Access", "")+ "Account/EmployeeEdit_SearchButton?id="+ EmployeeEdit_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							EmployeeEdit_Lastnamebox.val(data.Name.Lastname)
							EmployeeEdit_Firstnamebox.val(data.Name.Firstname)
							EmployeeEdit_Middlenamebox.val(data.Name.Middlename)

							EmployeeEdit_Agebox.val(data.Age)
							EmployeeEdit_GenderButton.val(data.Gender)

							EmployeeEdit_Numberbox.val(data.Number)

							EmployeeEdit_Positionbox.val(data.Position)
							EmployeeEdit_Departmentbox.val(data.Department)

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

		this.Edit_DoneButton = function() {
			var EmployeeEdit_Searchbox = $("#EmployeeEdit_Searchbox")

			var EmployeeEdit_Lastnamebox = $("#EmployeeEdit_Lastnamebox")
			var EmployeeEdit_Firstnamebox = $("#EmployeeEdit_Firstnamebox")
			var EmployeeEdit_Middlenamebox = $("#EmployeeEdit_Middlenamebox")

			var EmployeeEdit_Agebox = $("#EmployeeEdit_Agebox")
			var EmployeeEdit_GenderButton = $("#EmployeeEdit_GenderButton option:selected")

			var EmployeeEdit_Numberbox = $("#EmployeeEdit_Numberbox")

			var EmployeeEdit_Positionbox = $("#EmployeeEdit_Positionbox")
			var EmployeeEdit_Departmentbox = $("#EmployeeEdit_Departmentbox")
			var EmployeeEdit_isRetiredbox = $("#EmployeeEdit_isRetiredbox")

			var EmployeeEdit_DoneButton = $("#EmployeeEdit_DoneButton")

			if(EmployeeEdit_Searchbox.val() != "" && EmployeeEdit_Lastnamebox.val() != "" && EmployeeEdit_Firstnamebox.val() != "" && EmployeeEdit_Middlenamebox.val() != "" && EmployeeEdit_Agebox.val() != "" && EmployeeEdit_Positionbox.val() != "" && EmployeeEdit_Departmentbox.val() != "") {
				EmployeeEdit_DoneButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("Access", "")+ "Account/EmployeeEdit_DoneButton?id="+ EmployeeEdit_Searchbox.val(), 
					method: 'POST',
					data: {
				 		EmployeeID: EmployeeEdit_Searchbox.val(),

				 		Lastname: EmployeeEdit_Lastnamebox.val(),
				 		Firstname: EmployeeEdit_Firstnamebox.val(),
				 		Middlename: EmployeeEdit_Middlenamebox.val(),

				 		Age: EmployeeEdit_Agebox.val(),
				 		Gender: EmployeeEdit_GenderButton.val(),

				 		Number: EmployeeEdit_Numberbox.val(),

				 		Position: EmployeeEdit_Positionbox.val(),
				 		Department: EmployeeEdit_Departmentbox.val(),

				 		isRetired: EmployeeEdit_Searchbox.is(':checked')
					},
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
			else {
				var ErrorDisplay = ""

				if(EmployeeEdit_Searchbox.val() == "") ErrorDisplay += "(Search) "

				if(EmployeeEdit_Lastnamebox.val() == "") ErrorDisplay += "(Lastname) "
				if(EmployeeEdit_Firstnamebox.val() == "") ErrorDisplay += "(Firstname) "
				if(EmployeeEdit_Middlenamebox.val() == "") ErrorDisplay += "(Middlename) "

				if(EmployeeEdit_Agebox.val() == "") ErrorDisplay += "(Age) "

				if(EmployeeEdit_Positionbox.val() == "") ErrorDisplay += "(Position) "
				if(EmployeeEdit_Departmentbox.val() == "") ErrorDisplay += "(Department) "

				alert(ErrorDisplay +"is Empty!")

				ErrorDisplay = ""
			}
		}
	}
</script>