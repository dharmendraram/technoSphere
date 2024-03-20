   <div class="footer pt-4 mt-3">
   	<div class="container">
   		<div class="row text-white">
   			<div class="col-lg-4">
   				<h5 class="text-white">Information</h5>
   				<ul>
   					<li><a href="./about.php" class="text-decoration-none text-white">About Us</a></li>
   					<li><a href="../technoSphere/orderdetails.php" class="text-decoration-none text-white">Orders Details</a></li>
   					<li><a href="../technoSphere/contact.php" class="text-decoration-none text-white"><span>Contact Us</span></a></li>
   				</ul>
   			</div>

   			<div class="col-lg-4">
   				<h5 class="text-decoration-none text-white">My account</h5>
   				<ul>
   					<li><a href="./login.php" class="text-decoration-none text-white">Sign in</a></li>
   					<li><a href="./cart.php" class="text-decoration-none text-white">View Cart</a></li>
   					<li><a href="./profile.php" class="text-decoration-none text-white">My Profile</a></li>
   				</ul>
   			</div>
   			<div class="col-lg-4" class="text-decoration-none text-white">
   				<h5 class="text-white">Contact</h5>
   				<ul>
   					<li><a href="tel:9881204692"><span class="text-white">+977-9881204692</span></a></li>
   					<li><a href="tel:9868058070"><span class="text-white">+977-9868058070</span></a></li>
   				</ul>
   			</div>
   		</div>
   	</div>

   	<div class="copy_right">
   		<p>TechnoSphere &copy; All rights Reseverd </p>
   	</div>
   </div>
   <script type="text/javascript">
   	$(document).ready(function() {
   		$().UItoTop({
   			easingType: 'easeOutQuart'
   		});

   	});
   </script>
   <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
   <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
   <script defer src="js/jquery.flexslider.js"></script>
   <script type="text/javascript">
   	$(function() {
   		SyntaxHighlighter.all();
   	});
   	$(window).load(function() {
   		$('.flexslider').flexslider({
   			animation: "slide",
   			start: function(slider) {
   				$('body').removeClass('loading');
   			}
   		});
   	});
   </script>

   </body>

   </html>