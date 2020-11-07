<div id="App_RecordsArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div id="ViewArea" class="">
			<div class="mt-3">
				<h4 class="m-0 p-0 ml-3" style="min-width: 125px; font-size: 14px; font-weight: bold;">Transaction Record</h4>
				<div class="d-flex flex-row mb-1 ml-1 mr-1">
					<input id="View_Searchbox" class="form-control" placeholder="Search Type or Timeline" style="min-width: 250px;">
					<button onclick="new StudentRecord().View_SearchButton()" class="form-control ml-1" style="min-width: 100px; max-width: 100px;">Search</button>
					<button onclick="new StudentRecord().View_RefreshButton()" class="form-control ml-1" style="min-width: 100px; max-width: 100px;">Refresh</button>
					<div style="width: 100%"></div>
					<select onclick="new StudentRecord().View_ItemButton()" id="View_ItemButton" class="custom-select form-control ml-1" style="max-width: 100px;">
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
							<!-- <td>Student Name</td> -->
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

		this.View_RefreshButton = function() {
			new StudentRecord().View_RecordLoad($("#View_ItemButton option:selected").val())
		}

		this.View_ItemButton = function() {
			$("#View_ItemButton").change(function() {
				new StudentRecord().View_RecordLoad($("#View_ItemButton option:selected").val())
			})
		}
	}
</script>