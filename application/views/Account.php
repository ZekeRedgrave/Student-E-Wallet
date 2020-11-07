<div id="App_AccountArea" class="d-flex flex-row hide" style="width:100%; height: 100%">
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
	<div class="d-flex flex-column border-left" style="min-width: 300px; height: 100%">
		<h4 class="p-2 m-0" style="font-size: 17px;">View</h4>
		<div class="d-flex flex-row border-bottom pb-1">
			<button class="form-control ml-1">Student Registry</button>
			<button class="form-control ml-1 mr-1">Account Info</button>
		</div>

		<h4 class="border-bottom p-2 m-0" style="font-size: 17px;">On-Hold New Register Account</h4>
		<div id="AccountView_RegistrationLoader" class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;"></div>
	</div>
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