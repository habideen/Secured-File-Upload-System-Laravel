@include('inc.nav')

    <div id="banner" class="section-pad">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 text-white">
                    <h1 class="heading-1 font-weight-bold">Contact Us</h1>
                    <p class="mt-4 custom-breadcrumb"><a href="index.html">Home</a><span class="custom-break">/</span><span class="active">Contact Us</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container section-pad">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-5 mb-5 mb-sm-0">
                <form>
                    <p class="mb-4 pb-4 text-black-50">Having any issue? Feel free to reach out to us. We will attend to you as soon as possible.</p>
                    <div class="form-group"><label>First name</label><input class="form-control" type="text" id="first_name" name="first_name" minlength="2" maxlength="30" pattern="^[a-zA-Z\-]{2,30}$"></div>
                    <div class="form-group"><label>Last name</label><input class="form-control" type="text" id="last_name" name="last_name" placeholder="optional" pattern="^[a-zA-Z\-]{0,30}$"></div>
                    <div class="form-group"><label>Email address</label><input class="form-control" type="email" placeholder="E.g. abc@gmail.com"></div>
                    <div class="form-group"><label>Message title</label><input class="form-control" type="text" id="last_name" name="last_name" placeholder="optional" pattern="^[a-zA-Z\-]{0,30}$"></div>
                    <div class="form-group mb-5"><label>Body</label><textarea class="form-control form-control-sm" rows="7"></textarea></div><button class="btn btn-primary mr-5" type="submit">Send Message</button><button class="btn btn-light" type="reset">Clear</button>
                </form>
            </div>
            <div class="col-sm-6 col-md-5"><img src="assets/img/contact-us.svg?h=586e03851514c57ee0c070ab6df836d3"></div>
        </div>
    </div>

    @include('inc.footer')

</body>

</html>