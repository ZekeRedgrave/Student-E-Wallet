<div id="App_HomeArea" class="d-flex flex-row" style="width:100%; height: 100%">
	<!-- Store View Area -->
	<div id="StoreView_HomeArea" class="d-flex flex-row" style="width: 100%;">
		<!-- Store Area -->
		<div class="d-flex flex-column shadow-sm companyLabel" style="min-width: 400px; max-width: 400px; height: 100%;">
			<div class="d-flex flex-row pl-1 pr-1 mt-2 pb-2 shadow-sm" style="width: 100%">
				<!-- Student Balance -->
				<div class="d-flex flex-column rounded pb-2 companyStatus" title="Indicates the Total Balance Available" style="width: 100%; cursor: zoom-in;">
					<div class="pl-3 pr-3 pt-2 companyForeground" style="font-weight: bold;">DEPOSITS</div>
					<h3 id="StoreView_DepositLabel" class="p-0 pl-2 pr-2 m-0" style="font-size: 12px;">P XXXX.XX</h3>
				</div>
				<!-- End of Student Balance -->
				<!-- Tution Fee -->
				<div class="d-flex flex-column companyStatus rounded ml-1" title="Indicates the Total Tuition Available Left" style="width: 100%; cursor: zoom-in;">
					<div class="pl-3 pr-3 pt-2 companyForeground" style="font-weight: bold;">TUITION</div>
					<h6 id="StoreView_TuitionLabel" class="p-0 pl-2 pr-2 m-0" style="font-size: 12px;">P XXXX.XX</h6>
				</div>
				<!-- End of Tution Fee -->
			</div>

			<div class="pl-3 pr-3 pt-2 pb-2" style="font-weight: bold;">PAYMENT LIST</div>
			<div style="width: 100%; height: 100%; overflow-y: scroll;">
				<!-- Static Store Item -->
				<button onclick="new Store().View_OpenButton()" class="d-flex flex-row pt-3 pb-3 pl-4 pr-4 button-hover" style="background: white !important;">
					<div class="material-icons d-flex align-items-center justify-content-center companyLabel">account_balance</div>
					<div class="d-flex align-items-center companyLabel ml-4" style="width: 100%; font-weight: bold;">Tuition Fee (Default)<div>
				</button>
				<!-- End Static Store Item -->
				<div class="mb-1 mt-1 ml-4 mr-4 rounded" style="border: 1px solid #555555;"></div>

				<!-- Dynamic Store Item Area -->
				<div id="StoreView_DynamicLoad">
				</div>
				<!-- End of Dynamic Store Item Area -->	
			</div>

			<div class="d-flex align-items-center companyStatus" style="min-height: 60px; max-height: 60px">
				<div class="d-flex flex-row pl-3 pr-3" style="width: 100%;">
					<div class="d-flex align-items-center">
						<img id="StoreView_StudentImage" class="rounded-circle" width="40px" height="40px">
					</div>
					<div class="ml-3 pt-1" style="width: 100%">
						<div class="companyForeground" id="StoreView_StudentName" style="font-weight: bold;"></div>
						<div class="companyForeground" id="StoreView_StudentID" style="font-weight: bold; font-size: 12px; margin-top: -5px;"></div>
					</div>
					<div class="d-flex align-items-center">
						<button onclick="new Store().View_RefreshButton()" class="material-icons" title="Refresh If the Payment List, News / Announcement, and Balance not Completely Display">refresh</button>
						<button onclick="new Store().View_CartButton()" class="material-icons" title="Show All Item List After Adding Any Item in Payment List">shopping_cart</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End of Store View Area -->
		<div class="d-flex flex-column companyLabel" style="width: 100%; overflow: hidden; overflow-y: scroll;">
			<!-- Timeline Area -->
			<div class="d-flex flex-column" style="width: 100%; height: 100%">
				<div class="d-flex flex-row pl-4 pr-4 pt-2 pb-2 shadow-sm">
					<div class="d-flex align-items-center" style="width: 100%; font-weight: bold;">ASSESSMENT RECORD</div>
					<div class="d-flex flex-row">
						<select id="StoreView_ItemButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyInput" style="width: 125px; font-size: 14px; font-weight: bold;">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="50">25</option>
						</select>
						<button onclick="new Store()._View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="width: 125px; font-size: 14px; font-weight: bold;">Load</button>
					</div>
				</div>
				<table class="table mb-4">
					<thead>
						<tr>
							<th class="pt-2 pb-2 pl-4 border-0 red-text" style="min-width: 75px; max-width: 75px">Old Tuition</th>
							<th class="pt-2 pb-2 pl-4 border-0" style="min-width: 125px;">New Tuition</th>
							<th class="pt-2 pb-2 pl-4 border-0" style="min-width: 200px;">Quarterly Payment Type</th>
							<th class="pt-2 pb-2 pl-4 border-0 red-text" style="width: 100%;">Status</th>
							<th class="pt-2 pb-2 pl-4 border-0" style="min-width: 125px; max-width: 125px">Timeline</th>
						</tr>
					</thead>
					<tbody id="StoreView_AssessmentLoad">
								<!-- <tr>
									<th style="width: 100%">P XXXX.XX</th>
									<th class="red-text" style="width: 100%">P XXXX.XX</th>
									<th style="min-width: 135px; max-width: 135px">BSIT-4</th>
									<th class="red-text" style="min-width: 125px; max-width: 125px">BALANCE</th>
									<th style="min-width: 175px; max-width: 175px">2020-01-01 00:00:00</th>
								</tr> -->
					</tbody>
				</table>

				<div class="p-0 ml-2 mb-1" style="min-width: 125px; font-weight: bold;">NEWS / ANNOUNCEMENT</div>
				<div class="d-flex justify-content-center" style="width: 100%">
					<div id="StoreView_LoaderArea" class="d-flex flex-column pl-3 pt-2" style="width: 600px">
						<h1 class="mt-5 mb-5">There is no Currently Big News or Announcement Yet!</h1>
					</div>
				</div>
			</div>
			<!-- End of Timeline Area -->
		</div>	
	</div>
	
</div>
<!-- Store Tuition Area -->
<div id="StoreView_TuitionArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%;">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%">
		<div class="d-flex flex-column rounded p-3" style="background: #282828; color: #ffffff; width: 400px;">
			<div class="mb-4" style="color: #7289da; font-weight: bold;">TUITION FEE</div>

			<h6 class="pl-2 pr-2 pb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Amount</h6>
			<div class="d-flex flex-row" style="width: 100%">
				<input id="StoreTuition_Amountbox" type="number" class="border-0 rounded p-3 mr-4" placeholder="Ex. 123456789" style="background: #333333; color: #ffffff; width: 100%;" placeholder="Ex. 10.59">

				<button onclick="new Store().View_TuitionButton()" id="StoreView_TuitionButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Pay</button>

				<button onclick="new Store().View_CancelButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="width: 125px; font-size: 14px; font-weight: bold;">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- End of Store Tuition Area -->
<!-- Store Dynamic Form Area -->
<div id="StoreView_DynamicArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%;">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%">
		<div class="d-flex flex-column rounded p-3" style="background: #282828; color: #ffffff; width: 400px;">
			<div class="ml-2 mb-4" style="color: #7289da; font-weight: bold;">ADD PAYTMENT LIST</div>

			<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Name and Price</h6>
			<div class="d-flex flex-row">
				<div id="StoreView_NameLabel" class="d-flex align-items-center pl-4 pr-2 pt-2 pb-2 rounded mr-1" style="background: #e8d15f !important; width: 100%; color: #ffffff !important; font-size: 14px; font-weight: bold;">XXXXXXX</div>
				<div id="StoreView_PriceLabel" class="d-flex align-items-center pl-4 pr-2 pt-2 pb-2 rounded" style="background: #e8d15f !important; width: 100%; color: #ffffff !important; font-size: 14px; font-weight: bold;">P XXXXXXX</div>
			</div>

			<div id="StoreView_QuantityArea" class="mt-2" style="width: 100%">
				<h6 class="ml-2 mb-1" style="margin: 0; font-size: 12px; font-weight: bold;">Quantity</h6>
				<div class="d-flex flex-row" style="width: 100%">
					<input id="StoreView_Quantitybox" type="number" disabled value="0" class="d-flex align-items-center pl-4 pr-2 pt-2 pb-2 rounded" style="background: #e8d15f !important; width: 100%; color: #ffffff !important; font-size: 14px; font-weight: bold;">
					<div class="d-flex flex-row ml-2">
						<button onclick="new Store().View_RemoveButton()" id="StoreView_RemoveButton" class="material-icons p-2 rounded mr-1 red">remove</button>
						<button onclick="new Store().View_AddButton()" id="StoreView_AddButton" class="material-icons p-2 rounded companyBackground">add</button>
					</div>
				</div>
			</div>

			<h6 class="ml-2 mb-1 mt-4" style="margin: 0; font-size: 12px; font-weight: bold;">Total</h6>
			<div id="StoreView_TotalLabel" class="d-flex align-items-center pl-4 pr-2 pt-2 pb-2 rounded" style="background: #e8d15f !important; width: 100%; color: #ffffff !important; font-size: 14px; font-weight: bold;">P XXXXXXX</div>

			<div class="d-flex flex-row mt-2" style="width: 100%">
				<button onclick="new Store().DA_DynamicButton()" id="StoreView_DynamicButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Add</button>

				<button onclick="new Store().DA_CancelButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="width: 125px; font-size: 14px; font-weight: bold;">Cancel</button>
			</div>
		</div>
	</div>
</div>
<!-- End of Store Dynamic Form Area -->
<!-- Cart Area -->
<div id="StoreView_CartArea" class="position-fixed hide" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%;">
	<div class="d-flex justify-content-center pt-4 pb-4" style="background: #00000099; width: 100%; height: 100%">
		<div class="container" style="width: 100%; height: 100%">
			<div id="View_CartArea" class="d-flex flex-column companyLabel" style="background: white; width: 100%; height: 100%;">
				<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 shadow-sm">
					<div class="d-flex align-items-center" style="width: 100%; font-weight: bold;">VIEW PAYMENT</div>
					<div>
						<button onclick="new StoreCart().View_CloseButton()" class="pt-2 pb-2 pl-4 pr-4 rounded red" style="min-width: 100px; max-width: 100px;">Close</button>
					</div>
				</div>

				<div class="" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<div class="ml-4 mt-4 mb-2 pl-4 border-bottom" style="font-weight: bold;">CASHIER</div>
					<div id="CartView_CashierLoad" style="min-width: 750px;">
						<h1 class="d-flex justify-content-center">No one in here. Except you.</h1>
					</div>

					<div class="ml-4 mt-4 mb-2 pl-4 border-bottom" style="font-weight: bold;">DEPARTMENT</div>
					<div id="CartView_DepartmentLoad" style="min-width: 750px;">
						<h1 class="d-flex justify-content-center">No one in here. Except you.</h1>
					</div>

				</div>

				<div class="d-flex flex-row border-top pl-4 pr-4 pt-2 pb-2" style="width: 100%">
					<div class="d-flex align-items-center" style="width: 100%; font-weight: bold;">Total</div>
					<div class="d-flex flex-row">
						<div id="CartView_TotalLabel" class="d-flex align-items-center pl-4 pr-4 rounded companyInput" style="min-width: 250px; max-width: 250px;">P XXXXXXX</div>
						<button onclick="new StoreCart().View_CloseButton()" class="p-2 rounded ml-1">Cancel</button>
						<button id="StoreCV_PurchaseButton" onclick="new StoreCart().View_PurchaseButton()" class="p-2 rounded ml-1 companyBackground" style="min-width: 125px; max-width: 125px;">Purchase Now!</button>
						<button id="StoreCV_ClearButton" onclick="new StoreCart().View_ClearButton()" class="material-icons p-2 ml-4 rounded red" title="Clear All Payment List">clear</button>
					</div>
				</div>
			</div>
			<div id="View_ReceiptArea" class="d-flex flex-column companyLabel hide" style="background: white; width: 100%; height: 100%;">
				<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<img class="mt-2 ml-4 mr-4" id="ViewReceipt_Image" width="100px" height="100px">
					<div class="pb-2 pl-4 pr-4">STUDENT E-WALLET</div>

					<div class="p-4 border-bottom">
						<div style="color: #375692; font-size: 12px;">OFFICIAL RECEIPT</div>
						<div style="font-size: 12px;">RECEIPT NO. #<span id="ViewReceipt_IDLabel" class="red-text">XXXXXXX</span></div>
						<div style="font-size: 12px;">TIMELINE # <span id="ViewReceipt_TimelineLabel" class="red-text">2021-01-01</span></div>
					</div>

					<div class="mb-4" style="width: 100%; height: 100%">
						<div class="ml-4 mt-4 mb-2 pl-4" style="font-weight: bold;">CASHIER</div>
						<div id="ViewReceipt_CashierLoad" class="mb-4">
							<!-- <div class="d-flex flex-row pl-4 pr-4 pt-1 pb-1" style="width: 100%">
								<div class="pl-4" style="width: 100%; color: #375692;">XXXXXXX</div>
								<div class="ml-2 mr-2">69.69</div>
								<div class="ml-2 mr-2">x</div>
								<div class="ml-2 mr-2 red-text">3</div>
								<div class="ml-2 mr-5">=</div>

								<div class="ml-5">666</div>
							</div> -->
						</div>

						<div class="ml-4 mt-4 mb-2 pl-4" style="font-weight: bold;">DEPARTMENT</div>
						<div id="ViewReceipt_DepartmentLoad" class="mb-4">

						</div>
					</div>

					<div class="d-flex flex-row justify-content-end pt-2 pb-5 border-top" style="width: 100%;">
						<div>
							<div>SUB-TOTAL</div>
							<div>CASH</div>
							<div class="mt-2 red-text">TOTAL</div>
						</div>
						<div class="ml-5 mr-4">
							<div id="ViewReceipt_STLabel">69.69</div>
							<div id="ViewReceipt_CashLabel">69.69</div>
							<div id="ViewReceipt_TotalLabel" class="mt-2 red-text">69.69</div>
						</div>
					</div>

					<button onclick="new StoreCart()._View_CloseButton()" class="pt-2 pb-2 companyBackground">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Cart Area -->
<!-- Store Post View Area -->
<div id="StorePost_ViewArea" class="position-fixed d-flex flex-row hide" style="top: 0; bottom: 0; left: 0; right: 0; background: #00000099; width: 100%; height: 100%">
	<div class="d-flex flex-column" style="width: 100%; height: 100%">
		<div id="StorePost_ImageLoader" class="" style="width: 100%; height: 100%; overflow-y: hidden;">
			<h4 class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">No Image!</h4>
		</div>
		<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4" style="width: 100%;">
			<div class="d-flex justify-content-center" style="width: 100%;">
				<div class="d-flex flex-row">
					<a onclick="new StorePost().View_PreviewButton()" class="material-icons d-flex justify-content-center align-items-center rounded-circle" style="color: #7289da; background: #7289da20; min-width: 50px; max-width: 50px; height: 50px;">keyboard_arrow_left</a>
					<a onclick="new StorePost().View_BackButton()" class="material-icons d-flex justify-content-center align-items-center rounded-circle ml-1 mr-1" style="background: #7289da20; color: #e91e63; min-width: 50px; max-width: 50px; height: 50px;">close</a>
					<a onclick="new StorePost().View_ForwardButton()" class="material-icons d-flex justify-content-center align-items-center rounded-circle" style="color: #7289da; background: #7289da20; min-width: 50px; max-width: 50px; height: 50px;">keyboard_arrow_right</a>
				</div>
			</div>
		</div>
	</div>
	<div class="d-flex flex-column companyLabel" style="background: white; min-width: 500px; max-width: 500px; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div class="d-flex flex-row p-3" style="width: 100%;">
			<img id="StorePost_HostImage" class="rounded-circle" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
			<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
				<h4 id="StorePost_HostName" style="color: #7289da; margin: 0; font-size: 14px; font-weight: bold;">XXXXXXX [System Administrator]</h4>
				<h4 id="StorePost_DateTime" style="margin: 0; font-size: 12px;">Timeline # 2020-01-01 00:00:00</h4>

				<div id="StorePost_DescriptionLoader" class="mt-3 mb-2" style="font-size: 12px;">
					<span>Add some text here!</span>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column" style="width: 100%; height: 100%;">
			<!-- Write Comment Area -->
			<div class="d-flex flex-row p-2" style="width: 100%">
				<!-- <img id="TimelineView_UserImage" src="http://localhost/Ewallet/avatar.png" class="rounded-circle" width="50px" height="50px"> -->
				<div class="d-flex flex-row ml-2" style="width: 100%">
					<textarea id="StoreComment_Writebox" class="rounded border-0 pl-2 pr-2" placeholder="Any Comment?" style="background: #333333; color: #ffffff; width: 100%; height: 100px; resize: none;"></textarea>
					<div class="ml-2">
						<button id="StoreComment_SendButton" onclick="new StoreComment().Create_SendButton()" class="material-icons rounded border-0" style="background: #333333; color: #7289da; width: 50px; height: 50px;">send</button>
					</div>
				</div>
			</div>
			<!-- End of Write Comment Area -->
			<!-- Comment Loader Area -->
			<div id="StorePost_CommentLoader" class="d-flex flex-column border-top" style="width: 100%; height: 100%"></div>
			<!-- End of Comment Loader Area -->
		</div>
		<!-- End of Comment Loader Area -->
	</div>
</div>
<!-- End of Store Post View Area -->
<!-- Process Area -->

<!-- End of Process Area -->

<script type="text/javascript">
	var StoreView_ImageCurrent = 0
	var StoreView_ImageLast = 0
	var StoreCart_DepartmentList = []
	var StoreCart_CashierList = []

	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Dashboard")
		$('[title]').tooltip()
		$("#ViewReceipt_Image").attr('src', window.location.href.replace("index.php/Access", "avatar")+ "/Logo.png")

		new Store().View_ItemLoad()
		new Store().View_StudentLoad()
		new Store().View_DynamicLoad()
		new Store().View_PostLoad()
		new Store().View_AssessmentLoad()
		new Store().View_CartLoad()
	})

	function Store() {
		this.View_AssessmentLoad = function() {
			var StoreView_ItemButton = $("#StoreView_ItemButton option:selected")
			var StoreView_AssessmentLoad = $("#StoreView_AssessmentLoad")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/ViewAssessment_SearchButton?id=<?php echo $StudentID; ?>", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(!data.isEmpty) {
							StoreView_AssessmentLoad.html('')

							for(var x = 0; x < StoreView_ItemButton.val(); x++) new Store()._View_AssessmentLoad(data.AssessmentArray[x])
						}
						else StoreView_AssessmentLoad.html(`
							<tr class="button-hover">
								<th class="red-text" style="width: 100%">N / A</th>
								<th style="width: 100%">N / A</th>
								<th style="min-width: 135px; max-width: 135px">N / A</th>
								<th class="red-text" style="min-width: 125px; max-width: 125px">N / A</th>
								<th style="min-width: 175px; max-width: 175px">N / A</th>
							</tr>
						`)
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this._View_AssessmentLoad = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/ViewAssessment_AssessmentLoad?id=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#StoreView_AssessmentLoad").append(`
							<tr class="button-hover">
								<th class="red-text" style="min-width: 135px; max-width: 135px">` +data.Old+ `</th>
								<th style="min-width: 135px; max-width: 135px">` +data.New+ `</th>
								<th style="min-width: 135px; max-width: 135px">` +data.Type+ `</th>
								<th class="red-text" style="width: 100%">` +data.Status+ `</th>
								<th style="min-width: 175px; max-width: 175px">` +data.Timeline+ `</th>
							</tr>
						`)
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this._View_RefreshButton = function() { new Store().View_AssessmentLoad() }

		this.View_ItemLoad = function() {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/StoreView_ItemLoad", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#StoreView_DepositLabel").text('P '+ data.AccountDeposit)
						$("#StoreView_TuitionLabel").text('P '+ data.AccountTuition)
					}
					else $("#root").load(window.location+ "/LoadView?Load=views&Name=entrance")
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_StudentLoad = function() {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Account/View_ProfileLoad", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#StoreView_StudentImage").attr('src', window.location.href.replace("index.php/Access", "avatar/")+ data.AccountImage)
						$("#StoreView_StudentName").text(data.AccountName)
						$("#StoreView_StudentID").text(data.AccountID.split("#")[1])
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				}
			})
		}

		this.View_DynamicLoad = function() {
			var StoreView_DynamicLoad = $("#StoreView_DynamicLoad")
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_DynamicLoad", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						StoreView_DynamicLoad.html('')

						for(var x in data.StoreArray) {
							StoreView_DynamicLoad.append(`
								<div onclick="new Store().View_DynamicButton(` +data.StoreArray[x].StoreID+ `)" class="d-flex flex-row pt-3 pb-3 pl-4 pr-4 border-bottom button-hover" style="background: white !important; cursor: pointer">
									<div class="material-icons d-flex align-items-center justify-content-center companyLabel">` +(data.StoreArray[x].StoreIcon == "" ? "block" : data.StoreArray[x].StoreIcon)+ `</div>

									<div class="d-flex flex-column ml-4" style="width: 100%;">
										<div class="companyLabel" style="width: 100%; font-weight: bold;">` +data.StoreArray[x].StoreTitle+ `<div>
										<div class="companyLabel" style="width: 100%; margin-top: -5px; font-size: 12px;">` +data.StoreArray[x].StoreType+ `<div>
									</div>
								</div>
							`)
						}
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_PostLoad = function() {
			var StoreView_LoaderArea = $("#StoreView_LoaderArea")
			// Timeline
			$.ajax({
				url: window.location.href.replace("/Access", "/Timeline/View_PostLoad"), 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(data.TimelineCount != 0) {
							StoreView_LoaderArea.html('')

							for(var value of data.TimelineArray) StoreView_LoaderArea.append(`
								<div id="StoreView_ItemID`+ value.TimelineID +`" class="d-flex flex-row p-3 mb-1 shadow-sm rounded" style="width: 100%;">
									<img id="StoreView_ImageID`+ value.TimelineID +`" class="rounded-circle" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-4 mr-4" style="width: 100%">
										<h4 id="StoreView_UsernameID`+ value.TimelineID +`" style="color: #7289da; margin: 0; font-size: 18px; font-weight: bold;"></h4>
										<h4 id="StoreView_DateTimeID`+ value.TimelineID +`" style="margin: 0; font-size: 12px; font-weight: bold;"></h4>

										<div id="StoreView_DescriptionID`+ value.TimelineID +`" class="mt-3 mb-3"></div>
										<div id="StoreView_LoaderID`+ value.TimelineID +`"></div>

										<div class="d-flex flex-row mt-3">	
											<button onclick="new Store().StoreView_PostButton(`+ value.TimelineID +`)" class="d-flex align-items-center justify-content-center pt-3 pb-3 rounded" title="Show Comment">Show Comment</button>
										</div>
									</div>
								</div>
							`)
							for(var value of data.TimelineArray) new Store().StoreView_ItemLoad(value.TimelineID)
						}
					}
					else alert(!data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_CartLoad = function() {
			var CartView_CashierLoad = $("#CartView_CashierLoad")
			CartView_CashierLoad.html('')
			var CartView_DepartmentLoad = $("#CartView_DepartmentLoad")
			CartView_DepartmentLoad.html('')

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_CartLoad", 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						var temp = 0

						if(data.is_DepartmentEmpty == true) CartView_DepartmentLoad.html('<h1 class="d-flex justify-content-center">No one in here. Except you.</h1>')
						else if(data.is_DepartmentEmpty == false) {
							StoreCart_DepartmentList = []
						
							for(var x in data.Cart_DepartmentArray) {
								CartView_DepartmentLoad.append(`
									<div id="CartDV_ItemID` +x+ `" class="d-flex flex-row border-bottom pl-4 pr-4 pt-2 pb-2 button-hover" style="width: 100%">
										<div class="d-flex align-items-center" style="width: 100%;">
											<div class="d-flex flex-column">
												<div style="font-size: 12px;">Item Name</div>
												<div style="margin-top: -5px; font-weight: normal;">` +data.Cart_DepartmentArray[x].StoreName+ `</div>
												</div>
										</div>
										<div class="d-flex align-items-center" style="min-width: 150px; max-width: 150px;">
											<div class="d-flex flex-column">
												<div style="font-size: 12px;">Item Price</div>
												<div style="margin-top: -5px; color: #375692; font-weight: normal;">` +data.Cart_DepartmentArray[x].StorePrice+ `</div>
											</div>
										</div>
										<div class="d-flex align-items-center" style="min-width: 150px; max-width: 150px;">
											<div class="d-flex flex-column">
												<div style="font-size: 12px;">Pre Total</div>
												<div id="CartDV_TotalID` +x+ `" class="red-text" style="margin-top: -5px; font-weight: normal;">` +data.Cart_DepartmentArray[x].PreTotal+ `</div>
											</div>
										</div>
										<div class="d-flex flex-row">
											<div class="d-flex flex-row">
												<input id="CartDV_QuantityboxID` +x+ `" type="number" disabled value="` +data.Cart_DepartmentArray[x].StoreQuantity+ `" class="d-flex align-items-center pl-4 pr-2 pt-2 pb-2 rounded" style="background: #e8d15f !important; min-width: 150px; max-width: 150px; color: #ffffff !important; font-size: 14px; font-weight: bold;">
												<div class="d-flex flex-row ml-2">
													<button onclick="new StoreCart().View_DRButton(` +x+ `, ` +data.Cart_DepartmentArray[x].StorePrice+ `)" id="StoreView_RemoveButton" class="material-icons p-2 rounded mr-1">remove</button>
													<button onclick="new StoreCart().View_DAButton(` +x+ `, ` +data.Cart_DepartmentArray[x].StorePrice+ `)" id="StoreView_AddButton" class="material-icons p-2 rounded companyBackground">add</button>

													<button onclick="new StoreCart().View_DDButton(` +data.Cart_DepartmentArray[x].StoreID+ `, ` +data.CartID+ `)" id="StoreView_AddButton" class="material-icons p-2 ml-4 rounded red">delete</button>
												</div>
											</div>
										</div>
									</div>
								`)
								StoreCart_DepartmentList.push({
									ArrayID : x,
									StoreID: data.Cart_DepartmentArray[x].StoreID,
									Price: data.Cart_DepartmentArray[x].StorePrice,
									Quantity: data.Cart_DepartmentArray[x].StoreQuantity
								})

								temp += data.Cart_DepartmentArray[x].PreTotal
							}
						}

						if(data.is_CashierEmpty == true) CartView_CashierLoad.html('<h1 class="d-flex justify-content-center">No one in here. Except you.</h1>')
						else if(data.is_CashierEmpty == false) {
							StoreCart_CashierList = []

							for(var x in data.Cart_CashierArray) {
								CartView_CashierLoad.append(`
									<div id="CartCV_ItemID` +x+ `" class="d-flex flex-row border-bottom pl-4 pr-4 pt-2 pb-2 button-hover" style="width: 100%">
										<div class="d-flex align-items-center" style="width: 100%;">
											<div class="d-flex flex-column">
												<div style="font-size: 12px;">Item Name</div>
												<div style="margin-top: -5px; font-weight: normal;">` +data.Cart_CashierArray[x].StoreName+ `</div>
											</div>
										</div>
										<div class="d-flex align-items-center" style="min-width: 150px; max-width: 150px;">
											<div class="d-flex flex-column">
												<div style="font-size: 12px;">Item Price</div>
												<div style="margin-top: -5px; color: #375692; font-weight: normal;">` +data.Cart_CashierArray[x].StorePrice+ `</div>
											</div>
										</div>
										<div class="d-flex align-items-center" style="min-width: 150px; max-width: 150px;">
											<div class="d-flex flex-column">
												<div style="font-size: 12px;">Pre Total</div>
												<div id="CartCV_TotalID` +x+ `" class="red-text" style="margin-top: -5px; font-weight: normal;">` +data.Cart_CashierArray[x].PreTotal+ `</div>
											</div>
										</div>
										<div class="d-flex flex-row">
											<div class="d-flex flex-row">
												<input id="CartCV_QuantityboxID` +x+ `" type="number" disabled value="` +data.Cart_CashierArray[x].StoreQuantity+ `" class="d-flex align-items-center pl-4 pr-2 pt-2 pb-2 rounded" style="background: #e8d15f !important; min-width: 150px; max-width: 150px; color: #ffffff !important; font-size: 14px; font-weight: bold;">
												<div class="d-flex flex-row ml-2">
													<button onclick="new StoreCart().View_CRButton(` +x+ `, ` +data.Cart_CashierArray[x].StorePrice+ `)" id="StoreView_RemoveButton" class="material-icons p-2 rounded mr-1">remove</button>
													<button onclick="new StoreCart().View_CAButton(` +x+ `, ` +data.Cart_CashierArray[x].StorePrice+ `)" id="StoreView_AddButton" class="material-icons p-2 rounded companyBackground">add</button>

													<button onclick="new StoreCart().View_CDButton(` +data.Cart_CashierArray[x].StoreID+ `, ` +data.CartID+ `)" id="StoreView_AddButton" class="material-icons p-2 ml-4 rounded red">delete</button>
												</div>
											</div>
										</div>
									</div>
								`)
								StoreCart_CashierList.push({
									ArrayID : x,
									StoreID: data.Cart_CashierArray[x].StoreID,
									Price: data.Cart_CashierArray[x].StorePrice,
									Quantity: data.Cart_CashierArray[x].StoreQuantity
								})

								temp += data.Cart_CashierArray[x].PreTotal
							}
						}

						$("#CartView_TotalLabel").text('P '+ temp)
						$("#StoreCV_ClearButton").attr('onclick', 'new StoreCart().View_ClearButton(' +data.CartID+ ')')
						$("#StoreCV_PurchaseButton").attr('onclick', 'new StoreCart().View_PurchaseButton(' +data.CartID+ ')')
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_RefreshButton = function() {
			new Store().View_ItemLoad()
			new Store().View_StudentLoad()
			new Store().View_DynamicLoad()
			new Store().View_PostLoad()
			new Store().View_CartLoad()
		}

		this.View_OpenButton = function() { $("#StoreView_TuitionArea").removeClass('hide') }

		this.View_CancelButton = function() {
			$("#StoreView_ButtonLoad").removeClass('hide')
			$("#StoreView_TuitionArea").addClass('hide')
		}

		this.View_TuitionButton = function() {
			var StoreTuition_Amountbox = $("#StoreTuition_Amountbox")
			var StoreView_TuitionButton = $("#StoreView_TuitionButton")

			if(StoreTuition_Amountbox.val() != "") {
				StoreView_TuitionButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Transaction/View_TuitionButton", 
					method: 'POST',
					data: {
				 		Amount: StoreTuition_Amountbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							

							$("#StoreView_DynamicArea").addClass('hide')
							
							new Store().View_CancelButton()
							new Store().View_ItemLoad()

							StoreView_TuitionButton.removeAttr('disabled')
						}
						else {
							alert(data.ErrorDisplay)

							StoreView_TuitionButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Error: Unexpected Error Occur!")

				 		StoreView_TuitionButton.removeAttr('disabled')
					}
				})
			}
			else alert("Error: Please Enter your Amount!")
		}

		this.StoreView_ItemLoad = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_ItemLoad?TimelineID="+id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						var DescriptionTemp = JSON.parse(data.TimelineDescription).Text.split("\n")
						var ImageTemp = JSON.parse(data.TimelineDescription).Image

						$("#StoreView_ImageID"+ id).attr('src', 'http://localhost/Ewallet/avatar/'+ data.TimelineImage)
						$("#StorePost_UserImage").attr('src', 'http://localhost/Ewallet/avatar/'+ data.TimelineImage)
						$("#StoreView_UsernameID"+ id).text(data.TimelineName)
						$("#StoreView_DateTimeID"+ id).text("Timeline # "+ data.DateRegister +" "+ data.TimeRegister)

						for(var splitter of JSON.parse(data.TimelineDescription).Text.split("\n")) {
							if(splitter != "") $("#StoreView_DescriptionID"+ id).append('<div style="word-break: break-all;">'+ splitter +'</div>')
							else $("#StoreView_DescriptionID"+ id).append('<br />')
						}

						if(JSON.parse(data.TimelineDescription).Image.length != 0) {
							for(var image of JSON.parse(data.TimelineDescription).Image) {
								var x = window.location.href.replace("/index.php/Access", "/storage/")+ image

								$("#StoreView_LoaderID"+ id).append('<img src="' +x+ '" width="100%">')
							}
						}
						
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Store().StoreView_ItemLoad(id)
				}
			})
		}

		this.StoreView_PostButton = function(id) {
			var StorePost_ViewArea = $("#StorePost_ViewArea")

			var StorePost_ImageLoader = $("#StorePost_ImageLoader")
			var StorePost_HostName = $("#StorePost_HostName")
			var StorePost_HostImage = $("#StorePost_HostImage")
			var StorePost_DateTime = $("#StorePost_DateTime")
			var StorePost_DescriptionLoader = $("#StorePost_DescriptionLoader")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_PostButton?TimelineID=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						StorePost_ViewArea.removeClass('hide')

						StorePost_DescriptionLoader.html('')
						StorePost_ImageLoader.html('')

						StorePost_HostName.text(data.PostHostname)
						StorePost_HostImage.attr('src', window.location.href.replace("/index.php/Access", "")+ "/avatar/" +data.PostHostimage)
						StorePost_DateTime.text("Timeline # "+ data.PostDT)

						for(var splitter of data.PostText.split("\n")) {
							if(splitter != "") StorePost_DescriptionLoader.append('<div style="word-break: break-all;">'+ splitter +'</div>')
							else StorePost_DescriptionLoader.append('<br />')
						}

						if(data.PostImage.length != 0) {
							data.PostImage.forEach(function(element, index) {
								var x = window.location.href.replace("/index.php/Access", "/storage/")+ data.PostImage[index]

								StorePost_ImageLoader.append('<div id="StoreView_HostImageID' +index+ '" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%"><img src="' +x+ '" width="100%" /></div>')
							})

							StoreView_ImageLast = data.PostImage.length
						}
						else StorePost_ImageLoader.html('<h4 class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">No Image!</h4>')

						$("#StoreComment_SendButton").attr('onclick', 'new StoreComment().Create_SendButton(' +data.PostID+ ')')

						new StorePost().View_CommentLoad(data.PostID)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!\n Please Try Again!")
				}
			})
		}

		this.View_DynamicButton = function(id) {
			$("#StoreView_TuitionArea").addClass('hide')
			$("#StoreView_DynamicArea").removeClass('hide')
			$("#StoreView_DynamicButton").attr('onclick', 'new Store().DA_DynamicButton(' +id+ ')')

			var StoreView_DisplayLabel = $("#StoreView_DisplayLabel")

			$.ajax({
				url: window.location.href.replace('/Access', '')+ "/Transaction/View_PriceButton?id="+ id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#StoreView_NameLabel").text(data.StoreTitle)
						$("#StoreView_PriceLabel").text("P "+ data.StorePrice)
						$("#StoreView_TotalLabel").text("P "+ data.StorePrice)
						$("#StoreView_RemoveButton").attr('onclick', 'new Store().View_RemoveButton(' +data.StorePrice+ ')')
						$("#StoreView_AddButton").attr('onclick', 'new Store().View_AddButton(' +data.StorePrice+ ')')

						if(data.StoreQuantity == "0") $("#StoreView_QuantityArea").addClass('hide')
						else $("#StoreView_QuantityArea").removeClass('hide')

						$("#StoreView_Quantitybox").val(1)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_AddButton = function(price) {
			$("#StoreView_Quantitybox").val(parseInt($("#StoreView_Quantitybox").val()) + 1)
			$("#StoreView_TotalLabel").text("P "+ (parseInt($("#StoreView_Quantitybox").val()) * price) )
		}

		this.View_RemoveButton = function(price) {
			if(parseInt($("#StoreView_Quantitybox").val()) == 1) $("#StoreView_Quantitybox").val(1)
			else $("#StoreView_Quantitybox").val(parseInt($("#StoreView_Quantitybox").val()) - 1)

			$("#StoreView_TotalLabel").text("P "+ (parseInt($("#StoreView_Quantitybox").val()) * price) )
		}

		this.DA_CancelButton = function() {
			$("#StoreView_DynamicArea").addClass('hide')
			$("#StoreView_TuitionArea").addClass('hide')
		}

		this.DA_DynamicButton = function(id) {
			var StoreView_DynamicButton = $("#StoreView_DynamicButton")
			var StoreView_Quantitybox = $("#StoreView_Quantitybox")
			StoreView_DynamicButton.attr('disabled', 'disabled')

			if(StoreView_Quantitybox.val() != 0) {
				$.ajax({
					url: window.location.href.replace('/Access', '')+ "/Transaction/View_DynamicButton?id="+ id +"&quantity=" + StoreView_Quantitybox.val(), 
					method: 'GET',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							StoreView_DynamicButton.removeAttr('disabled')
							StoreView_Quantitybox.val(1)

							new Store().View_CartLoad()
							new Store().DA_CancelButton()
						}
						else {
							StoreView_DynamicButton.removeAttr('disabled')

							alert(data.ErrorDisplay)
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		StoreView_DynamicButton.removeAttr('disabled')

				 		alert("Error: Unexpected Error Occur!")
					}
				})
			}
			else alert("Set Quantity to Zero is Invalid!")
		}

		this.View_CartButton = function() { $("#StoreView_CartArea").removeClass('hide') }
	}

	function StoreCart() {
		this.View_CloseButton = function() { $("#StoreView_CartArea").addClass('hide') }
		// Department
		this.View_DRButton = function(id, price) {
			if(parseInt($("#CartDV_QuantityboxID"+ id).val()) == 1) $("#CartDV_QuantityboxID"+ id).val(1)
			else $("#CartDV_QuantityboxID"+ id).val(parseInt($("#CartDV_QuantityboxID"+ id).val()) - 1)

			$("#CartDV_TotalID"+ id).text("P "+ (parseInt($("#CartDV_QuantityboxID"+ id).val()) * price) )

			StoreCart_DepartmentList[id].Quantity = parseInt($("#CartDV_QuantityboxID"+ id).val())
			
			var temp = 0
			for(var x in StoreCart_DepartmentList) temp += StoreCart_DepartmentList[x].Quantity * StoreCart_DepartmentList[x].Price
			for(var x in StoreCart_CashierList) temp += StoreCart_CashierList[x].Quantity * StoreCart_CashierList[x].Price

			$("#CartView_TotalLabel").text('P '+ temp)
		}

		this.View_DAButton = function(id, price) {
			$("#CartDV_QuantityboxID"+ id).val(parseInt($("#CartDV_QuantityboxID"+ id).val()) + 1)
			$("#CartDV_TotalID"+ id).text("P "+ (parseInt($("#CartDV_QuantityboxID"+ id).val()) * price) )

			StoreCart_DepartmentList[id].Quantity = parseInt($("#CartDV_QuantityboxID"+ id).val())

			var temp = 0
			for(var x in StoreCart_DepartmentList) temp += StoreCart_DepartmentList[x].Quantity * StoreCart_DepartmentList[x].Price
			for(var x in StoreCart_CashierList) temp += StoreCart_CashierList[x].Quantity * StoreCart_CashierList[x].Price

			$("#CartView_TotalLabel").text('P '+ temp)
		}

		this.View_DDButton = function(StoreID, id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_DDButton?StoreID=" +StoreID, 
				method: 'POST',
				data: { id:id },
				dataType: 'json',
				success: function(data) {
					if(!data.isError) new Store().View_CartLoad()
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Unexpected Error Occur!")
				}
			})
		}
		// Cashier
		this.View_CRButton = function(id, price) {
			if(parseInt($("#CartCV_QuantityboxID"+ id).val()) == 1) $("#CartCV_QuantityboxID"+ id).val(1)
			else $("#CartCV_QuantityboxID"+ id).val(parseInt($("#CartCV_QuantityboxID"+ id).val()) - 1)

			$("#CartCV_TotalID"+ id).text("P "+ (parseInt($("#CartCV_QuantityboxID"+ id).val()) * price) )

			StoreCart_CashierList[id].Quantity = parseInt($("#CartCV_QuantityboxID"+ id).val())
			
			var temp = 0
			for(var x in StoreCart_DepartmentList) temp += StoreCart_DepartmentList[x].Quantity * StoreCart_DepartmentList[x].Price
			for(var x in StoreCart_CashierList) temp += StoreCart_CashierList[x].Quantity * StoreCart_CashierList[x].Price

			$("#CartView_TotalLabel").text('P '+ temp)
		}

		this.View_CAButton = function(id, price) { 
			$("#CartCV_QuantityboxID"+ id).val(parseInt($("#CartCV_QuantityboxID"+ id).val()) + 1)
			$("#CartCV_TotalID"+ id).text("P "+ (parseInt($("#CartCV_QuantityboxID"+ id).val()) * price) )

			StoreCart_CashierList[id].Quantity = parseInt($("#CartCV_QuantityboxID"+ id).val())
			
			var temp = 0
			for(var x in StoreCart_DepartmentList) temp += StoreCart_DepartmentList[x].Quantity * StoreCart_DepartmentList[x].Price
			for(var x in StoreCart_CashierList) temp += StoreCart_CashierList[x].Quantity * StoreCart_CashierList[x].Price

			$("#CartView_TotalLabel").text('P '+ temp)
		}

		this.View_CDButton = function(StoreID, id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_CDButton?StoreID=" +StoreID, 
				method: 'POST',
				data: { id:id },
				dataType: 'json',
				success: function(data) {
					if(!data.isError) new Store().View_CartLoad()
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Unexpected Error Occur!")
				}
			})
		}

		this.View_ClearButton = function(CartID) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_ClearButton?id="+ CartID,
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) new Store().View_CartLoad()
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Unexpected Error Occur!")
				}
			})
		}

		this.View_PurchaseButton = function(CartID) {
			var StoreCV_PurchaseButton = $("#StoreCV_PurchaseButton")
			StoreCV_PurchaseButton.attr('disabled', 'disabled')
			var ViewReceipt_CashierLoad = $("#ViewReceipt_CashierLoad")
			ViewReceipt_CashierLoad.html('')
			var ViewReceipt_DepartmentLoad = $("#ViewReceipt_DepartmentLoad")
			ViewReceipt_DepartmentLoad.html('')

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_PurchaseButton?CartID="+ CartID,
				method: 'POST',
				data: {
					StoreCart_CashierList: JSON.stringify(StoreCart_CashierList),
					StoreCart_DepartmentList: JSON.stringify(StoreCart_DepartmentList)
				},
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						StoreCV_PurchaseButton.removeAttr('disabled')

						$("#View_CartArea").addClass('hide')
						$("#View_ReceiptArea").removeClass('hide')

						$("#ViewReceipt_IDLabel").text(data.ReceiptID)
						$("#ViewReceipt_TimelineLabel").text(data.Timeline)

						$("#ViewReceipt_STLabel").text(data.SubTotal)
						$("#ViewReceipt_CashLabel").text(data.Cash)
						$("#ViewReceipt_TotalLabel").text(data.Total)

						for(var x in data.ReceiptArray) {
							if(data.ReceiptArray[x].Type == "CASHIER") {
								ViewReceipt_CashierLoad.append(`
									<div class="d-flex flex-row pl-4 pr-4 pt-1 pb-1" style="width: 100%">
										<div class="pl-4" style="width: 100%; color: #375692;">` +data.ReceiptArray[x].Name+ `</div>
										<div class="ml-2 mr-2">` +data.ReceiptArray[x].Price+ `</div>
										<div class="ml-2 mr-2">x</div>
										<div class="ml-2 mr-2 red-text">` +data.ReceiptArray[x].Quantity+ `</div>
										<div class="ml-2 mr-5">=</div>

										<div class="ml-5">` +data.ReceiptArray[x].PreTotal+ `</div>
									</div>
								`)
							}
							else {
								ViewReceipt_DepartmentLoad.append(`
									<div class="d-flex flex-row pl-4 pr-4 pt-1 pb-1" style="width: 100%">
										<div class="pl-4" style="width: 100%; color: #375692;">` +data.ReceiptArray[x].Name+ `</div>
										<div class="ml-2 mr-2">` +data.ReceiptArray[x].Price+ `</div>
										<div class="ml-2 mr-2">x</div>
										<div class="ml-2 mr-2 red-text">` +data.ReceiptArray[x].Quantity+ `</div>
										<div class="ml-2 mr-5">=</div>

										<div class="ml-5">` +data.ReceiptArray[x].PreTotal+ `</div>
									</div>
								`)
							}
						}

						new Store().View_RefreshButton()
					}
					else {
						alert(data.ErrorDisplay)

						StoreCV_PurchaseButton.removeAttr('disabled')
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Unexpected Error Occur!")

			 		StoreCV_PurchaseButton.removeAttr('disabled')
				}
			})
		}

		this._View_CloseButton = function() {
			$("#StoreView_CartArea, #View_ReceiptArea").addClass('hide')
			$("#View_CartArea").removeClass('hide')
		}
	}

	function StorePost() {
		this.View_CommentLoad = function(id) {
			var StorePost_CommentLoader = $("#StorePost_CommentLoader")

			StorePost_CommentLoader.html('')

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_CommentLoad?TimelineID="+ id,
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError){
						if(data.CommentArray.length != 0) {
							for(var x of data.CommentArray) {
								if(<?php echo $AccountID ?> == x.AccountID) {
									StorePost_CommentLoader.append( `
										<div id="StoreComment_ItemID` +x.CommentID+ `" class="d-flex flex-row p-3 border-bottom" style="width: 100%;">
											<img id="StoreComment_ImageID` +x.CommentID+ `" class="rounded-circle" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
											<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
												<h4 id="StoreComment_NameID` +x.CommentID+ `" style="margin: 0; font-size: 14px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>

												<div id="StoreComment_LoaderID` +x.CommentID+ `" class="mt-3 mb-3"></div>
												<div class="d-flex flex-row" style="width: 100%">
													<div style="width: 100%"></div>

													<a id="StoreComment_DeleteButtonID` +x.CommentID+ `" onclick="new StoreComment().View_DeleteButton(` +x.CommentID+ `)" class="material-icons red-text ml-2">delete</a>
												</div>
											</div>
										</div>
									`)
								}
								else {
									StorePost_CommentLoader.append( `
										<div id="StoreComment_ItemID` +x.CommentID+ `" class="d-flex flex-row p-3 border-bottom" style="width: 100%;">
											<img id="StoreComment_ImageID` +x.CommentID+ `" class="rounded-circle" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
											<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
												<h4 id="StoreComment_NameID` +x.CommentID+ `" style="margin: 0; font-size: 14px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>

												<div id="StoreComment_LoaderID` +x.CommentID+ `" class="mt-3 mb-3"></div>
											</div>
										</div>
									`)
								}
							}

							for(var x of data.CommentArray) new StoreComment().View_ItemLoad(x.CommentID)
						}
						else StorePost_CommentLoader.append('<h4 class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">No Comment Yet!</h4>')
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Post().View_CommentLoad(id)
				}
			})
		}

		this.View_BackButton = function() {
			$("#StorePost_ViewArea").addClass('hide')
			$("#StoreView_HomeArea").removeClass('hide')
		}

		this.View_PreviewButton = function() {
			StoreView_ImageCurrent -= 1 
			if(StoreView_ImageCurrent == -1) StoreView_ImageCurrent = StoreView_ImageLast - 1
			

			$("#StoreView_HostImageID"+ StoreView_ImageCurrent)[0].scrollIntoView({
			    behavior: "smooth",
				block: "start"
			})
		}

		this.View_ForwardButton = function() {
			StoreView_ImageCurrent += 1
			if(StoreView_ImageCurrent == StoreView_ImageLast) StoreView_ImageCurrent = 0

			$("#StoreView_HostImageID"+ StoreView_ImageCurrent)[0].scrollIntoView({
			    behavior: "smooth", // or "auto" or "instant"
				block: "start" // or "end"
			})
		}
	}

	function StoreComment() {
		this.View_ItemLoad = function(id) {
			var StoreComment_ItemID = $("#StoreComment_ItemID"+ id)
			var StoreComment_NameID = $("#StoreComment_NameID"+ id)
			var StoreComment_ImageID = $("#StoreComment_ImageID"+ id)
			var StoreComment_MentionButtonID = $("#StoreComment_MentionButtonID"+ id)
			var StoreComment_DeleteButtonID = $("#StoreComment_DeleteButtonID"+ id)

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Comment/View_ItemLoad?CommentID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						for(var splitter of data.CommentText.split("\n")) {
							if(splitter != "") {
								var HTML = ''

								for(var space of splitter.split(" ")) {
									if(space.split('@').length == 2) {
										if(<?php echo $AccountID; ?> == space.split('#')[0].split("@")[1]) StoreComment_ItemID.addClass('blue').css('color', 'white');
									}

									HTML += "<span class='mr-1'>" +space+ "</span>"
								}
								

								$("#StoreComment_LoaderID"+ id).append('<div style="font-size: 12px; word-break: break-all;">'+ HTML +'</div>')
							}
							else $("#StoreComment_LoaderID"+ id).append('<br />')
						}

						StoreComment_NameID.text(data.CommentMention + data.CommentName)
						StoreComment_ImageID.attr('src', window.location.href.replace("/index.php/Access", "")+ "/avatar/"+ data.CommetImage)
						StoreComment_MentionButtonID.attr('onclick', "new StoreComment().View_MentionButton('"+ data.CommentMention +"')")
						StoreComment_DeleteButtonID.attr('onclick', 'new StoreComment().View_DeleteButton('+ data.CommentID +')')

					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new StoreComment().View_ItemLoad(id)
				}
			})
		}

		this.Create_SendButton = function(id) {
			var StoreComment_Writebox = $("#StoreComment_Writebox")
			var StorePost_CommentLoader = $("#StorePost_CommentLoader")

			if(StoreComment_Writebox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Comment/Create_SendButton?TimelineID=" +id,
					method: 'POST',
					data: {
				 		CommentDescription:StoreComment_Writebox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							StoreComment_Writebox.val('')

							new Store().StoreView_PostButton(id)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else alert("Error: Commentbox is empty!")
		}

		this.View_MentionButton = function(id) {
			$("#StoreComment_Writebox").append(id)
		}

		this.View_DeleteButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Comment/View_DeleteButton?CommentID="+ id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) $("#StoreComment_ItemID"+ id).remove()
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur\nPlease Try Again!")
				}
			})
		}

	}
</script>