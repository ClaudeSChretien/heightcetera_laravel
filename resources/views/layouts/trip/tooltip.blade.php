<!-- Map Tooltip -->
<div id="eventDisplayerContainer">
    <!-- used to block the lock  -->
    <div id="eventDisplayer" class="rounded">


        <div class="row p-0 m-0 h-100">
            <!-- Image -->
            <div class="col-md-12 col-lg-9 p-0 text-center" id="eventDisplayerDivImg">
                <div id="eventDisplayerImgDiv" style="position:relative">
                    <img id="eventDisplayerImg">
                    <!-- Thumb -->
                    <i class="fas fa-thumbs-up fa-lg text-success"
                        style="position: absolute;bottom:10px;right:10px;font-size: 3em;"></i>
                </div>
            </div>
            <!-- **Image -->

            <div class="col-md-12 col-lg-3" id="eventDisplayerInfo">
                <!-- Title -->
                <div class="row">
                    <div class="media p-2">
                        <span class="media-left">
                            <img class="w-50" src="/img/icon/activity.png" alt="...">
                        </span>
                        <div class="media-body p-1">
                            <h5>
                                <a href="http://www.google.ca" class="text-dark" target="_blank" id="location">
                                </a>
                            </h5>
                        </div>
                    </div>


                </div>
                <!-- **Title -->

                <!-- Date -->
                <div class="row">
                    <div class="col-12">
                        <p id="postDate"></p>
                    </div>
                </div>
                <!-- **Date -->

                <!-- Text -->
                <div class="row text-justify pl-3 pr-3">
                    <p id="caption" class=""></p>
                </div>

                <!-- Photographer -->
                <div class="row">

                    <div class="col-1 text-center">
                        <i class="fas fa-camera"></i>
                    </div>
                    <div class="col-1 p-0 pl-1">
                        <p class="m-0" id="photographer"></p>
                    </div>
                </div>
                <!-- **Photographer -->

            </div>
        </div>
    </div>


</div>
<!-- End Event displayer -->

</div>
<!-- **Map Tooltip -->