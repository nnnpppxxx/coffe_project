<form action="php/form_handler.php" method="POST">
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="contact_text">Contact Us</h1>
        </div>
    </div>
    <div class="contact_section_2 layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 padding_0">
                    <div class="mail_section">
                        <div class="email_text">
                            <div class="form-group">
                                <input type="text" class="email-bt" placeholder="Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="email-bt" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="email-bt" placeholder="Phone Number" name="phone">
                            </div>
                            <div class="form-group">
                                <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="message"></textarea>
                            </div>
                            <div class="send_btn">
                                <button type="submit" class="main_bt">SEND</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 padding_0">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="508" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
