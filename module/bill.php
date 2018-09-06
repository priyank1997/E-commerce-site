

<style>
/* reset */

*
{
	border: 0;
	box-sizing: content-box;
	color: inherit;
	font-family: inherit;
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	line-height: inherit;
	list-style: none;
	margin: 0;
	padding: 0;
	text-decoration: none;
	vertical-align: top;
}


h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

/* table */

table { font-size: 75%; table-layout: fixed; width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
th, td { border-radius: 0.25em; border-style: solid; }
th { background: #EEE; border-color: #BBB; }
td { border-color: #DDD; }

/* page */

html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
html { background: #999; cursor: default; }

body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.5in; }
body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }

/* header */

header { margin: 0 0 3em; }
header:after { clear: both; content: ""; display: table; }

header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
header address p { margin: 0 0 0.25em; }
header span, header img { display: block; float: right; }
header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
header img { max-height: 100%; max-width: 100%; }
header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }

/* article */

article, article address, table.meta, table.inventory { margin: 0 0 3em; }
article:after { clear: both; content: ""; display: table; }
article h1 { clip: rect(0 0 0 0); position: absolute; }

article address { float: left; font-size: 125%; font-weight: bold; }

/* table meta & balance */

table.meta, table.balance { float: right; width: 36%; }
table.meta:after, table.balance:after { clear: both; content: ""; display: table; }

/* table meta */

table.meta th { width: 40%; }
table.meta td { width: 60%; }

/* table items */

table.inventory { clear: both; width: 100%; }
table.inventory th { font-weight: bold; text-align: center; }

table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: right; width: 12%; }
table.inventory td:nth-child(4) { text-align: right; width: 12%; }
table.inventory td:nth-child(5) { text-align: right; width: 12%; }

/* table balance */

table.balance th, table.balance td { width: 50%; }
table.balance td { text-align: right; }

/* aside */

aside h1 { border: none; border-width: 0 0 1px; margin: 0 0 1em; }
aside h1 { border-color: #999; border-bottom-style: solid; }

/* javascript */

.add, .cut
{
	border-width: 1px;
	display: block;
	font-size: .8rem;
	padding: 0.25em 0.5em;	
	float: left;
	text-align: center;
	width: 0.6em;
}

.add, .cut
{
	background: #9AF;
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
	background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
	border-radius: 0.5em;
	border-color: #0076A3;
	color: #FFF;
	cursor: pointer;
	font-weight: bold;
	text-shadow: 0 -1px 2px rgba(0,0,0,0.333);
}

.add { margin: -2.5em 0 0; }

.add:hover { background: #00ADEE; }

.cut { opacity: 0; position: absolute; top: 0; left: -1.5em; }
.cut { -webkit-transition: opacity 100ms ease-in; }

tr:hover .cut { opacity: 1; }

@media print {
	* { -webkit-print-color-adjust: exact; }
	html { background: none; padding: 0; }
	body { box-shadow: none; margin: 0; }
	span:empty { display: none; }
	.add, .cut { display: none; }
}

@page { margin: 0; }
</style>
		<button style="height:30px; width:100px; color:red;" onclick="myFunction()">Print invoice</button>
<br>
<script>
function myFunction() {
    window.print();
}
</script>
<?php
error_reporting(0);
$iid=$_GET['value'];
include('connection.php');
$select="SELECT * FROM  `sold_product` WHERE  `ID` =$iid";
	$sec=mysql_query($select,$con);
	$r=mysql_fetch_array($sec);

?>

		<header>
			<h1>Invoice</h1>
			<address>
				<p><?php echo strtoupper($r['name'])?></p>
				<p><?php echo strtoupper($r['ad1'])?><br><?php echo strtoupper($r['ad2'])?><br><?php echo strtoupper($r['city'])?>-<?php echo strtoupper($r['pin'])?></p>
			</address>
			<span><img alt="" src="images/logo.png"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address style="font-size:14px">
				<p><?php echo strtoupper("HOMESHOPEE Internet Pvt.Ltd.")?></p>
				<p><?php echo strtoupper("Vaishnavi Summit,80feet Road,");?><br><?php echo strtoupper("Koramangala Industrial Layout,")?><br><?php echo strtoupper("Bangalore,Karnataka-376555");?><br><?php echo strtoupper("Office Phone No.-0124-6150000");?></p>
		
			</address>
			<table class="meta">
				<tr>
					<th><span t>Invoice #</span></th>
					<td><?php echo rand(10000,100000)?></td>
				</tr>
				<tr>
					<th><span t>Date</span></th>
					<td><span t><?php echo $r['b_date'] ?></span></td>
				</tr>
						</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span t>Item</span></th>
						<th><span t>Description</span></th>
						<th><span t>Rate</span></th>
						<th><span t>Quantity</span></th>
						<th><span t>Price</span></th>
					</tr>
				</thead>
                <?php
                $rxr=$r['pro_id'];		
		$sss="SELECT * FROM  `product` WHERE  `id`=$rxr";
		$sss=mysql_query($sss,$con);
		$pp=mysql_fetch_array($sss);
		?>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span t><?php echo $pp['name']; ?></span></td>
						<td><span t>Experience Review</span></td>
						<td><span data-prefix>RS. </span><span t><?php echo ($r['tprice']/$r['Qty']);?></span></td>
						<td><span t></span><?php echo $r['Qty'];?></span></td>
						<td><span data-prefix>RS. </span><span><?php echo $r['tprice'];?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span t>Total</span></th>
					<td><span data-prefix>$</span><span><?php echo $r['tprice'];?></span></td>
				</tr>
				<tr>
					<th><span t>Amount Paid</span></th>
					<td><span data-prefix>Rs. </span><span t><?php echo $r['tprice'];?></span></td>
				</tr>
				<tr>
					<th><span t>Payment Due</span></th>
					<td><span data-prefix>Rs. </span><span>00.00</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span t>Additional Notes</span></h1>
			<div t>
				<p>

<b>For Return (Applicable only after 10 days of delevery of product)<br><br></b>
<br>(1) Log in to homeshoppe and go to your Orders tab. Tap or click on Return to create a request 
<br><br>
(2)Depending on the kind of product you wish to return, your return request may have to undergo a verification 
   process 
<br><br>
(3)Following verification, you will be required to confirm your decision based on the category of product 
   ordered. Three options are available: 
<br>
	Exchange: Your order will be exchanged for a new identical product of a different size or color .
<br>	
    Replace: The product in your order will be replaced with an identical product in case it is damaged 
    (broken or spoiled) or defective (has a functional problem that causes it not to work) or is not as described 
<br>
	Refund: If the product of your choice is unavailable in your preferred size or color or model, or if it is 
    out of stock, you may decide that you want your money back. In this scenario, you may choose Refund to have 
    your money returned to you (See Step 6)Keep ready all the requisite items necessary for a smooth returns 
    process — including invoice, original packaging, price tags, freebies, accessories, etc. 
<br><br>
(4)Pickup and Delivery of your order will be scheduled in case of exchanges and replacements 
<br><br>
(5)Refund will be initiated and processed if applicable 
<br><br>
(6)Your request will be fulfilled according to Flipkart’s returns/replacement guarantee</pre></p>
			</div>
		</aside>
	