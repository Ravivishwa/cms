<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2"> <hr class="hrline">
            <div class="container ml-2">
                <div class="container" id="left-contain">
                    <a id="links-form" href="#feedback">Feedback Form</a>
                </div><hr class="hrline" id="inline-hr">
                <div class="container" id="left-contain">
                    <a id="links-form" href="#survey">Survey Form</a>
                </div><hr class="hrline" id="inline-hr">
                <div class="container" id="left-contain">
                    <a id="links-form" href="#map">Location Map</a>
                </div><hr class="hrline" id="inline-hr">
            </div>
        </div>

        <div class="col-sm-10 mt-3 tab-content" id="feedback">
            <h2>Feedback Form</h2><br>
            <form>
                <p class="contents-para">Your input is valuable to us. And submit your suggestion.</p><br>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label>Name</label>
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label>Email</label>
                        <input type="Email 	" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                        <label>No Telephone/Handphone</label>
                        <input type="tel" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <label>Comments/Suggestions</label>
                        <textarea class="form-control" cols="3" rows="6"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
            </form>
        </div>
    </div>

    <div class="col-sm-10 mt-3 tab-content" id="survey" style="display: none">
        <h2>Survey Form</h2><br>
        <form>
            <div class="form-row">
                <div class="form-group col-sm-6 row">
                    <div class="col-sm-8">
                        <label class="ml-2 mb-0"><h6 class="mb-0">Correspondents Name(Required)</h6></label>
                        <input type="text" class="form-control" >
                    </div>
                </div>
                <div class="form-group col-sm-6 row">
                    <div class="col-sm-7">
                        <label class="ml-2 mb-0"><h6 class="mb-0">Correspondents Email</h6></label>
                        <input type="Email" class="form-control" >
                    </div>
                </div>
                <div class="col-sm-12 pt-2">
                    <h5>1.System Benefits</h5>
                    <p>Are eProcurement system benefit you?</p>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <h6>1.1 The e-Precourement System has reduced administrative costs and operation</h6>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle" id="btn-surv" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <label class="pr-5 mb-1 text-secondary">Totally Agree</label>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                                <div class="col-lg-6 mt-5"></div>
                                <button type="button" class="btn btn-primary btn-sm">Submit</button>
                                <button type="button" class="btn btn-outline-secondary btn-sm">Cancel</button>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h6>1.2 The term of payment for goods pr services received is shorter</h6>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-light dropdown-toggle"id="btn-surv" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <label class="pr-5 mb-1 text-secondary">Totally Agree</label>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-10 mt-3 tab-content" id="map" style="display: none">
        <h2>Our Locations</h2><br>
        <div class="row">
            <a href="https://www.google.com/maps/place/MZ+iTech+Solution/@2.0117994,112.5496707,15.25z/data=!4m5!3m4!1s0x0:0x6a56561dece57d!8m2!3d2.0103903!4d112.5483939" target="_blank">
                <div class="col-sm-12">
                    <img src="assets/images/MZ ITECH SOLUTION HQ MAP LOCATION.gif">
                </div>
            </a>
        </div>
    </div>

</div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.nav ul li:first').addClass('active');
        // $('.tab-content:not(:first)').hide();
        $('#left-contain a').click(function (event) {
            event.preventDefault();
            var content = $(this).attr('href');
            console.log(content)
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            $(content).show();
            // $('.tab-content:not(:first)').hide();
            $('.tab-content:not('+content+')').hide();
            // $(content).siblings('.tab-content').hide();
        });
    });
</script>


