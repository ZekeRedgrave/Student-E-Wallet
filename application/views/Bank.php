<div id="App_BankArea" class="d-flex flex-column" style="width:100%; height: 100%">
	<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<!-- Deposits Area -->
		<div id="DepositsArea" class="hide">
			<div id="Deposits_FormArea" class=" container mt-5">
				<h4 class="mb-5">Deposits</h4>

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
				<input id="DepositsCreate_Studentbox" class="form-control mb-2" type="number" placeholder="XXX-XXX-XXX">

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Amount</h4>
				<input onkeypress="new Deposits().Create_AmountKey(this)" onkeyup="new Deposits().Create_AmountKey(this)" onkeydown="new Deposits().Create_AmountKey(this)" id="DepositsCreate_Amountbox" class="form-control mb-2" type="number" placeholder="XXX-XXX-XXX">

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Fee</h4>
					<h4 id="DepositsCreate_FeeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>
				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Sub Total</h4>
					<h id="DepositsCreate_STLabel"4 class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
				<input id="DepositsCreate_Cashbox" class="form-control mb-2" type="number" placeholder="XXX-XXX-XXX">

				<button onclick="new Deposits().Create_NextButton()" class="form-control mb-1" style="min-width: 10%; max-width: 10%">Next</button>
				<button onclick="new Deposits().Create_BackButton()" class="form-control" style="min-width: 10%; max-width: 10%">Cancel</button>
			</div>
			<div id="Deposits_DoneArea" class=" container mt-5 hide">
				<h4 class="mb-5">Deposits</h4>

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
					<h4 id="DepositsCreate_CashLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row align-items-center form-control mb-5">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Total</h4>
					<h4 id="DepositsCreate_TotalLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Change</h4>
					<h4 id="DepositsCreate_ChangeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<button onclick="new Deposits().Create_DoneButton()" class="form-control" style="min-width: 10%; max-width: 10%">Done</button>
			</div>
		</div>
		<!-- End of Deposits Area -->
		<!-- Redeem Area -->
		<div id="RedeemArea" class="hide">
			<div id="Redeem_FormArea" class="container mt-5">
				<h4 class="mb-5">Make Redeem Gift</h4>

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
				<input id="RedeemCreate_Studentbox" class="form-control mb-2" type="number" placeholder="XXX-XXX-XXX">

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Email(Optional)</h4>
				<div class="border p-2 mb-2">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">From</h4>
					<input id="RedeemCreate_FEbox" class="form-control mb-2" placeholder="XXXXX@XXXX.XXX">

					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">To</h4>
					<input id="RedeemCreate_TEbox" class="form-control" placeholder="XXXXX@XXXX.XXX">
				</div>

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Amount</h4>
				<input onkeypress="new Redeem().Create_AmountKey(this)" onkeyup="new Redeem().Create_AmountKey(this)" onkeydown="new Redeem().Create_AmountKey(this)" id="RedeemCreate_Amountbox" class="form-control mb-2" type="number" placeholder="XXX-XXX-XXX">

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Fee</h4>
					<h4 id="RedeemCreate_FeeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>
				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Sub Total</h4>
					<h id="RedeemCreate_STLabel"4 class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
				<input id="RedeemCreate_Cashbox" class="form-control mb-2" type="number" placeholder="XXX-XXX-XXX">

				<button onclick="new Redeem().Create_NextButton()" class="form-control mb-1" style="min-width: 10%; max-width: 10%">Next</button>
				<button onclick="new Redeem().Create_BackButton()" class="form-control" style="min-width: 10%; max-width: 10%">Cancel</button>
			</div>
			<div id="Redeem_DoneArea" class=" container mt-5 hide">
				<h4 class="mb-5">Deposits</h4>

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
					<h4 id="RedeemCreate_CashLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row align-items-center form-control mb-5">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Total</h4>
					<h4 id="RedeemCreate_TotalLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Change</h4>
					<h4 id="RedeemCreate_ChangeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row align-items-center form-control mb-2">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Redeem Gift Code</h4>
					<h4 id="RedeemCreate_CodeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">XXX-XXX-XXX</h4>
				</div>

				<button onclick="new Deposits().Create_DoneButton()" class="form-control" style="min-width: 10%; max-width: 10%">Done</button>
			</div>
		</div>
		<!-- End of Redeem Area -->
		<!-- View Area -->
		<div id="ViewArea" class="">
			<div class="mt-5">
				<div class="d-flex flex-row mb-5 ml-1">
					<button onclick="new Bank().View_TopupButton()" class="form-control mr-1" style="min-width: 20%; max-width: 20%">Top-ups</button>
					<button onclick="new Bank().View_RedeemButton()" class="form-control mr-1" style="min-width: 20%; max-width: 20%">Gift Code</button>
				</div>

				<h4 class="m-0 p-0 ml-3" style="min-width: 125px; font-size: 14px; font-weight: bold;">Transaction Record</h4>
				<div class="d-flex flex-row mb-1 ml-1 mr-1">
					<input id="View_Searchbox" type="number" class="form-control" placeholder="Search Student ID" style="min-width: 250px;">
					<button onclick="new Record().View_SearchButton()" class="form-control ml-1" style="min-width: 100px; max-width: 100px;">Search</button>
					<button onclick="new Record().View_RefreshButton()" class="form-control ml-1" style="min-width: 100px; max-width: 100px;">Refresh</button>
					<div style="width: 100%"></div>
					<select onclick="new Record().View_ItemButton()" id="View_ItemButton" class="custom-select form-control ml-1" style="max-width: 100px;">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="200">200</option>
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="999999999999">All (This is might you break your Browser or CPU)</option>
					</select>
				</div>
				<table class="table">
					<thead>
						<tr>
							<td>Student Name</td>
							<td class="text-center" style="min-width: 150px; max-width: 150px;">Transaction Type</td>
							<td>Transaction Amount</td>
							<td style="min-width: 125px; max-width: 125px;">Transaction Fee</td>
							<td style="min-width: 125px; max-width: 125px;">Cash</td>
							<td style="min-width: 125px; max-width: 125px;">Timeline</td>
						</tr>
					</thead>
					<tbody id="ViewTransaction_RecordLoad">
						
					</tbody>
				</table>
			</div>
		</div>
		<!-- End of View Area -->
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		new Record().View_RecordLoad(10)
	})

	function Bank() {
		this.View_TopupButton = function() {
			$("#DepositsArea").removeClass('hide')
			$("#ViewArea").addClass('hide')
		}

		this.View_RedeemButton = function() {
			$("#RedeemArea").removeClass('hide')
			$("#ViewArea").addClass('hide')
		}
	}

	function Record() {
		this.View_RecordLoad = function(item) {
			$("#ViewTransaction_RecordLoad").html('')
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Transaction/View_RecordLoad?item="+ item, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						if(!data.isEmpty) data.TransactionArray.forEach( function(element, index) {
							new Record().View_RecordItem(data.TransactionArray[index])
						})
						else $("#ViewTransaction_RecordLoad").append(`
							<tr>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
								<td style="word-break: break-all;">N / A</td>
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
						var HTML = `
							<tr>
								<td style="word-break: break-all;">`+ data.StudentName +`</td>
								<td style="word-break: break-all;">`+ data.TransactionType +`</td>
								<td style="word-break: break-all;">`+ data.TransactionAmount +`</td>
								<td style="word-break: break-all;">`+ data.TransactionFee +`</td>
								<td style="word-break: break-all;">`+ data.Cash +`</td>
								<td style="word-break: break-all;">`+ data.Timeline +`</td>
							</tr>
						`

						ViewTransaction_RecordLoad.append(HTML)
					}
					else;
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.View_ItemButton = function() {
			$("#View_ItemButton").change(new Record().View_RecordLoad($("#View_ItemButton option:selected").val()))
		}

		this.View_SearchButton = function() {
			var View_Searchbox = $("#View_Searchbox")
			var ViewTransaction_RecordLoad = $("#ViewTransaction_RecordLoad")
			ViewTransaction_RecordLoad.html('')

			if(View_Searchbox.val() != "") {
				View_Searchbox.change(function(event) {
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Transaction/View_SearchButton?id=" +View_Searchbox.val(), 
						method: 'POST',
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								for(var x in data.TransactionArray) {
									ViewTransaction_RecordLoad.append(`
										<tr>
											<td style="word-break: break-all;">`+ data.TransactionArray[x].StudentName +`</td>
											<td style="word-break: break-all;">`+ data.TransactionArray[x].TransactionType +`</td>
											<td style="word-break: break-all;">`+ data.TransactionArray[x].TransactionAmount +`</td>
											<td style="word-break: break-all;">`+ data.TransactionArray[x].TransactionFee +`</td>
											<td style="word-break: break-all;">`+ data.TransactionArray[x].Cash +`</td>
											<td style="word-break: break-all;">`+ data.TransactionArray[x].Timeline +`</td>
										</tr>
									`)
								}
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))
						}
					})
				})
			}
			else new Record().View_RecordLoad($("#View_ItemButton option:selected").val())
		}

		this.View_RefreshButton = function() {
			new Record().View_RecordLoad($("#View_ItemButton option:selected").val())
		}
	}

	function Deposits() {
		this.Create_AmountKey = function(e) {
			var intKey = e.which || e.keyCode

			var DepositsCreate_Amountbox = $("#DepositsCreate_Amountbox")
			var DepositsCreate_FeeLabel = $("#DepositsCreate_FeeLabel")
			var DepositsCreate_STLabel = $("#DepositsCreate_STLabel")

			if(DepositsCreate_Amountbox.val() != "") {
				var Fee = '1'

				if(DepositsCreate_Amountbox.val().length >= 2) for (var i = 2; i < DepositsCreate_Amountbox.val().length; i++) Fee += '0'
				if(DepositsCreate_Amountbox.val().length == 1) Fee = '0'
				DepositsCreate_FeeLabel.text('P '+ Fee)

				Fee = parseInt(Fee) + parseInt(DepositsCreate_Amountbox.val())
				DepositsCreate_STLabel.text('P '+ Fee)
			}
			else {
				DepositsCreate_FeeLabel.text('P XXXX.XX')
				DepositsCreate_STLabel.text('P XXXX.XX')
			}
		}

		this.Create_NextButton = function() {
			var Deposits_FormArea = $("#Deposits_FormArea")
			var DepositsCreate_Studentbox = $("#DepositsCreate_Studentbox")
			var DepositsCreate_Amountbox = $("#DepositsCreate_Amountbox")
			var DepositsCreate_Cashbox = $("#DepositsCreate_Cashbox")

			var Deposits_DoneArea = $("#Deposits_DoneArea")
			var DepositsCreate_CashLabel = $("#DepositsCreate_CashLabel")
			var DepositsCreate_TotalLabel = $("#DepositsCreate_TotalLabel")
			var DepositsCreate_ChangeLabel = $("#DepositsCreate_ChangeLabel")

			if(DepositsCreate_Studentbox.val() != "" && DepositsCreate_Amountbox.val() != "" && DepositsCreate_Cashbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Transaction/Deposits_NextButton", 
					method: 'POST',
					data: {
						StudentID: DepositsCreate_Studentbox.val(),
				 		Amountbox: DepositsCreate_Amountbox.val(),
				 		Cashbox: DepositsCreate_Cashbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							Deposits_FormArea.addClass('hide')
							Deposits_DoneArea.removeClass('hide')

							DepositsCreate_CashLabel.text('P '+ data.Cash)
							DepositsCreate_TotalLabel.text('P '+ data.Total)
							DepositsCreate_ChangeLabel.text('P '+ data.Change.replace('-', ''))

							new Record().View_RecordLoad($("#View_ItemButton option:selected").val())
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
				var ErrorDisplay = ""

				if(DepositsCreate_Studentbox.val() == "") ErrorDisplay += "(Student ID) "
				if(DepositsCreate_Amountbox.val() == "") ErrorDisplay += "(Amount) "
				if(DepositsCreate_Cashbox.val() == "") ErrorDisplay += "(Cash) "

				alert("Error: "+ ErrorDisplay +"is Empty!")

				ErrorDisplay = ""
			}
		}

		this.Create_DoneButton = function() {
			$("#DepositsCreate_Studentbox").val('')
			$("#DepositsCreate_Amountbox").val('')
			$("#DepositsCreate_FeeLabel").text('P XXXX.XX')
			$("#DepositsCreate_STLabel").text('P XXXX.XX')
			$("#DepositsCreate_Cashbox").val('')

			$("Deposits_DoneArea").addClass('hide')
			$("#DepositsCreate_CashLabel").text('P XXXX.XX')
			$("#DepositsCreate_TotalLabel").text('P XXXX.XX')
			$("#DepositsCreate_ChangeLabel").text('P XXXX.XX')

			$("#DepositsArea").addClass('hide')
		}

		this.Create_BackButton = function() {
			$("#DepositsArea").addClass('hide')
			$("#ViewArea").removeClass('hide')
		}
	}

	function Redeem() {
		this.Create_AmountKey = function(e) {
			var intKey = e.which || e.keyCode

			var RedeemCreate_Amountbox = $("#RedeemCreate_Amountbox")
			var RedeemCreate_FeeLabel = $("#RedeemCreate_FeeLabel")
			var RedeemCreate_STLabel = $("#RedeemCreate_STLabel")

			if(RedeemCreate_Amountbox.val() != "") {
				var Fee = '1'

				if(RedeemCreate_Amountbox.val().length >= 2) for (var i = 2; i < RedeemCreate_Amountbox.val().length; i++) Fee += '0'
				if(RedeemCreate_Amountbox.val().length == 1) Fee = '0'
				RedeemCreate_FeeLabel.text('P '+ Fee)

				Fee = parseInt(Fee) + parseInt(RedeemCreate_Amountbox.val())
				RedeemCreate_STLabel.text('P '+ Fee)
			}
			else {
				RedeemCreate_FeeLabel.text('P XXXX.XX')
				RedeemCreate_STLabel.text('P XXXX.XX')
			}
		}

		this.Create_NextButton = function() {
			var Redeem_FormArea = $("#Redeem_FormArea")
			var RedeemCreate_Studentbox = $("#RedeemCreate_Studentbox")
			var RedeemCreate_FEbox = $("#RedeemCreate_FEbox") // Optional
			var RedeemCreate_TEbox = $("#RedeemCreate_TEbox") // Optional
			var RedeemCreate_Amountbox = $("#RedeemCreate_Amountbox")
			var RedeemCreate_Cashbox = $("#RedeemCreate_Cashbox")

			var Redeem_DoneArea = $("#Redeem_DoneArea")
			var RedeemCreate_CashLabel = $("#RedeemCreate_CashLabel")
			var RedeemCreate_TotalLabel = $("#RedeemCreate_TotalLabel")
			var RedeemCreate_ChangeLabel = $("#RedeemCreate_ChangeLabel")
			var RedeemCreate_CodeLabel = $("#RedeemCreate_CodeLabel")

			if(RedeemCreate_Studentbox.val() != "" && RedeemCreate_Amountbox.val() != "" && RedeemCreate_Cashbox.val() != "") {
				if(RedeemCreate_FEbox.val() != "" && RedeemCreate_TEbox.val() != "") {
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Transaction/Redeem_NextButton", 
						method: 'POST',
						data: {
							StudentID: RedeemCreate_Studentbox.val(),
							FEbox: RedeemCreate_FEbox.val(),
							TEbox: RedeemCreate_TEbox.val(),
					 		Amountbox: RedeemCreate_Amountbox.val(),
					 		Cashbox: RedeemCreate_Cashbox.val()
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								Redeem_FormArea.addClass('hide')
								Redeem_DoneArea.removeClass('hide')

								RedeemCreate_CashLabel.text('P '+ data.Cash)
								RedeemCreate_TotalLabel.text('P '+ data.Total)
								RedeemCreate_ChangeLabel.text('P '+ data.Change)
								RedeemCreate_CodeLabel.text(data.Code)

								new Record().View_RecordLoad($("#View_ItemButton option:selected").val())
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
					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Transaction/Redeem_NextButton", 
						method: 'POST',
						data: {
							StudentID: RedeemCreate_Studentbox.val(),
					 		Amountbox: RedeemCreate_Amountbox.val(),
					 		Cashbox: RedeemCreate_Cashbox.val()
						},
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								Redeem_FormArea.addClass('hide')
								Redeem_DoneArea.removeClass('hide')

								RedeemCreate_CashLabel.text('P '+ data.Cash)
								RedeemCreate_TotalLabel.text('P '+ data.Total)
								RedeemCreate_ChangeLabel.text('P '+ data.Change)
								RedeemCreate_CodeLabel.text(data.Code)
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
			else {
				var ErrorDisplay = ""

				if(RedeemCreate_Studentbox.val() == "") ErrorDisplay += "(Student ID) "
				if(RedeemCreate_Amountbox.val() == "") ErrorDisplay += "(Amount) "
				if(RedeemCreate_Cashbox.val() == "") ErrorDisplay += "(Cash) "

				alert("Error: "+ ErrorDisplay +"is Empty!")

				ErrorDisplay = ""
			}
		}

		this.Create_DoneButton = function() {
			$("#RedeemCreate_Studentbox").val('')
			$("#RedeemCreate_FEbox").val('')
			$("#RedeemCreate_TEbox").val('')
			$("#RedeemCreate_Amountbox").val('')
			$("#RedeemCreate_FeeLabel").text('P XXXX.XX')
			$("#RedeemCreate_STLabel").text('P XXXX.XX')
			$("#RedeemCreate_Cashbox").val('')

			$("Redeem_DoneArea").addClass('hide')
			$("#RedeemCreate_CashLabel").text('P XXXX.XX')
			$("#RedeemCreate_TotalLabel").text('P XXXX.XX')
			$("#RedeemCreate_ChangeLabel").text('P XXXX.XX')
			$("#RedeemCreate_CodeLabel").text('XXX-XXX-XXX')

			$("#RedeemArea").addClass('hide')
		}

		this.Create_BackButton = function() {
			$("#RedeemArea").addClass('hide')
			$("#ViewArea").removeClass('hide')
		}
	}
</script>