@include('inc.nav')

    <div id="banner" class="section-pad">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 text-white mt-md-3 mb-md-3 pt-3 pb-3 pt-md-5 pb-md-5">
                    <p class="h3 font-custom">Welcome to</p>
                    <h1 class="heading-1 font-weight-bold">A secure way to transmit your files</h1><a class="btn btn-outline-light btn-lg mt-5 pl-5 pr-5" role="button" href="#">Start now<i class="fas fa-arrow-circle-right wobble animated infinite ml-3"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-mt section-pad">
        <div class="container">
            <h2 class="text-center color-dark-blue fancy heading-1 font-weight-bold"><span><strong>How It Works</strong><br></span></h2>
            <p class="text-center mt-4 mb-5 h6 text-black-50">It's very easy and straight forward to use</p>
            <div class="row how-it-works mt-4">
                <div class="col-md-4 text-center p-3">
                    <div class="p-2 p-sm-4 item-container how-it-works">
                        <div class="mt-3 mt-sm-0"><img class="img-fluid" src="assets/img/folder-plus.png?h=30ed7d22ba52c09addd5590b942a4e35"></div>
                        <p class="mt-3">Create a secure link with time frame to collect files from customers.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center p-3">
                    <div class="p-2 p-sm-4 item-container how-it-works">
                        <div class="mt-3 mt-sm-0"><img class="img-fluid" src="assets/img/email-mail-sent.png?h=7d3ada6629348e1adab80ebaa318bb69"></div>
                        <p class="mt-3">Send link to customer's email via the system. Customer receives upload code as well.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center p-3">
                    <div class="p-2 p-sm-4 item-container how-it-works">
                        <div class="mt-3 mt-sm-0"><img class="img-fluid" src="assets/img/data.png?h=824d9599203f553fb90db6b487a7ce1e"></div>
                        <p class="mt-3">Client uploads the file and you receive upload notification</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-mt section-pad bg-light">
        <div class="container mt-5">
            <h2 class="text-center mb-4 color-dark-blue fancy heading-1 font-weight-bold"><span><strong>How We've Being Doing</strong><br></span></h2>
            <div class="row justify-content-between pt-5">
                <div class="col-sm-3 text-center mb-4 pb-3">
                    <h6 class="odometer h1"><span>5</span><span>0</span><span>0</span><span>0</span></h6>
                    <p>Files transfered</p>
                </div>
                <div class="col-sm-3 text-center mb-4 pb-3">
                    <h6 class="odometer h1"><span>4</span><span>0</span></h6>
                    <p>Clients attended to</p>
                </div>
                <div class="col-sm-3 text-center mb-4 pb-3">
                    <h6 class="odometer h1"><span>5</span></h6>
                    <p>Months operational</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section-mt section-pad pt-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 d-lg-flex align-items-lg-center pt-5 pt-md-0">
                    <div class="text-center">
                        <p class="h3 font-weight-lighter mb-4 pb-4">We attend to a number of people at the same time. Please leave a message for if you are unable to reach us. We shall get back to you as soon as possible.</p>
                        <a href="/contact_us" class="btn btn-outline-primary btn-lg pl-3 pr-3 pl-md-4 pr-md-4">Contact Us Now<i class="fa fa-send ml-3"></i></a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-7"><img src="assets/img/contact-us.svg?h=586e03851514c57ee0c070ab6df836d3"></div>
            </div>
        </div>
    </div>

    @include('inc.footer')
    
</body>

</html>