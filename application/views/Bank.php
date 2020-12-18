<div id="App_BankArea" class="d-flex flex-column companyLabel" style="width:100%; height: 100%">
	<div class="d-flex flex-row" style="width: 100%; height: 100%;">
		<!-- View Area -->
		<div id="ViewArea" style="width: 100%; height: 100%; overflow: hidden; overflow-y: scroll;">
			<div class="d-flex flex-row pt-2 pb-2 pl-4 pr-4 mb-4 shadow-sm">
				<div class="d-flex align-items-center" style="width: 100%; font-weight: bold;">TRANSACTION RECORD</div>
				<?php 

					echo $AccountType == "CASHIER" ? '
						<div class="d-flex flex-row">
							<button onclick="new Bank().View_TopupButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" title="Students will Deposits there money as a Balance Account" style="width: 125px; font-size: 14px; font-weight: bold;">Deposits</button>
							<button onclick="new Bank().View_RedeemButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" title="Its a Gift Card with an Actual Money Inside" style="width: 125px; font-size: 14px; font-weight: bold;">Gift Code</button>
							<button onclick="new Bank().View_COButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 red" title="Withdrawal" style="width: 125px; font-size: 14px; font-weight: bold;">Withdrawal</button>
						</div>
					' : "";

				?>
			</div>

			<div class="">
				<div class="d-flex flex-row mb-1 ml-4 mr-4">
					<input id="View_Searchbox" type="number" class="border-0 rounded pl-3 pr-3 pt-2 pb-2 mr-1 companyInput" style="width: 100%;" placeholder="Search Student ID">
					<button onclick="new Record().View_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Search</button>
					<button onclick="new Record().View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyBackground" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Refresh</button>

					<div style="width: 100%"></div>
					
					<select id="View_ItemButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1 companyInput" title="Display Number of Rows" style="width: 125px; font-size: 14px; font-weight: bold;">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
						<option value="200">200</option>
						<option value="500">500</option>
						<option value="1000">1000</option>
						<option value="999999999999">All (This is might you break your Browser or CPU)</option>
					</select>
					<button onclick="new Record().View_RefreshButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Load</button>
				</div>
				<table class="table">
					<thead>
						<tr>
							<td class="border-0" style="font-weight: bold;">Student Name</td>
							<td class="border-0" style="color: #375692; min-width: 150px; max-width: 150px; font-weight: bold;">Transaction Name</td>
							<td class="border-0" style="color: #e91e63; font-weight: bold;">Transaction Type</td>
							<td class="border-0" style="min-width: 125px; max-width: 125px; font-weight: bold;">Timeline</td>
						</tr>
					</thead>
					<tbody id="ViewTransaction_RecordLoad">
						
					</tbody>
				</table>
			</div>
		</div>
		<!-- End of View Area -->
		<!-- Basic Info Area -->
		<div id="BankView_BasicArea" class="d-flex flex-column" style="min-width: 350px; max-width: 350px; height: 100%; margin-right: -350px; overflow-y: scroll;">
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
					<button id="BankView_BackButton" onclick="new Record().View_BackButton()" class="pt-2 pb-2 pl-4 pr-4 rounded red">Hide</button>
				</div>
			</div>
		</div>
		<!-- End of Basic Info Area -->
	</div>
</div>

<!-- Deposits Area -->
<div id="DepositsArea" class="position-fixed hide companyForeground" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%;">
		<div id="Deposits_FormArea" class="d-flex flex-column rounded p-3" style="background: #1e2124; width: 600px;">
			<div class="m-0 p-0 mb-4 ml-2" style="color: #7289da; min-width: 125px; font-weight: bold;">DEPOSITS</div>

			<div class="d-flex flex-row" style="width: 100%">
				<div class="d-flex flex-column" style="width: 100%">
					<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
					<input id="DepositsCreate_Studentbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-4" style="width: 100%;" type="number" placeholder="XXX-XXX-XXX">

					<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Amount</h4>
					<input onkeypress="new Deposits().Create_AmountKey(this)" onkeyup="new Deposits().Create_AmountKey(this)" onkeydown="new Deposits().Create_AmountKey(this)" id="DepositsCreate_Amountbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="width: 100%;" type="number" placeholder="XXX-XXX-XXX">
				</div>
				<!-- Display Sub Amount -->
				<div class="d-flex flex-column rounded ml-2 p-3" style="background: #1e2124; width: 100%">
					<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
						<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Fee</h4>
						<h4 id="DepositsCreate_FeeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>
					</div>
					<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
						<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Sub Total</h4>
						<h4 id="DepositsCreate_STLabel" class="d-flex justify-content-end m-0 p-0 red-text" style="width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>
					</div>

					<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">Cash</h4>
					<input id="DepositsCreate_Cashbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-4" style="width: 100%;" type="number" placeholder="XXX-XXX-XXX">

					<button onclick="new Deposits().Create_NextButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Next</button>
					<button onclick="new Deposits().Create_BackButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="width: 125px; font-size: 14px; font-weight: bold;">Cancel</button>
				</div>
				<!-- End of Display Sub Amount -->
			</div>
		</div>
		<div id="Deposits_DoneArea" class="d-flex flex-column rounded p-3 hide" style="background: #1e2124;">
			<div class="p-0 mb-1 ml-4" style="color: #7289da; min-width: 125px; font-weight: bold;">RECEIPT</div>

			<div class="d-flex flex-column rounded" style="width: 100%">
				<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
					<h4 id="DepositsCreate_CashLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Total</h4>
					<h4 id="DepositsCreate_TotalLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1 mt-4" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Change</h4>
					<h4 id="DepositsCreate_ChangeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>
				</div>

				<button onclick="new Deposits().Create_DoneButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Done</button>
			</div>
		</div>
	</div>
</div>
<!-- End of Deposits Area -->

<!-- Redeem Area -->
<div id="RedeemArea" class="position-fixed hide companyForeground" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%;">
		<div id="Redeem_FormArea" class="d-flex flex-column rounded p-3" style="background: #1e2124; width: 750px;">
			<div class="p-0 ml-2" class="">REEDEM GIFT FORM</div>

			<div class="d-flex flex-row mt-4" style="width: 100%">
				<div class="d-flex flex-column" style="width: 100%">
					<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
					<input id="RedeemCreate_Studentbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #ffffff; width: 100%;" type="number" placeholder="XXX-XXX-XXX">

					<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">Amount</h4>
					<input onkeypress="new Redeem().Create_AmountKey(this)" onkeyup="new Redeem().Create_AmountKey(this)" onkeydown="new Redeem().Create_AmountKey(this)" id="RedeemCreate_Amountbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #ffffff; width: 100%;" type="number" placeholder="XXX-XXX-XXX">

					<h4 class="ml-2 mb-1 p-0 mt-4" style="font-size: 14px; font-weight: bold;">Email(Optional)</h4>
					<div class="d-flex flex-row mb-2 pl-2 pr-2 pb-2 pt-1 rounded" style="border: 1px solid white">
						<div class="d-flex flex-column" style="width: 100%">
							<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">From</h4>
							<input id="RedeemCreate_FEbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #ffffff; width: 100%;" placeholder="XXXXX@XXXX.XXX">
						</div>

						<div class="d-flex flex-column ml-2" style="width: 100%">
							<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">To</h4>
							<input id="RedeemCreate_TEbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #ffffff; width: 100%;" placeholder="XXXXX@XXXX.XXX">
						</div>
					</div>

				</div>
				<div class="d-flex flex-column rounded ml-4 p-3" style="background: #1e2124; width: 500px;">
					<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
						<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Fee</h4>
						<h4 id="RedeemCreate_FeeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
					</div>
					<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-4" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
						<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Sub Total</h4>
						<h4 id="RedeemCreate_STLabel"4 class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
					</div>

					<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
					<input id="RedeemCreate_Cashbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-2" style="background: #333333; color: #ffffff; width: 100%; font-size: 14px;" type="number" placeholder="XXX-XXX-XXX">

					<button onclick="new Redeem().Create_NextButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Next</button>
					<button onclick="new Redeem().Create_BackButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="width: 125px; font-size: 14px; font-weight: bold;">Cancel</button>
				</div>
			</div>
		</div>
		<div id="Redeem_DoneArea" class="d-flex flex-column rounded p-3 hide" style="background: #1e2124; width: 500px;">
			<div class="p-0 mb-1 ml-4" style="color: #7289da; min-width: 125px; font-weight: bold;">RECEIPT</div>

			<div class="d-flex flex-column rounded ml-2 p-3" style="background: #1e2124; width: 100%">
				<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
					<h4 class="m-0 p-0" style="font-size: 14px; font-weight: bold;">Cash</h4>
					<h4 id="RedeemCreate_CashLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Total</h4>
					<h4 id="RedeemCreate_TotalLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>
				</div>

				<div class="d-flex flex-row border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1 mt-4" style="background: #333333; color: #7289da; width: 100%; font-size: 14px; font-weight: bold;">
					<h4 class="m-0 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Change</h4>
					<h4 id="RedeemCreate_ChangeLabel" class="d-flex justify-content-end m-0 p-0 ml-4 red-text" style="width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>
				</div>
			</div>

			<h4 class="ml-2 mb-1 p-0 mt-4" style="min-width: 100px; font-size: 14px; font-weight: bold;">Redeem Gift Code</h4>
			<h4 id="RedeemCreate_CodeLabel" class="d-flex justify-content-center border-0 rounded pl-4 pr-4 pt-3 pb-3 mb-2" style="background: #333333; color: #ffffff; width: 100%; font-size: 14px; font-weight: bold;">XXX-XXX-XXX</h4>

			<button onclick="new Redeem().Create_DoneButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Done</button>
		</div>
	</div>
</div>
<!-- End of Redeem Area -->

<!-- Cash Out Area -->
<div id="CashArea" class="position-fixed hide companyForeground" style="top: 0; bottom: 0; left: 0; right: 0; width: 100%; height: 100%">
	<div class="d-flex justify-content-center align-items-center" style="background: #00000099; width: 100%; height: 100%;">
		<div id="" class="d-flex flex-column rounded p-3" style="background: #1e2124; width: 400px;">
			<div class="p-0 ml-2" style="color: #7289da; min-width: 125px; font-weight: bold;">CASHOUT</div>

			<div class="d-flex flex-row mt-4" style="width: 100%">
				<div class="d-flex flex-column" style="width: 100%">
					<h4 class="ml-2 mb-1 p-0" style="font-size: 14px; font-weight: bold;">Student ID</h4>
					<div class="d-flex flex-row mb-4">
						<input id="CashView_Studentbox" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mr-1" style="background: #333333; color: #ffffff; width: 100%;" type="number" placeholder="XXX-XXX-XXX">
						<button onclick="new Cash().View_SearchButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2" style="background: #333333; color: #7289da; width: 125px; font-size: 14px; font-weight: bold;">Search</button>
					</div>

					<h4 class="ml-2 mb-1 p-0" style="min-width: 100px; font-size: 14px; font-weight: bold;">Balance</h4>
					<h4 id="CashView_BalanceLabel" class="border-0 rounded m-0 pl-4 pr-4 pt-3 pb-3" style="background: #333333; color: #ffffff; width: 100%; font-size: 14px; font-weight: bold;">P XXXX.XX</h4>

					<button onclick="new Cash().View_NextButton()" id="CashView_NextButton" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 mb-1 mt-4 companyBackground" style="width: 125px; font-size: 14px; font-weight: bold;">Go!</button>
					<button onclick="new Cash().View_BackButton()" class="border-0 rounded pl-4 pr-4 pt-2 pb-2 red" style="width: 125px; font-size: 14px; font-weight: bold;">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of Cash Out Area -->

<script type="text/javascript">
	$(document).ready(function() {
		new Record().View_RecordLoad(10)

		$('[title]').tooltip()
		$("#BankView_Image").attr('src', window.location.href.replace("index.php/Access", "avatar")+ "/avatar.png");

		<?php 
			echo $AccountType != "CASHIER" ? '
				$("#DepositsArea").remove();
				$("#RedeemArea").remove();
				$("#CashArea").remove();
			': ''; 
		?>
	})

	function Bank() {
		this.View_TopupButton = function() {
			$("#DepositsArea").removeClass('hide')
			$("#Deposits_FormArea").removeClass('hide')

			$("#Deposits_DoneArea").addClass('hide')
		}

		this.View_RedeemButton = function() {
			$("#RedeemArea").removeClass('hide')
			$("#Redeem_FormArea").removeClass('hide')

			$("#Redeem_DoneArea").addClass('hide')
		}

		this.View_COButton = function() { $("#CashArea").removeClass('hide') }
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
								<td>N / A</td>
								<td>N / A</td>
								<td>N / A</td>
								<td>N / A</td>
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
							<tr id="ViewTransaction_RecordID` +id+ `" onclick="new Record().View_InfoButton(` +id+ `)" title="Click for more info!" class="border-bottom button-hover" style="cursor: pointer;">
								<td class="border-0" style="word-break: break-all;">`+ data.StudentName +`</td>
								<td class="border-0" style="color: #375692; word-break: break-all;">`+ data.TransactionName +`</td>
								<td class="border-0" style="color: #e91e63; word-break: break-all;">`+ data.TransactionType +`</td>
								<td class="border-0" style="word-break: break-all;">`+ data.Timeline +`</td>
							</tr>
						`
						ViewTransaction_RecordLoad.append(HTML)
						$('#ViewTransaction_RecordID'+ id).tooltip()
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
			var ViewTransaction_RecordLoad = $("#ViewTransaction_RecordLoad")

			ViewTransaction_RecordLoad.html('')

			if(View_Searchbox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Transaction/View_SearchButton?id=" +View_Searchbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							for(var x in data.TransactionArray) {
								ViewTransaction_RecordLoad.append(`
									<tr id="ViewTransaction_RecordID` +data.TransactionArray[x].TransactionID+ `" onclick="new Record().View_InfoButton(` +data.TransactionArray[x].TransactionID+ `)" class="border-bottom button-hover" style="cursor: pointer;">
										<td class="border-0" style="word-break: break-all;">`+ data.TransactionArray[x].StudentName +`</td>
										<td class="border-0" style="color: #375692; word-break: break-all;">`+ data.TransactionArray[x].TransactionName +`</td>
										<td class="border-0" style="color: #e91e63; word-break: break-all;">`+ data.TransactionArray[x].TransactionType +`</td>
										<td class="border-0" style="word-break: break-all;">`+ data.TransactionArray[x].Timeline +`</td>
									</tr>
								`)
								$('#ViewTransaction_RecordID'+ data.TransactionArray[x].TransactionID).tooltip()
							}
						}
					},
					error: function(ex) {
							console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else new Record().View_RecordLoad($("#View_ItemButton option:selected").val())
		}

		this.View_RefreshButton = function() {
			$("#View_Searchbox").val('')

			new Record().View_RecordLoad($("#View_ItemButton option:selected").val())
		}

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
						})

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

	function Deposits() {
		this.Create_AmountKey = function(e) {
			var intKey = e.which || e.keyCode

			var DepositsCreate_Amountbox = $("#DepositsCreate_Amountbox")
			var DepositsCreate_FeeLabel = $("#DepositsCreate_FeeLabel")
			var DepositsCreate_STLabel = $("#DepositsCreate_STLabel")

			if(DepositsCreate_Amountbox.val() != "") {
				var Fee = 0.005

				// if(DepositsCreate_Amountbox.val().length >= 2) for (var i = 2; i < DepositsCreate_Amountbox.val().length; i++) Fee += '0'
				// if(DepositsCreate_Amountbox.val().length == 1) Fee = '0'
				Fee = Fee * parseFloat(DepositsCreate_Amountbox.val())
				DepositsCreate_FeeLabel.text('P '+ Fee)

				Fee = Fee + parseFloat(DepositsCreate_Amountbox.val())
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
				if(DepositsCreate_Amountbox.val() >= 100) {
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
								DepositsCreate_ChangeLabel.text('P '+ data.Change)

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
				else alert("The Minimum Amount for Deposits is 100!")
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

			$("#DepositsCreate_CashLabel").text('P XXXX.XX')
			$("#DepositsCreate_TotalLabel").text('P XXXX.XX')
			$("#DepositsCreate_ChangeLabel").text('P XXXX.XX')

			$("#DepositsArea").addClass('hide')
			$("#ViewArea").removeClass('hide')
		}

		this.Create_BackButton = function() {
			$("#DepositsArea").addClass('hide')
			$("#Deposits_DoneArea").addClass('hide')

			$("#Deposits_FormArea").removeClass('hide')
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
				var Fee = .01

				// if(RedeemCreate_Amountbox.val().length >= 2) for (var i = 2; i < RedeemCreate_Amountbox.val().length; i++) Fee += '0'
				// if(RedeemCreate_Amountbox.val().length == 1) Fee = '0'
				Fee = Fee * parseFloat(RedeemCreate_Amountbox.val())
				RedeemCreate_FeeLabel.text('P '+ Fee)

				Fee = Fee + parseFloat(RedeemCreate_Amountbox.val())
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

					 		alert("Unexpected Error Occur!")
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
			$("#ViewArea").removeClass('hide')
		}

		this.Create_BackButton = function() {
			$("#RedeemArea").addClass('hide')
			$("#ViewArea").removeClass('hide')
		}
	}

	function Cash() {
		this.View_SearchButton = function() {
			var CashView_Studentbox = $("#CashView_Studentbox")
			var CashView_BalanceLabel = $("#CashView_BalanceLabel")

			if(CashView_Studentbox.val() != "") {

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Transaction/CashView_SearchButton?id=" + CashView_Studentbox.val(), 
					method: 'POST',
					data: {
				 		StudentID: CashView_Studentbox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) CashView_BalanceLabel.text(data.Balance)
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		alert("Unexpected Error Occur!")
					}
				})
			}
			else alert("Student ID is Empty!")
		}

		this.View_NextButton = function() {
			var CashView_Studentbox = $("#CashView_Studentbox")
			var CashView_NextButton = $("#CashView_NextButton")

			if(CashView_Studentbox.val() != "") {
				CashView_NextButton.attr('disabled', 'disabled')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Account/ViewAssessment_SearchButton?id=" + CashView_Studentbox.val(), 
					method: 'POST',
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							CashView_NextButton.removeAttr('disabled')

							alert("Done")

							new Cash().View_BackButton()
						}
						else {
							alert(data.ErrorDisplay)

							CashView_NextButton.removeAttr('disabled')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				 		CashView_NextButton.removeAttr('disabled')

				 		alert("Unexpected Error Occur!")
					}
				})
			}
			else alert("Student ID is Empty!")
		}

		this.View_BackButton = function() {
			$("#ViewArea").removeClass('hide')

			$("#CashArea").addClass('hide')
		}
	}
</script>