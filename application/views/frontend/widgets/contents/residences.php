<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active in" id="pills-search" role="tabpanel" aria-labelledby="pills-search-tab">
                <!--- Start Simple Search Here---->
                                <form method="get" action="search-home">
                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label for="Region ">Region</label>
                                            <select class="form-control sl-op" name="region">
                                                <option value="">--Select-Region--</option>
                                                <option value="Moncton">-Region 1: Moncton</option>
                                                <option value="Saint John">-Region 2: Saint John</option>
                                                <option value="Fredericton">-Region 3: Fredericton</option>
                                                <option value="Edmundston">-Region 4: Edmundston</option>
                                                <option value="Restigouche">-Region 5: Restigouche</option>
                                                <option value="Chaleur">-Region 6: Chaleur</option>
                                                <option value="Acadian Peninsula">-Region 7: Miramichi</option>
                                                <option value="Miramichi">-Region 8: Acadian Peninsula</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Beds</label>
                                            <select class="form-control sl-op" name="spch_num_bed">
                                                <option value="">--Select-Bed--</option>
                                                <option value="1-20">1-20</option>
                                                <option value="21-40">20-40</option>
                                                <option value="41-60">40-60</option>
                                                <option value="60+">60+</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-3 multiselect">
                                            <label for="Region ">Facility</label>
                                            <div class="selectBox" onclick="showCheckboxes()">
                                                <select class="form-control">
                                                    <option id="smp-op-id">--Select Facility--</option>
                                                </select>
                                                <div class="overSelect"></div>
                                            </div>
                                            <div id="checkboxes" class="checkboxes-id-cl">
                                                <label for="one">
                                                <input class="chk-txt sim-sr" name="spch_facility[]" type="checkbox" id="one" value="Seniors" />Seniors</label>
                                                <label for="two">
                                                <input value="Mental Health" name="spch_facility[]" class="chk-txt sim-sr" type="checkbox" id="two" />Mental Health</label>
                                                <label for="four">
                                                <input class="chk-txt sim-sr" name="spch_facility[]" type="checkbox" id="four" value="Intellectual and Developmental" />Intellectual and Developmental</label>
                                                <label for="three">
                                                <input class="chk-txt sim-sr" name="spch_facility[]" type="checkbox" value="Blended Facility" id="three" />Blended Facility</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="inputPassword4">Level of care</label>
                                        <select class="form-control sl-op" name="spch_level_care">
                                            <option value="">--Select-Level--</option>
                                            <option value="Level-2">Level-2</option>
                                            <option value="Level-3">Level-3</option>
                                            <option value="Level-3B">Level-3B</option>
                                            <option value="Level-3G">Level-3G</option>
                                            <option value="Level-4">Level-4</option>

                                        </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="idss">Vacancy</label>
                                        <select class="form-control sl-op" name="vacancy" id="idss">
                                            <option value="">--Select-Vacancy--</option>
                                            <option value="is_free_vocancy">Open Vacancy</option>
                                            <option value="all_homes">All Homes</option>

                                        </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                        <label for="Name ">Home Name</label>
                                        <input type="text" name="spch_name" placeholder="Search Home By Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">

                                            <div class="row btn-row" style="padding-top: 14px; ">
                                                <div class="col-md-4">
                                                    <label></label>
                                                    <button type="submit" class="btn btn-primary form-control new-btn"><span>SEARCH</span></button>
                                                </div>
                                                <div class="col-md-4">
                                                <label></label>
                                                <button type="reset" class="btn btn-primary form-control new-btn"><span>RESET</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                <!--End Simple Search --->
                            </div>
                            <div class="tab-pane fade" id="pills-advance-search" role="tabpanel" aria-labelledby="pills-advance-search-tab">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="residences-list">
                       
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12" >
                <div class="load-more-wrap btn-box">
                    <a id="residences-load-more" class="btn btn-primary" href="#0">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script id="no-residences-tpl" type="text/template">
    <div class="no-residences col-sm-6 col-md-4">
        <div class="project mb-30 border-2px">
            <div class="project-details p-15 pt-10 pb-10">
                No residences to display
            </div>
        </div>
    </div>
</script>
<script id="residences-item-tpl" type="text/template">
    <div class="residence-item col-sm-6 col-md-4">
        <div class="project mb-30 border-2px">
            <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1617623143-1606af86734e41.jpg">
            </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Victoria Villa Inc.</h4>
                <p><b>Phone:</b> 506-273-9394</p><p><b>Email:</b> victoriavillainc@outlook.com</p><p><b>Address:</b> 566 East Riverside Dr., Perth-Andover</p><p><b>Beds:</b> 21-40</p>
                <p><b>Vacancy: 0 </b></p>
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=123"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
            </div>
        </div>
    </div>       
</script>