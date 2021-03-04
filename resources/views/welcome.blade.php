<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style type="text/css">

		#divpequena{
			position: absolute;
			background-color: rgba(0,0,0,0.5);
			color:#fff;
			top: 300px;
			text-align: center;
			opacity: 0.9;
		}
		a{
			font-size:30pt;
		}
		#w3-row{
			position: absolute;
			top: 0;
			left: 0;
			z-index: -100;
			height: 100%;
		}
	</style>
</head>
<!-- 
text-align: center;
			top: 200px;
			class="w3-col w3-container m12 l12 w3-yellow"
			<img src="../fundolivros.jpeg"  style="width:100%; height: 100%;">
		-->
		<body >
			<div  class="w3-col w3-container m8 l12 w3-black ">
				
				<div class="w3-row w3-hide-small w3-hide-medium">
					<img src="../b1.jpeg" style="width: 32%; height: 100%;">
					<img src="../b2.jpeg" style="width: 34%; height: 60%;">
					<img src="../b3.jpeg" style="width: 33%; height: 60%;">
				</div>
				<div class="w3-row w3-hide-medium w3-hide-large">
					<img src="../b1.jpeg" style="width: 90%; height: 100%;">
				</div>
				<div class="w3-row w3-hide-small w3-hide-large">
					<img src="../b1.jpeg" style="width: 40%; height: 60%;">
					<img src="../b2.jpeg" style="width: 50%; height: 100%;">
				</div>

				<div id="divpequena" class="w3-col w3-container m8 l12 w3-black">  
					<a href="{{route('home')}}" >Login</a>
				</div>


			</div>

			<!--<div id="divgrande" class="w3-col w3-container m4 l3 w3-yellow">
				

		<header class="w3-container w3-teal">
			<a href="{{route('home')}}">Login</a>
		</header>
	</div>-->


</body>
</html>