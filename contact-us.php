<?php include "inc/header.php"; ?>
<div id="contact-page" class="container">
	<div class="bg">  	
		<div class="row">  	
    		<div class="col-sm-8">
    			<div class="contact-form">
    				<h2 class="title text-center">Get In Touch</h2>
    				<div class="status alert alert-success" style="display: none"></div>
			    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
			            <div class="form-group col-md-6">
			                <input type="text" name="name" class="form-control" disabled placeholder="Name">
			            </div>
			            <div class="form-group col-md-6">
			                <input type="email" name="email" class="form-control" disabled placeholder="Email">
			            </div>
			            <div class="form-group col-md-12">
			                <input type="text" name="subject" class="form-control" disabled placeholder="Subject">
			            </div>
			            <div class="form-group col-md-12">
			                <textarea name="message" id="message" disabled class="form-control" rows="8" placeholder="Your Message Here"></textarea>
			            </div>                        
			            <div class="form-group col-md-12">
			                <a href="javascript:void(0)"><input type="button" name="submit" class="btn btn-primary btn-block" value="Submit"></a>
			            </div>
			        </form>
    			</div>
    		</div>
    		<div class="col-sm-4">
    			<div class="contact-info">
    				<h2 class="title text-center">Contact Info</h2>
    				<address>
    					<p>Rio Shop Inc.</p>
						<p>Tanjungpinang, Kepulauan Riau</p>
						<p>Indonesia</p>
						<p>Mobile: +6281234567890</p>
						<p>Email: info@rioshop.com</p>
    				</address>
    				<div class="social-networks">
    					<h2 class="title text-center">Social Networking</h2>
						<ul>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-youtube"></i></a>
							</li>
						</ul>
    				</div>
    			</div>
			</div>
    	</div>  
	</div>
</div><!--/#contact-page-->
<?php include "inc/footer.php"; ?>