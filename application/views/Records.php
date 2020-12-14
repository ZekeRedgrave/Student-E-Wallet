<div id="App_RecordsArea" class="d-flex flex-column hide" style="width:100%; height: 100%">
	<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
		<div id="ViewArea" class="companyLabel">
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
							<td class="text-center border-0" style="min-width: 150px; max-width: 150px; font-weight: bold;">Transaction Type</td>
							<td class="border-0" style="color: #e91e63; font-weight: bold;">Transaction Amount</td>
							<td class="border-0" style="min-width: 125px; max-width: 125px; font-weight: bold;">Transaction Fee</td>
							<td class="border-0" style="color: #e91e63; min-width: 125px; max-width: 125px; font-weight: bold;">Cash</td>
							<td class="border-0" style="min-width: 125px; max-width: 125px; font-weight: bold;">Timeline</td>
						</tr>
					</thead>
					<tbody id="ViewTransaction_RecordLoad" style="font-weight: bold;">
						
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
								<td class="border-0" style="word-break: break-all;">N / A</td>
								<td class="border-0" style="word-break: break-all;">N / A</td>
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
						var HTML = `
							<tr class="border-bottom">
								<td class="border-0" style="word-break: break-all;">`+ data.TransactionType +`</td>
								<td class="border-0" style="color: #e91e63; word-break: break-all;">`+ data.TransactionAmount +`</td>
								<td class="border-0" style="word-break: break-all;">`+ data.TransactionFee +`</td>
								<td class="border-0" style="color: #e91e63; word-break: break-all;">`+ data.Cash +`</td>
								<td class="border-0 companyLabel" style="word-break: break-all; font-weight: bold">`+ data.Timeline +`</td>
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
			new StudentRecord().View_RecordLoad($("#View_ItemButton option:selected").val())
		}
	}
</script>