<div id="App_AccountArea" class="d-flex flex-row hide" style="width:100%; height: 100%">
	<div id="ViewAccount_MainArea" class="d-flex flex-row" style="width: 100%; height: 100%">
		<div class="" style="width: 100%; height: 100%;">
			<div id="Account_HomeArea" class="d-flex flex-column" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
				<!-- Assessment Area -->
				<div id="" class="d-flex flex-column p-3">
					<div class="p-0 ml-2 mb-1" style="color: #7289da; min-width: 125px; font-weight: bold;">ASSESSMENT</div>

					<!-- View Student Assessment Area-->
					<div id="View_AssessmentArea" class="">
						<div class="d-flex flex-row mb-2">
							<input id="ViewAssessment_Searchbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" placeholder="Search Student ID">
							<button onclick="new Assessment().View_SearchButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Search</button>

							<div style="width: 100%"></div>

							<button onclick="new Assessment().View_EditButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Edit</button>
							<button onclick="new Assessment().View_AddButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; min-width: 135px;">Add Tuition</button>
						</div>
						<div class="d-flex flex-row rounded p-3 mb-4" style="background: #1e2124;">
							<img id="ViewAssessment_Image" src="http://localhost/Ewallet/avatar/avatar.png" width="100px" height="100px" class="border-0 rounded-circle" style="background: #333333; color: #7289da;">
							<div class="d-flex flex-column ml-4" style="width: 100%">
								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Name</h4>
								<div id="ViewAssessment_NameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

								<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
									<div class="d-flex flex-column" style="width: 100%">
										<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Course and Year</h4>
										<div id="ViewAssessment_CYLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
									</div>
									<div class="d-flex flex-column ml-1" style="width: 100%">
										<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Status</h4>
										<div id="ViewAssessment_StatusLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>
									</div>
								</div>

								<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Tuition Fee</h4>
								<div id="ViewAssessment_TuitionLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">P XXXX.XX</div>
							</div>
						</div>
						<!-- ------------------------------------------------------------------------------------------------ -->
						<div class="p-0 ml-2 mb-1" style="color: #7289da; min-width: 125px; font-weight: bold;">ASSESSMENT RECORD</div>
						<table class="table mb-4 " style="color: #7289da;">
							<thead>
								<tr>
									<th class="pt-2 pb-2 pl-4 border-0 red-text" style="min-width: 200px;">Old Tuition</th>
									<th class="pt-2 pb-2 pl-4 border-0" style="min-width: 200px;">New Tuition</th>
									<th class="pt-2 pb-2 pl-4 border-0" style="color: #ffffff; min-width: 200px;">Employee Name</th>
									<th class="pt-2 pb-2 pl-4 border-0 red-text" style="min-width: 200px;">Status</th>
									<th class="pt-2 pb-2 pl-4 border-0" style="color: #ffffff; min-width: 125px; max-width: 125px">Timeline</th>
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
								<tr>
									<th class="red-text" style="width: 100%">N / A</th>
									<th style="width: 100%">N / A</th>
									<th style="color: #ffffff; min-width: 135px; max-width: 135px">N / A</th>
									<th class="red-text" style="min-width: 125px; max-width: 125px">N / A</th>
									<th style="color: #ffffff; min-width: 175px; max-width: 175px">N / A</th>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- End of View Student Assessment Area-->
				</div>
				<!-- End of Assessment Area -->
				<!-- Logs Area -->
				<div class="d-flex flex-row pl-4 pr-4 pt-2 pb-2 mb-4" style="width: 100%">
					<div class="d-flex align-items-center" style="color: #7289da; width: 100%; font-weight: bold;">LOGS</div>
					<div class="d-flex flex-row">
						<button onclick="new Account().View_SRButton()" class="border-0 rounded pt-1 pb-1 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 200px; height: 32px;">Student Registry</button>
					</div>
				</div>
				<table class="table mb-4" style="color: #7289da;">
					<thead>
						<tr>
							<th class="pt-2 pb-2 pl-4 border-0" style="font-weight: bold; width: 50%">Name</th>
							<th class="pt-2 pb-2 border-0" style="font-weight: bold;">Type</th>
							<th class="pt-2 pb-2 border-0" style="font-weight: bold; width: 50%">Activity</th>
							<th class="pt-2 pb-2 border-0" style="font-weight: bold; min-width: 175px; max-width: 175px;">Timeline</th>
						</tr>
					</thead>
					<tbody id="AccountLog_ListLoader">

					</tbody>
				</table>
				<!-- End of Logs Area -->
			</div>
			<div id="AccountRegister_StudentArea" class="d-flex flex-column hide" style="width: 100%; height: 100%">
				<div class="p-2" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<div class="d-flex flex-row" style="width: 100%">
						<div class="d-flex align-items-center ml-2 mb-1" style="color: #7289da; width: 100%; font-weight: bold;">NEW ACCOUNT REVIEW</div>

						<div class="d-flex flex-column">
							<button id="AccountRegister_BackButton" onclick="new Account().View_BackButton()" class="border-0 rounded pt-2 pb-2" style="background: #333333; color: #7289da; width: 200px;">Back to Logs</button>
						</div>
					</div>

					<div class="d-flex justify-content-center mt-4">
						<div class="d-flex flex-column" style="width: 600px;">
							<!-- Account Info -->
							<div class="d-flex flex-row rounded p-3" style="background: #1e2124;">
								<img id="AccountRegister_Image" src="http://localhost/Ewallet/avatar/avatar.png" width="150px" height="150px">

								<div class="d-flex flex-column ml-4" style="width: 100%">
									<div class="ml-2 mb-4" style="color: #7289da; width: 100%; font-weight: bold;">ACCOUNT</div>

									<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Email</div>
									<div id="AccountView_RegisterEmail" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX-XXX-XXX</div>

									<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
										<div class="d-flex flex-column" style="width: 100%">
											<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Date and Time Register</div>
											<div id="AccountView_RegisterDT" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX-XXX-XXX</div>
										</div>
										<div class="d-flex flex-column ml-1" style="width: 100%">
											<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Expiration</div>
											<div id="AccountView_RegisterExpiration" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX-XXX-XXX</div>
										</div>
									</div>

									<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Username</div>
									<div id="AccountView_RegisterUsername" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX-XXX-XXX</div>
								</div>
							</div>
							<!-- End of Account Info -->
							<input id="AccountRegister_Searchbox" class="form-control hide" type="number" placeholder="e.g. 15730500">
							<!-- Personal Information -->
							<div class="d-flex flex-column mt-4">
								<div class="d-flex align-items-center ml-2 mb-1" style="color: #7289da; width: 100%; font-weight: bold;">PERSONAL INFORMATION</div>

								<div class="d-flex flex-column rounded p-3" style="width: 100%">
									<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Student ID</div>
									<div id="AccountView_RegisterSI" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX-XXX-XXX</div>

									<div class="ml-2 mb-1 mt-4" style="font-size: 12px; font-weight: bold;">Name</div>
									<div id="AccountRegister_StudentName" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX-XXX-XXX</div>

									<div class="d-flex flex-row mt-4" style="width: 100%;">
										<div class="d-flex flex-column" style="width: 100%">
											<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Course and Year</div>
											<div id="AccountRegister_StudentCY" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX XXX XXX</div>
										</div>
										<div class="d-flex flex-column ml-1" style="width: 100%">
											<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Status</div>
											<div id="AccountRegister_StudentStatus" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;">XXX XXX XXX</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End of Personal Information -->
							<div class="d-flex flex-row">
								<button id="AccountRegister_AcceptButton" onclick="new Account().View_AcceptButton()" class="border-0 rounded pt-2 pb-2" style="background: #333333; color: #7289da; width: 125px;">Acccept</button>
								<button id="AccountRegister_DeleteButton" onclick="new Account().View_DeleteButton()" class="border-0 rounded pt-2 pb-2 ml-1 red-text" style="background: #333333; width: 125px;">Decline</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column border-left" style="min-width: 300px; height: 100%">
			<div class="m-3" style="color: #7289da; width: 100%; font-weight: bold;">NEW ACCOUNT REVIEW</div>

			<div id="AccountView_RegistrationLoader" class="" style="background: #333333; width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;"></div>
		</div>
	</div>

	<!-- Student Registry -->
	<div id="ViewAccount_SR" class="pt-3 pb-3 hide" style="width: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="pl-3 pr-3" style="width: 100%">
			<!-- Create -->
			<div id="SR_CreateArea" class=" mt-5 hide">
				<div class="ml-2 mb-1" style="color: #7289da; font-weight: bold; font-size: 14px;">CREATE NEW STUDENT</div>

				<div class="d-flex justify-content-center mt-4" style="width: 100%">
					<div class="d-flex flex-column">
						<!-- Profile -->
						<div class="ml-2 mb-1" style="color: #7289da; font-weight: bold; font-size: 14px;">PROFILE</div>
						<div class="d-flex flex-row rounded p-3 mb-4" style="background: #1e2124; width: 700px;">
							<div>
							</div>
							<div class="d-flex flex-column" style="width: 100%">
								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Name</div>
								<div class="d-flex flex-row">
									<div class="d-flex flex-row rounded" style="background: #333333; width: 100%">
										<input id="SR_Lastnamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" placeholder="Lastname">
										<input id="SR_Firstnamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" placeholder="Firstname">
									</div>
									<input id="SR_Middlenamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;" placeholder="Middlename">
								</div>

								<div class="d-flex flex-row mt-4 mb-4">
									<div class="d-flex flex-column" style="width: 100%">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Gender</div>
										<select id="SR_GenderButton" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="d-flex flex-column ml-1" style="width: 100%">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Age</div>
										<input id="SR_Agebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;" type="number" placeholder="XXX">
									</div>
								</div>

								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Contact No. (Optional)</div>
								<input id="SR_Numberbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" type="number" placeholder="+6391234567890">

								<div class="ml-2 mb-1 mt-4" style="width: 100%; font-weight: bold;">Status</div>
								<select id="SR_StatusButton" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;">
									<option value="non-graduated">Non-Graduated / Enrolled</option>
									<option value="graduated">Graduated</option>
									<option value="not enrolled">Not Enrolled</option>
									<option value="dropped">Dropped</option>
								</select>
							</div>
						</div>
						<!-- End of Profile -->
						<!-- Account -->
						<div class="ml-2 mb-1" style="color: #7289da; font-weight: bold; font-size: 14px;">ACCOUNT</div>
						<div class="d-flex flex-column rounded p-3" style="background: #1e2124; width: 700px;">
							<div class="ml-2 mb-1" style="font-weight: bold; font-size: 14px;">Student ID</div>
							<input id="SR_IDbox" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;" type="number" placeholder="XXX">

							<div class="d-flex flex-row mt-4" style="width: 100%">
								<div class="d-flex flex-column" style="width: 100%">
									<div class="ml-2 mb-1" style="font-weight: bold; font-size: 14px;">Course</div>
									<input id="SR_Coursebox" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;" placeholder="XXX">
								</div>
								<div class="d-flex flex-column ml-1" style="width: 100%">
									<div class="ml-2 mb-1" style="font-weight: bold; font-size: 14px;">Level</div>
									<input id="SR_Levelbox" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;" type="number" placeholder="XXX">
								</div>
							</div>
						</div>
						<!-- End of Account -->
						<div class="d-flex flex-row mt-2">
							<button onclick="new SR().Create_DoneButton()" id="Create_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Done</button>
							<button onclick="new SR().Create_CancelButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1 red-text" style="background: #333333; color: #7289da; width: 150px;">Cancel</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Create -->
			<!-- View -->
			<div id="SR_ViewArea" class="mt-5" style="width: 100%">
				<div class="ml-2 mb-1" style="color: #7289da; width: 100%; font-weight: bold;">SCHOOL REGISTRY</div>

				<div class="d-flex flex-row">
					<input id="SR_ViewSDbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" type="number" placeholder="Search Student ID">
					<button onclick="new SR().View_SearchButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Search</button>
					<button onclick="new SR().View_BackButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Back</button>

					<div style="width: 100%"></div>

					<button onclick="new SR().View_CreateButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 150px;">Add</button>
					<button onclick="new SR().View_EditButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Edit</button>
				</div>
				<div class="d-flex justify-content-center" style="width: 100%">
					<div class="d-flex flex-column" style="width: 600px;">
						<div class="d-flex flex-row mt-5" style="width: 100%">
							<img id="View_ImageLoad" class="rounded-circle border-0 mt-4" style="background: #7289da; min-width: 150px; max-width: 150px; height: 150px">
							<div class="d-flex flex-column ml-4" style="width: 100%">
								<div class="ml-2 mb-5" style="color: #7289da; width: 100%; font-weight: bold;">PERSONAL INFORMATION</div>

								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Student ID</div>
								<div id="View_SILabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">012345679</div>

								<div class="ml-2 mb-1 mt-4" style="width: 100%; font-weight: bold;">Name</div>
								<div id="View_NameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">XXX-XXX-XXX</div>

								<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
									<div class="d-flex flex-column" style="width: 100%">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Gender</div>
										<div id="View_GenderLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">Male / Female</div>
									</div>
									<div class="d-flex flex-column ml-1" style="width: 200px">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Age</div>
										<div id="View_AgeLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">99</div>
									</div>
								</div>

								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Contact Number</div>
								<div id="View_ContactLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">+6391234678</div>

								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Status</div>
								<div id="View_StatusLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">N / A</div>
							</div>
						</div>

						<div class="d-flex flex-column mt-5" style="width: 100%">
							<div class="ml-2 mb-1" style="color: #7289da; width: 100%; font-weight: bold;">ACCOUNT</div>

							<div class="rounded p-3 mb-2" style="background: #1e2124">
								<div class="d-flex flex-row mb-4" style="width: 100%">
									<div class="d-flex flex-column" style="width: 100%">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Email</div>
										<div id="View_EmailLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">Example@email.com</div>
									</div>
									<div class="d-flex flex-column ml-1" style="width: 300px">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Username</div>
										<div id="View_UsernameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">Alias_Name</div>
									</div>
								</div>

								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Course and Level</div>
								<div id="View_CYLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%"> BS-EXAMPLE 4</div>

								<div class="d-flex flex-row mt-4" style="width: 100%">
									<div class="d-flex flex-column" style="width: 100%">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Deposits</div>
										<div id="View_DepositLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">Male / Female</div>
									</div>
									<div class="d-flex flex-column ml-1" style="width: 200px">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Tuition</div>
										<div id="View_TuitionLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%">99</div>
									</div>
								</div>
							</div>

							<button onclick="new SR().View_RemoveButton()" id="View_RemoveButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 200px;">Delete Permanently</button>
						</div>
					</div>
					
				</div>
			</div>
			<!-- End of View -->
			<!-- Edit -->
			<div id="SR_EditArea" class="mt-5 hide" style="width: 100%">
				<div class="ml-2 mb-1" style="color: #7289da; font-weight: bold; font-size: 14px;">UPDATING STUDENT INFO</div>

				<div class="d-flex flex-row mb-5">
					<input id="SR_EditIDbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" type="number" placeholder="Search Student ID">
					<button onclick="new SR().Edit_SearchButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Search</button>
					<div style="width: 100%"></div>
					<button onclick="new SR().Edit_CancelButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 red-text" style="background: #333333; color: #7289da; width: 150px;">Cancel</button>
					<button onclick="new SR().Edit_DoneButton()" id="Edit_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 150px;">Done</button>
				</div>

				<div class="d-flex justify-content-center" style="width: 100%">
					<div class="d-flex flex-row">
						<div class="d-flex flex-column" style="width: 600px">
							<div class="ml-2 mb-1" style="color: #7289da; font-weight: bold; font-size: 14px;">DISPLAY INFORMATION</div>

							<div class="d-flex flex-column rounded p-3" style="background: #1e2124; width: 100%">
								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Name</div>
								<div class="d-flex flex-row mb-2">
									<div class="d-flex flex-row rounded mr-1" style="background: #333333; width: 100%">
										<input id="SR_EditLastnamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" placeholder="Lastname">
										<input id="SR_EditFirstnamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" placeholder="Firstname">
									</div>
									<input id="SR_EditMiddlenamebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 200px;" placeholder="Middlename">
								</div>

								<div class="d-flex flex-row mt-4 mb-4" style="width: 100%">
									<div class="d-flex flex-column" style="width: 100%">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Gender</div>
										<select id="SR_EditGenderButton" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
									<div class="d-flex flex-column ml-1" style="width: 200px">
										<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Age</div>
										<input id="SR_EditAgebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;" type="number" placeholder="Ex. 69">
									</div>
								</div>

								<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Contact No. (Optional)</div>
								<input id="SR_EditNumberbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" type="number" placeholder="Ex. 09485158548">
							</div>
						</div>

						<div class="d-flex flex-column p-3" style="width: 300px;">
							<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Status</div>
							<select id="SR_EditStatusButton" class="custom-select border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%; height: 40px;">
								<option value="non-graduated">Non-Graduated / Enrolled</option>
								<option value="graduated">Graduated</option>
								<option value="not enrolled">Not Enrolled</option>
								<option value="dropped">Dropped</option>
							</select>

							<div class="d-flex flex-row mt-4" style="width: 100%">
								<div class="d-flex flex-column" style="width: 100%">
									<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Course</div>
									<input id="SR_EditCoursebox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" placeholder="XXX">
								</div>
								<div class="d-flex flex-column ml-1" style="width: 100%">
									<div class="ml-2 mb-1" style="width: 100%; font-weight: bold;">Level</div>
									<input id="SR_EditLevelbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #7289da; width: 100%;" placeholder="XXX">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Edit-->
		</div>
	</div>
	<!-- End of Student Registry -->
</div>

<div id="Create_AssessmentArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%;">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%">
		<div style="width: 400px;">
			<div class="p-0 ml-2 mb-1" style="color: #7289da; min-width: 125px; font-weight: bold;">ADD TUITION</div>

			<div class="d-flex flex-column rounded p-3" style="background: #1e2124;">
				<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
				<input id="CreateAssessment_SIbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" type="number" placeholder="#1234567890">

				<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">Tuition Fee</h4>
				<input id="CreateAssessment_TFbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" type="number" placeholder="P XXXX.XX">

				<div class="d-flex flex-row mt-2">
					<button onclick="new Assessment().Create_DoneButton()" id="AssessmentCreate_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 100px;">Done</button>
					<button onclick="new Assessment().Create_CancelButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1 red-text" style="background: #333333; color: #7289da; width: 100px;">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="Edit_AssessmentArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%;">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%">
		<div style="width: 400px;">
			<div class="p-0 ml-2 mb-1" style="color: #7289da; min-width: 125px; font-weight: bold;">EDITING TUITION FEE</div>

			<div class="d-flex flex-column rounded p-3" style="background: #1e2124;">
				<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
				<div class="d-flex flex-row">
					<input id="EditAssessment_SIbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%; height: 40px;" type="number" placeholder="#1234567890">
					<button onclick="new Assessment().Edit_SearchButton()" id="AssessmentEdit_SearchButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 100px; height: 40px;">Search</button>
				</div>

				<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">Old Tuition Fee</h4>
				<input id="EditAssessment_OTbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" type="number" disabled placeholder="P XXXX.XX">

				<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">Current Tuition Fee</h4>
				<input id="EditAssessment_CTbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" type="number" disabled placeholder="P XXXX.XX">

				<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">New Tuition Fee</h4>
				<input id="EditAssessment_NTbox" class="border-0 rounded pt-2 pb-2 pl-4 pr-4" style="background: #333333; color: #ffffff; width: 100%" type="number" placeholder="P XXXX.XX">

				<div class="p-0 ml-2 mb-1 mt-4" style="color: #7289da; min-width: 125px; font-weight: bold;">ARE YOU SURE YOU WANNA CONTINUE REFACTORING THE STUDENT'S TUITION INTO NEW?</div>

				<div class="d-flex flex-row mt-2">
					<button onclick="new Assessment().Edit_DoneButton()" id="AssessmentEdit_DoneButton" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1" style="background: #333333; color: #7289da; width: 100px;">Yes</button>
					<button onclick="new Assessment().Edit_CancelButton()" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 ml-1 red-text" style="background: #333333; color: #7289da; width: 100px;">No</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var changeColor_Table = 0

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
							<div id="AccountView_RegistrationID` +id+ `" onclick="new Account().View_RegisterButton(` +id+ `)" class="d-flex flex-row p-2" style="border-bottom: 1px solid #444444; width: 100%; cursor: pointer;">
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
						var color = ""

						for(var value of data.LogArray) {
							if(changeColor_Table == 0) {
								changeColor_Table = 1
								color = '#36393e'
							}
							else {
								changeColor_Table = 0
								color = ''
							}

							AccountLog_ListLoader.append(`
								<tr id="Log_ItemID` +value+ `" style="background: ` +color+ `">
									<th class="p-0 border-0">
										<div class="d-flex flex-row pt-1 pb-1 pl-4">
											<img id="LogItem_ImageID` +value+ `" src="http://localhost/Ewallet/avatar/avatar.png" width="50px" height="50px">
											<div id="LogItem_NameID` +value+ `" class="d-flex align-items-center ml-4" style="font-weight: bold; word-break: keep-all; width: 100%">
												XXX XXX XXX
											</div>
										</div>
									</th>
									<th class="border-0">
										<div id="LogItem_TypeID` +value+ `" class="d-flex align-items-center pt-1 pb-1 red-text">STUDENT</div>
									</th>
									<th class="border-0">
										<div id="LogItem_ActivityID` +value+ `" class="d-flex align-items-center pt-1 pb-1">Unknown</div>
									</th>
									<th class="border-0">
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

			var AccountRegister_AcceptButton = $("#AccountRegister_AcceptButton")
			AccountRegister_AcceptButton.attr('disabled', 'disabled')

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

						AccountRegister_AcceptButton.removeAttr('disabled')

						new Account().View_BackButton()
					}
					else {
						alert(data.ErrorDisplay)

						AccountRegister_AcceptButton.removeAttr('disabled')
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!")

			 		AccountRegister_AcceptButton.removeAttr('disabled')
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
			var View_RemoveButton = $("#View_RemoveButton")

			if(id != "") {
				View_RemoveButton.attr('disabled', 'disabled')

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

							View_RemoveButton.removeAttr('disabled')
						}
						else {
							alert(data.ErrorDisplay)

							View_RemoveButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		View_RemoveButton.removeAttr('disabled')
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

			var Create_DoneButton = $("#Create_DoneButton")

			if(SR_Lastnamebox.val() != "" && SR_Firstnamebox.val() != "" && SR_Middlenamebox.val() != "" && SR_Agebox.val() != "" && SR_Numberbox.val() != "" && SR_Coursebox.val() != "" && SR_Levelbox.val() != "" && SR_IDbox.val() != "") {
				Create_DoneButton.attr('disabled', 'disabled')

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
						if(!data.isError) {
							new SR().Create_CancelButton()

							alert("Student Info is now Added!")

							Create_DoneButton.removeAttr('disabled')
						}
						else {
							alert(data.ErrorDisplay)

							Create_DoneButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		Create_DoneButton.removeAttr('disabled')
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

			var Edit_DoneButton = $("#Edit_DoneButton")

			if(SR_Lastnamebox.val() != "" && SR_Firstnamebox.val() != "" && SR_Middlenamebox.val() != "" && SR_Agebox.val() != "" && SR_Numberbox.val() != "" && SR_Coursebox.val() != "" && SR_Levelbox.val() != "" && SR_IDbox.val() != "") {
				Edit_DoneButton.attr('disabled', 'disabled')

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
						if(!data.isError) {
							new SR().Edit_CancelButton()

							alert("Student Info is now Updated!")

							Edit_DoneButton.removeAttr('disabled')
						}
						else {
							alert(data.ErrorDisplay)

							Edit_DoneButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		Edit_DoneButton.removeAttr('disabled')
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
			var ViewAssessment_TuitionLabel = $("#ViewAssessment_TuitionLabel")

			if(ViewAssessment_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/ViewAssessment_SearchButton?id=" +ViewAssessment_Searchbox.val(), 
					method: 'POST',
					dataType: 'text',
					success: function(data) {
						if(!data.isError) {
							var x = JSON.parse(data)

							ViewAssessment_Image.attr('src', window.location.href.replace("/index.php/Access", "/")+ "avatar/" + x.Image)
							ViewAssessment_NameLabel.text(x.Name)
							ViewAssessment_CYLabel.text(x.CY)
							ViewAssessment_StatusLabel.text(x.Status)
							ViewAssessment_TuitionLabel.text('P '+ x.Tuition)

							if(!x.isEmpty) {
								$("#ViewAssessment_TableLoad").html('')

								for(var y in x.AssessmentArray) new Assessment().View_AssessmentLoad(x.AssessmentArray[y])
							}
							else $("#ViewAssessment_TableLoad").html(`
								<tr>
									<th class="red-text" style="width: 100%">N / A</th>
									<th style="width: 100%">N / A</th>
									<th style="color: #ffffff; min-width: 135px; max-width: 135px">N / A</th>
									<th class="red-text" style="min-width: 125px; max-width: 125px">N / A</th>
									<th style="color: #ffffff; min-width: 175px; max-width: 175px">N / A</th>
								</tr>
							`)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("(Student ID's Searchbox) is Emtpy!")
		}

		this.View_AssessmentLoad = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/ViewAssessment_AssessmentLoad?id=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#ViewAssessment_TableLoad").append(`
							<tr>
								<th class="red-text" style="width: 100%">` +data.Old+ `</th>
								<th style="width: 100%">` +data.New+ `</th>
								<th style="color: #ffffff; min-width: 135px; max-width: 135px">` +data.Name+ `</th>
								<th class="red-text" style="min-width: 125px; max-width: 125px">` +data.Status+ `</th>
								<th style="color: #ffffff; min-width: 175px; max-width: 175px">` +data.Timeline+ `</th>
							</tr>
						`)
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_AddButton = function() {
			$("#Create_AssessmentArea").removeClass('hide')
		}

		this.View_EditButton = function() {
			$("#Edit_AssessmentArea").removeClass('hide')
		}

		this.Create_DoneButton = function() {
			var Create_AssessmentArea = $("#Create_AssessmentArea")
			var CreateAssessment_SIbox = $("#CreateAssessment_SIbox")
			var CreateAssessment_TFbox = $("#CreateAssessment_TFbox")

			var AssessmentCreate_DoneButton = $("#AssessmentCreate_DoneButton")

			if(CreateAssessment_SIbox.val() != "" && CreateAssessment_TFbox.val() != "") {
				AssessmentCreate_DoneButton.attr('disabled', 'disabled')

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
							AssessmentCreate_DoneButton.removeAttr('disabled')
						}
						else {
							alert(data.ErrorDisplay)

							AssessmentCreate_DoneButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")

				 		AssessmentCreate_DoneButton.removeAttr('disabled')
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

		this.Edit_SearchButton = function() {
			var EditAssessment_SIbox = $("#EditAssessment_SIbox")

			if(EditAssessment_SIbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/AssessmentEdit_SearchButton?id="+ EditAssessment_SIbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							$("#EditAssessment_OTbox").val(data.Old)
							$("#EditAssessment_CTbox").val(data.Current)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else alert("(Student ID) is Empty!")
		}

		this.Edit_DoneButton = function() {
			var EditAssessment_SIbox = $("#EditAssessment_SIbox")

			var EditAssessment_OTbox = $("#EditAssessment_SIbox")
			var EditAssessment_CTbox = $("#EditAssessment_CTbox")
			var EditAssessment_NTbox = $("#EditAssessment_NTbox")

			var AssessmentEdit_DoneButton = $("#AssessmentEdit_DoneButton")

			if(EditAssessment_SIbox.val() != '' && EditAssessment_OTbox.val() != '' && EditAssessment_CTbox.val() != '' && EditAssessment_NTbox.val() != '') {
				AssessmentEdit_DoneButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/AssessmentEdit_DoneButton", 
					method: 'POST',
					data: {
				 		StudentID: EditAssessment_SIbox.val(),
				 		OldTuition: EditAssessment_OTbox.val(),
				 		CurrentTuition: EditAssessment_CTbox.val(),
				 		NewTuition: EditAssessment_NTbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							AssessmentEdit_DoneButton.removeAttr('disabled')
							$("#Edit_AssessmentArea").addClass('hide')
						}
						else {
							alert(data.ErrorDisplay)

							AssessmentEdit_DoneButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		AssessmentEdit_DoneButton.removeAttr('disabled')
					}
				})
			}
			else {
				var ErrorDisplay = ""

				if(EditAssessment_SIbox.val() == "") ErrorDisplay += "(Student ID) "
				if(EditAssessment_OTbox.val() == "") ErrorDisplay += "(Old Tuition Fee) "
				if(EditAssessment_CTbox.val() == "") ErrorDisplay += "(Current Tuition Fee) "
				if(EditAssessment_NTbox.val() == "") ErrorDisplay += "(New Tuition Fee) "

				alert(ErrorDisplay+ "is Empty!")

				ErrorDisplay = ""
			}
		}

		this.Edit_CancelButton = function() {
			$("#Edit_AssessmentArea").addClass('hide')
		}
	}
</script>