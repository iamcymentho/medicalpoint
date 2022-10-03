<!-- Patient Area Starts -->
    <section class="patient-area section-padding" id="feedback">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-top text-center">
                        <h2>Patients are saying</h2>
                        <p>Patients say reviews are one of the key factors they consider when choosing a doctor, and doctors say fair reviews help them improve patient experience.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="single-patient mb-4">
                        <img src="{{ asset('assets/images/patient1.png') }}" alt="">
                        <h3>daren jhonson</h3>
                        <h5>Patient</h5>
                        <p class="pt-3">Doctor Pasia & his PA Josh are exceptional. The care I got from them & their staff has been wonderful & my surgery has given me my life back. It's been 5 months since my surgery & I am back to doing pretty much everything I did before except now the pain is minimal. They have been there for me every step of the way & I am thankful for them every day. If I ever need spine surgery again I will come back here. </p>
                    </div>
                    <div class="single-patient">
                        <img src="{{ asset('assets/images/patient2.png') }}" alt="">
                        <h3>black heiden</h3>
                        <h5>Patient</h5>
                        <p class="pt-3">This was my first visit with Dr.Wolters. she was easy to talk to and listened to what I had to say. She discussed a couple of possible reasons for my discomfort. A prescription was prescribed for me. It did seem to be helpful.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 align-self-center">
                    <div class="appointment-form text-center mt-5 mt-lg-0">
                        <h3 class="mb-5">appointment now</h3>
                        <form action="#">
                            <div class="form-group">
                                <input type="text" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" required>
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Your Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email'" required> 
                            </div>
                            <div class="form-group">
                                <input type="text" id="datepicker" placeholder="Date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Date'" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" cols="20" rows="7"  placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                            </div>
                            <a href="#welcome" class="template-btn">appointment now</a>
                        </form>

                        <div id="reply"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>