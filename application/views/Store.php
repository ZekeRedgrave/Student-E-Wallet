<div id="App_HomeArea" class="d-flex flex-row" style="width:100%; height: 100%">
	<div class="d-flex flex-row" style="width: 100%;">
		<!-- Store Area -->
		<div id="StoreArea" class="p-3 d-flex flex-column" style="width: 100%; overflow: hidden; overflow-y: scroll;">
			<div class="d-flex flex-column p-3 border">
				<!-- Student Balance -->
				<div class="d-flex flex-row">
					<div class="d-flex flex-column pt-3" style="width: 100%">
						<h6 class="border-bottom pl-2 pr-2" style="margin: 0; font-size: 12px;">Available Balance</h6>
						<h3 class="pl-2 pr-2" style="margin: 0">￥ 12,345.67</h3>
					</div>
					<div class="d-flex flex-column ml-4">
						<button class="material-icons form-control rounded-circle">add</button>
						<h6 class="mt-2">Top Up</h6>
					</div>
				</div>
				<!-- End of Student Balance -->
				<!-- Tution Fee -->
				<div class="border-top pt-1">
					<h1 class="ml-2" style="margin: 0px; font-size: 12px;">Tution Fee Left</h1>
					<h6 class="d-flex justify-content-center m-0 mt-1" style="font-weight: bold;">￥ 12,345.67</h6>
				</div>
				<!-- End of Tution Fee -->
			</div>
			<!-- Payments Area -->
			<h4 class="border-bottom mt-4 pb-1">Payment Store</h4>
			<div id="Store_LoaderArea" class="d-flex justify-content-center row ml-1 mr-1" style="width: 100%">

				<button onclick="new Store().School_TuitionButton()" class="d-flex flex-column form-control rounded border-0 mr-3 mb-3 red" style="color: white;  width: 175px; min-height: 125px;">
					<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">account_balance</div>
					<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">Tuition Fee(Default)<div>
				</button>

				<?php 

					foreach ($Store as $value) {
						echo '<div id="School_DynamicItemID' .$value['StoreID']. '" onclick="new Store().School_DynamicButton(' .$value['StoreID']. ')" class="d-flex flex-row mr-3 mb-3">
								<div class="d-flex flex-column border rounded mr-1" style="width: 175px; min-height: 125px;">
									<div class="material-icons d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">' .$value['StoreIcon']. '</div>
									<div class="d-flex justify-content-center p-2" style="font-size: 12px; font-weight: bold;">' .$value['StoreTitle']. '</div>
								</div>
							</div>';					
					}

				?>

			</div>
			<!-- Store Tuition Area -->
			<div id="Store_TuitionArea" class="p-3 d-flex flex-column hide" style="width: 100%;">
				<h4>Tuition Fee</h4>

				<h6 style="margin: 0; font-size: 12px; font-weight: bold;">Input your Amount</h6>
				<input id="Store_Tuitionbox" type="number" class="form-control" placeholder="ex. 10.59">

				<div class="d-flex flex-row mt-5">
					<button onclick="new Store().SchoolTuition_CancelButton()" class="form-control mr-2 red" style="color:white; width: 100px">Cancel</button>
					<button onclick="new Store().SchoolTuition_DoneButton()" class="form-control" style="width: 100px">Done</button>
				</div>
			</div>
			<!-- End of Store Tuition Area -->
			<!-- End of Payments Area -->
			<h4 class="border-bottom mt-4 pb-1">News & Announcement</h4>
			<div class="d-flex justify-content-center" style="width: 100%">
				<h1 class="mt-5 mb-5">There is no Currently Big News or Announcement Yet!</h1>
			</div>
		</div>
		<!-- End of Store Area -->
		<!-- Store Final Transaction Area -->
		<div class="p-3 d-flex flex-column hide" style="width: 100%; overflow: hidden; overflow-y: scroll;">
			<div>
				<h4 class="border-bottom mb-4 pb-1">Payment Store(Default)</h4>

				<h6 style="margin: 0; font-size: 12px; font-weight: bold;">Amount in words (Optional)</h6>
				<input id="" class="form-control" placeholder="e.g. P 1.00 -> One Pesos Only or One Pesos">

				<table class="table">
					<thead>
						<tr>
							<th>As payment for</th>
							<th>Amount in Figures</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Tution and Other Fees</div></th>
							<th><input id="Slip_Tuitionbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Old Account</div></th>
							<th><input id="Slip_Accountbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Good / Moral Certification</div></th>
							<th><input id="Slip_Moralbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Reissuance of Diploma / Certificates, Grade/Assesment Slips, TOR, etc...</div></th>
							<th><input id="Slip_Documentbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">RLE Extension / Completion</div></th>
							<th><input id="Slip_Extensionbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Testing Fee</div></th>
							<th><input id="Slip_Testingbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">School ID</div></th>
							<th><input id="Slip_IDbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Graduation Fee</div></th>
							<th><input id="Slip_Graduationbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
						<tr>
							<th><div class="d-flex align-items-center form-control border-0 m-0 p-0">Others (Pls. Specift)</div></th>
							<th><input id="Slip_Otherbox" type="number" class="form-control m-0" value="0000.00" disabled="disabled"></th>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th style="font-size: 12px; font-weight: bold;">Previous Available Balance</th>
							<th style="font-size: 12px; font-weight: bold;">P <span id="Slip_PreviousBalance"></span></th>
						</tr>
						<tr>
							<th style="font-size: 12px; font-weight: bold;">Sub Total</th>
							<th style="font-size: 12px; font-weight: bold;">P <span id="Slip_Subtotal"></span></th>
						</tr>
						<tr>
							<th class="red-text" style="font-size: 12px; font-weight: bold;">TOTAL</th>
							<th class="red-text" style="font-size: 12px; font-weight: bold;">P <span id="Slip_Total"></span></th>
						</tr>

						<tr>
							<th class="blue-text" style="font-size: 12px; font-weight: bold;">Available Balance</th>
							<th class="blue-text"style="font-size: 12px; font-weight: bold;">P <span id="Slip_AvailableBalance"></span></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<!-- End of Store Final Transaction Area -->
		<div class="border-left d-flex flex-column h-100" style="width: 550px;">
			<div class="d-flex flex-column" style="height: 50%">
				<!-- Notificaltion Area -->
				<h5 class="p-2 border-bottom" style="margin: 0">Notificaltions</h5>
				<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<div class="d-flex flex-row form-control border-left-0 border-right-0 border-top-0 rounded-0" style="width: 100%; height: 69px">
						<img src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
						<div class="ml-3">
							<div style="font-size: 12px; font-weight: bold">Z. Redgrave -> School Fee around ￥500.00</div>
							<div style="font-size: 12px">Date and Time: 2020:09:20 13:46</div>
						</div>
					</div>

					
				</div>
				<!-- End of Notificaltion Area -->
			</div>
			<div class="d-flex flex-column" style="height: 50%">
				<!-- Notificaltion Area -->
				<h5 class="p-2 border-bottom" style="margin: 0">Top-up Records</h5>
				<div style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
					<div class="d-flex flex-row form-control border-left-0 border-right-0 border-top-0 rounded-0" style="width: 100%; height: 69px">
						<img src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
						<div class="ml-3">
							<div style="font-size: 12px; font-weight: bold">Z. Redgrave -> School Fee around ￥500.00</div>
							<div style="font-size: 12px">Date and Time: 2020:09:20 13:46</div>
						</div>
					</div>
				</div>
				<!-- End of Notificaltion Area -->
			</div>
			<h5 class="p-2 border-bottom" style="margin: 0; visibility: hidden;">Notificaltions</h5>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Dashboard")	
	})

	function Store() {
		this.School_TuitionButton = function() {
			$("#Store_TuitionArea").removeClass('hide')
			$("#Store_LoaderArea").addClass('hide')

		}

		this.SchoolTuition_CancelButton = function() {
			$("#Store_LoaderArea").removeClass('hide')
			$("#Store_TuitionArea").addClass('hide')
		}

		this.SchoolTuition_DoneButton = function() {

		}

		this.School_DynamicButton = function(id) {

		}
	}
</script>