<div id="App_RecordsArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div class="d-flex flex-row" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div id="ViewArea" class="companyLabel" style="width: 100%; height: 100%">
			<div class="">
				<div class="pl-4 pr-4 pt-3 pb-3 mb-4 shadow-sm" style="min-width: 125px; font-weight: bold;">TRANSACTION RECORD</div>
				<div class="d-flex flex-row mb-1 ml-4 mr-4">
					<input id="View_Searchbox" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1" style="background: #eeeeee !important; width: 100%;" placeholder="Search Type or Timeline">
					<button onclick="new StudentRecord().View_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Search</button>
					<button onclick="new StudentRecord().View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Refresh</button>
					<div style="width: 100%"></div>
					<select id="View_ItemButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="200">200</option>
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="999999999999">All (This is might you break your Browser or CPU)</option>
					</select>
					<button onclick="new StudentRecord().View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Load</button>
				</div>
				<table class="table border-0 companyLabel">
					<thead>
						<tr class="border-0">
							<!-- <td>Student Name</td> -->
							<td class="border-0" style="color: #375692; font-weight: bold;">Transaction Name</td>
							<td class="border-0" style="color: #e91e63; min-width: 150px; max-width: 150px; font-weight: bold;">Transaction Type</td>
							<td class="border-0" style="min-width: 125px; max-width: 125px; font-weight: bold;">Timeline</td>
						</tr>
					</thead>
					<tbody id="ViewTransaction_RecordLoad" style="font-weight: bold;">
						
					</tbody>
				</table>
			</div>
		</div>
		<!-- Basic Info Area -->
		<div id="BankView_BasicArea" class="d-flex flex-column hide" style="min-width: 350px; max-width: 350px; height: 100%; margin-right: -350px; overflow-y: scroll;">
			<div class="d-flex flex-column justify-content-center pt-3 pb-3 companyBackground companyForeground">
				<div class="d-flex justify-content-center mb-3">
					<img id="BankView_Image" class="rounded-circle" width="125px" height="125px">
				</div>
				<div id="BankView_FNLabel" class="d-flex justify-content-center" style="font-weight: bold;">XXXX, XXXXXXX X.</div>
				<div id="BankView_CYLabel" class="d-flex justify-content-center" style="margin-top: -5px; font-size: 12px;">XXXX - 4</div>
				<div id="BankView_IDLabel" class="d-flex justify-content-center mt-4" style="margin-top: -5px; font-size: 12px;">ID#1234567890</div>
			</div>

			<div>
				<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 mb-4 shadow-sm" style="width: 100%; font-weight: bold;">
					<div>RECEIPT</div>
					<div id="BankView_TransactionID" class="d-flex justify-content-end" style="width: 100%"># XXXXXXX</div>
				</div>

				<div class="pl-4 pr-4 mb-4">
					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Item Name</div>
					<div id="BankView_NameLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-2 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Item Type</div>
					<div id="BankView_TypeLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-2 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Item Price</div>
					<div id="BankView_PriceLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-2 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Sub Total</div>
					<div id="BankView_STLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="rounded mt-2 mb-2" style="border: 1px solid #375692"></div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Cash</div>
					<div id="BankView_CashLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-2 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Total</div>
					<div id="BankView_TotalLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-2 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Balance</div>
					<div id="BankView_BalanceLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<div class="rounded mt-4 mb-4" style="border: 1px solid #375692"></div>

					<div class="ml-2 mb-1" style="font-size: 12px; font-weight: bold;">Available Balance</div>
					<div id="BankView_ABLabel" class="border-0 rounded pt-2 pb-2 pl-4 pr-4 mb-2 companyInput" style="width: 100%;">XXX-XXX-XXX</div>

					<button id="BankView_AllButton" class="pt-2 pb-2 pl-4 pr-4 rounded mb-1">All Transaction</button>
					<button id="BankView_BackButton" onclick="new StudentRecord().View_BackButton()" class="pt-2 pb-2 pl-4 pr-4 rounded red">Hide</button>
				</div>
			</div>
		</div>
		<!-- End of Basic Info Area -->
	</div>
</div>

<script type="text/javascript">
	new StudentRecord().View_RecordLoad(10)

	function StudentRecord() {
		this.View_RecordLoad = function(item) {
			$("#ViewTransaction_RecordLoad").html('')
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_RecordLoad?myItem="+ item, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(!data.isEmpty) data.TransactionArray.forEach( function(element, index) {
							new StudentRecord().View_RecordItem(data.TransactionArray[index])
						})
						else $("#ViewTransaction_RecordLoad").append(`
							<tr>
								<td class="border-0" style="word-break: break-all;">N / A</td>
								<td class="border-0" style="word-break: break-all;">N / A</td>
								<td class="border-0" style="word-break: break-all;">N / A</td>
							</tr>
						`)
					}
					// else new Record().View_RecordLoad(item)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Record().View_RecordLoad(item)
				}
			})
		}

		this.View_RecordItem = function(id) {
			var ViewTransaction_RecordLoad = $("#ViewTransaction_RecordLoad")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_RecordItem?id=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						ViewTransaction_RecordLoad.append(`
							<tr onclick="new StudentRecord().View_InfoButton(` +id+ `)" id="ViewTransaction_RecordID` +id+ `" class="border-bottom button-hover" title="Click for more info!" style="cursor: pointer">
								<td class="border-0" style="color: #375692; word-break: break-all;">`+ data.TransactionName +`</td>
								<td class="border-0" style="color: #e91e63; word-break: break-all;">`+ data.TransactionType +`</td>
								<td class="border-0 companyLabel" style="word-break: break-all; font-weight: bold">`+ data.Timeline +`</td>
							</tr>
						`)
						$('#ViewTransaction_RecordID'+ id).tooltip()
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_SearchButton = function() {
			var View_Searchbox = $("#View_Searchbox")

			$("#ViewTransaction_RecordLoad").html('')
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_SearchButton?search="+ View_Searchbox.val(), 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(!data.isEmpty) data.TransactionArray.forEach( function(element, index) {
							new StudentRecord().View_RecordItem(data.TransactionArray[index])
						})
						else $("#ViewTransaction_RecordLoad").append(`
							<tr>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
							</tr>
						`)

						View_Searchbox.val('')
					}
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_RefreshButton = function() { new StudentRecord().View_RecordLoad($("#View_ItemButton option:selected").val()) }

		this.View_ItemButton = function() { new StudentRecord().View_RecordLoad($("#View_ItemButton option:selected").val()) }

		this.View_InfoButton = function(id) {
			var BankView_BasicArea = $("#BankView_BasicArea")

			var BankView_Image = $("#BankView_Image")
			var BankView_FNLabel = $("#BankView_FNLabel")
			var BankView_CYLabel = $("#BankView_CYLabel")
			var BankView_IDLabel = $("#BankView_IDLabel")

			var BankView_TransactionID = $("#BankView_TransactionID")
			var BankView_NameLabel = $("#BankView_NameLabel")
			var BankView_TypeLabel = $("#BankView_TypeLabel")
			var BankView_PriceLabel = $("#BankView_PriceLabel")
			var BankView_STLabel = $("#BankView_STLabel")
			var BankView_CashLabel = $("#BankView_CashLabel")
			var BankView_TotalLabel = $("#BankView_TotalLabel")
			var BankView_BalanceLabel = $("#BankView_BalanceLabel")

			var BankView_ABLabel = $("#BankView_ABLabel")

			var BankView_AllButton = $("#BankView_AllButton")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_InfoButton?id=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						BankView_BasicArea.css({
							'margin-right': '0px',
							'transition-duration': '.5s'
						}).removeClass('hide')

						BankView_Image.attr('src', window.location.href.replace("index.php/Access", "avatar/")+ data.StudentImage)
						BankView_FNLabel.text(data.StudentName)
						BankView_CYLabel.text(data.StudentCY)
						BankView_IDLabel.text("ID#"+ data.StudentID)

						BankView_TransactionID.text("# "+ id)
						BankView_NameLabel.text(data.TransactionName)
						BankView_TypeLabel.text(data.TransactionType)
						BankView_PriceLabel.text("P "+ data.TransactionPrice)
						BankView_STLabel.text("P "+ data.TransactionST)
						BankView_CashLabel.text("P "+ data.TransactionCash)
						BankView_TotalLabel.text("P "+ data.TransactionTotal)
						BankView_BalanceLabel.text("P "+ data.TransactionBalance)

						BankView_ABLabel.text("P "+ data.StudentBalance)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Unexpected Error Occur!")
				}
			})
		}

		this.View_BackButton = function() {
			$("#BankView_BasicArea").css({
				'margin-right': '-350px',
				'transition-duration': '.5s'
			}).animate({ scrollTop: 0 })
		}
	}
</script>