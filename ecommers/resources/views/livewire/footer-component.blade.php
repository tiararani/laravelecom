<div>
    <footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over $99</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-recycle" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Guarantee</h4>
								<p class="fc-desc">30 Days Money Back</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Safe Payment</h4>
								<p class="fc-desc">Safe your online payment</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">

				<div class="container">

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Contact Details</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">{{$setting->address}}</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">{{$setting->phone2}}</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">{{$setting->email}}</p>
											</li>											
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

							<div class="wrap-footer-item">
								<h3 class="item-header">Hot Line</h3>
								<div class="item-content">
									<div class="wrap-hotline-footer">
										<span class="desc">Call Us toll Free</span>
										<b class="phone-number">{{$setting->phone2}}</b>
									</div>
								</div>
							</div>

							<div class="wrap-footer-item footer-item-second">
								<h3 class="item-header">Sign up for newsletter</h3>
								<div class="item-content">
									<div class="wrap-newletter-footer">
										<form action="#" class="frm-newletter" id="frm-newletter">
											<input type="email" class="input-email" name="email" value="" placeholder="Enter your email address">
											<button class="btn-submit">Subscribe</button>
										</form>
									</div>
								</div>
							</div>

						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">My Account</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="http://127.0.0.1:8000/user/profile" class="link-term">My Account</a></li>
												<!-- <li class="menu-item"><a href="#" class="link-term">Brands</a></li>
												<li class="menu-item"><a href="#" class="link-term">Gift Certificates</a></li>
												<li class="menu-item"><a href="#" class="link-term">Affiliates</a></li> -->
												<li class="menu-item"><a href="http://127.0.0.1:8000/wishlist" class="link-term">Wishlist</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Information</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="https://api.whatsapp.com/send?phone=6283833327900" class="link-term">Contact Us</a></li>
												<li class="menu-item"><a href="https://goo.gl/maps/cVLkRj75gCAgEsU76" class="link-term">Site Map</a></li>
												<li class="menu-item"><a href="http://127.0.0.1:8000/user/orders" class="link-term">Order History</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">We Using Safe Payments:</h3>
								<div class="item-content">
									<div class="wrap-list-item wrap-gallery">
										<img src="{{asset('assets/images/payment.png')}}" style="max-width: 260px;">
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Social network</h3>
								<div class="item-content">
									<div class="wrap-list-item social-network">
										<ul>
											<li><a href="{{$setting->twitter}}" class="link-to-item" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->facebook}}" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->pinterest}}" class="link-to-item" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->instagram}}" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											<li><a href="{{$setting->youtube}}" class="link-to-item" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Download App</h3>
								<div class="item-content">
									<div class="wrap-list-item apps-list">
										<ul>
											<li><a href="https://apps.apple.com/id/app/id959841443" class="link-to-item" title="our application on apple store"><figure><img src="assets/images/brands/apple-store.png" alt="apple store" width="128" height="36"></figure></a></li>
											<li><a href="https://play.google.com/store/apps/details?id=com.shopee.id&referrer=af_tranid%3DFEBhiWFdxnOnCMVmtHxjug%26pid%3DOrganicA%26c%3Dlp_home_and1&pli=1" class="link-to-item" title="our application on google play store"><figure><img src="assets/images/brands/google-play-store.png" alt="google play store" width="128" height="36"></figure></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="wrap-back-link">
					<div class="container">
						<div class="back-link-box">
							<h3 class="backlink-title">Quick Links</h3>
							<div class="back-link-row">
								<ul class="list-back-link" >
									<li><span class="row-title">Rekomendasi Alat Tulis :</span></li>
									<li><a href="http://127.0.0.1:8000/product/bulpoit-gel-kokoro" class="redirect-back-link" title="Bulpen Kokoro">Bulpen Kokoro</a></li>
									<li><a href="http://127.0.0.1:8000/product/binder-note-joyko-a5-tspl-m507" class="redirect-back-link" title="Binder Note Joyko A5-TSPL-M507">Binder Note Joyko A5-TSPL-M507</a></li>
									<li><a href="http://127.0.0.1:8000/product/pensil-faber-castell" class="redirect-back-link" title="Pensil Faber Castell">Pensil Faber Castell</a></li>
									<li><a href="http://127.0.0.1:8000/product/pengahapus-joyko-karakter-animals" class="redirect-back-link" title="Penghapus Joyko Karakter Animals">Penghapus Joyko Karakter Animals</a></li>
									<li><a href="http://127.0.0.1:8000/product/penggaris-faber-castell" class="redirect-back-link" title="Penggaris Faber Castell">Penggaris Faber Castell</a></li>
								</ul>

								<ul class="list-back-link" >
									<li><span class="row-title">Rekomendasi Atribut Sekolah:</span></li>
									<li><a href="http://127.0.0.1:8000/product/seragam-atasan-putih-smp" class="redirect-back-link" title="Seragam Atasan Putih SMP">Seragam Atasan Putih SMP</a></li>
									<li><a href="http://127.0.0.1:8000/product/seragam-atasan-putih-smasmk" class="redirect-back-link" title="seragam atasan putih sma smk" >seragam atasan putih sma smk</a></li>
									<li><a href="http://127.0.0.1:8000/product/seragam-pramuka" class="redirect-back-link" title="Seragam Pramuka" >Seragam Pramuka</a></li>
									<li><a href="http://127.0.0.1:8000/product/topi-sekolah" class="redirect-back-link" title="Topi Sekolah" >Topi Sekolah</a></li>
									<li><a href="http://127.0.0.1:8000/product/dasi-sekolah" class="redirect-back-link" title="Micrumex Tablets" >Dasi Sekolah</a></li>
									<li><a href="http://127.0.0.1:8000/product/sabuk-sekolah" class="redirect-back-link" title="Sabuk Sekolah" >Sabuk Sekolah</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="coppy-right-box">
				<div class="container">
					<div class="coppy-right-item item-left">
						<p class="coppy-right-text">Copyright © 20202 Tiara Rani. All rights reserved</p>
					</div>
					<div class="coppy-right-item item-right">
						<div class="wrap-nav horizontal-nav">
							<ul>
								<li class="menu-item"><a href="about-us.html" class="link-term">About us</a></li>								
								<li class="menu-item"><a href="privacy-policy.html" class="link-term">Privacy Policy</a></li>
								<li class="menu-item"><a href="terms-conditions.html" class="link-term">Terms & Conditions</a></li>
								<li class="menu-item"><a href="return-policy.html" class="link-term">Return Policy</a></li>								
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</footer>
</div>
