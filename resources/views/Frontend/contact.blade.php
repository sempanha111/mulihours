@extends('Frontend/layout.app')
@section('content')
    @include('Frontend/layout.header')
    <div class="banner_wrap banner_wrap_sub">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="banner_left inside">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1>Contact Us</h1>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="inside_wrap">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">


					<div class="alert alert-info"> Please read our <a href="/faq" target="_blank">Frequently Asked
							Questions (FAQ)</a> page before creating a ticket. Probably your question has already been
						answered there!</div>


					<div class="form-container-support" style="width:100%;">

						<h2>Send Us a Message</h2>
						<div class="form-content">


							<script language=javascript>

								function checkform() {
									if (document.mainform.name.value == '') {
										alert("Please type your full name!");
										document.mainform.name.focus();
										return false;
									}
									if (document.mainform.email.value == '') {
										alert("Please enter your e-mail address!");
										document.mainform.email.focus();
										return false;
									}
									if (document.mainform.message.value == '') {
										alert("Please type your message!");
										document.mainform.message.focus();
										return false;
									}
									return true;
								}

							</script>

							<form method=post name=mainform onsubmit="return checkform()"><input type="hidden"
									name="form_id" value="15766652811450"><input type="hidden" name="form_token"
									value="e999afa2dacb5bfb312662f7feaeceab">
								<input type=hidden name=a value=support>
								<input type=hidden name=action value=send>

								<table width="100%" border=0 cellpadding=5 cellspacing=5>
									<tr>
										<td>
											<table cellspacing=0 cellpadding=2 border=0 width="100%">
												<tr>
													<td width="44%"><label> Your Name:</label>
														<input type="text" name="name" value="" size=30 class=inpts>
													</td>
													<td width="2%">&nbsp;</td>
													<td width="44%"><label>Your Email:</label>
														<input type="text" name="email" value="" size=30 class=inpts>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td><label>Your Message:</label><textarea name=message class=inpts cols=45
												rows=4></textarea>
									</tr>
									<tr>
										<td><input type=submit value="Send" class=sbmt></td>
									</tr>
								</table>
							</form>

						</div>
					</div>
				</div>


				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="support-contacts">
						<div class="contact-block">
							<img src="{{ asset('assets_frontend/images/location.png')}}" alt="">
							<p>34 Tai Yau Street, San Po Kong, Kowloon, Hongkong</p>
						</div>
						<div class="contact-block">
							<img src="{{ asset('assets_frontend/images/mail.png')}}" alt="">
							<p>admin@multihours.com</p>
						</div>



					</div>
				</div>

			</div>
		</div>
	</div>
    @include('Frontend/layout/footer')
@endsection
