section>
<div class="container">
<div class="row">
    <div class="col-md-12 blog-pull-right">
    <div class="row">
        <div class="col-md-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <!-- <li class="nav-item active">
            <a class="nav-link" id="pills-search-tab" data-toggle="pill" href="#pills-search" role="tab" aria-controls="pills-search" aria-selected="true">Search</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-advance-search-tab" data-toggle="pill" href="#pills-advance-search" role="tab" aria-controls="pills-advance-search" aria-selected="false">Advanced Search</a>
            </li> -->
        </ul>
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
                        <!-- <div class="form-group col-md-3">
                        <label for="Region ">Facility</label>
                        <select name="spch_facility[]" id="spch_facility_select" multiple="multiple" class="spch_facility_select">
                            <option value="">--Select Facility--</option>
                            <option value="Seniors">Seniors</option>
                            <option value="Mental Health">Mental Health</option>
                            <option value="Intellectual and Developmental Disabilities">Intellectual and Developmental Disabilities</option>
                            <option value="Blended Facility">Blended Facility</option>
                        </select>
                        </div> -->
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
                            <button class="nav-link btn btn-danger form-control adv" id="pills-advance-search-tab" data-toggle="pill" href="#pills-advance-search" role="tab" aria-controls="pills-advance-search" aria-selected="false"><span>ADVANCE SEARCH</span></button>
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

            <!--- Advance Simple Search Here---->
                <form class="ad-serch" method="get" action="search-home">
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
                    <!--  <div class="form-group col-md-3">
                        <label for="Region ">Facility</label>
                        <select class="form-control spch_facility_select" name="spch_facility[]" multiple="multiple">
                        <option value="">--Select Facility--</option>
                        <option value="Seniors">Seniors</option>
                        <option value="Mental Health">Mental Health</option>
                        <option value="Intellectual and Developmental Disabilities">Intellectual and Developmental Disabilities</option>
                        <option value="Blended Facility">Blended Facility</option>
                        </select>
                    </div> -->
                    <div class="form-group col-md-3 multiselect">
                        <label for="Region ">Facility</label>
                        <div class="selectBox" onclick="showCheckboxesAdvance()">
                                <select class="form-control">
                                <option id="adv-op">--Select Facility--</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>
                            <div id="checkboxesadvance" class="checkboxes-id-cl">
                                <label for="ad-one">
                                <input class="chk-txt ad-sr" name="spch_facility[]" type="checkbox" id="ad-one" value="Seniors" />Seniors</label>
                                <label for="ad-two">
                                <input value="Mental Health" name="spch_facility[]" class="chk-txt ad-sr" type="checkbox" id="ad-two" />Mental Health</label>
                                <label for="ad-four">
                                    <input class="chk-txt ad-sr" name="spch_facility[]" type="checkbox" id="ad-four" value="Intellectual and Developmental" />Intellectual and Developmental</label>
                                <label for="ad-three">
                                <input class="chk-txt ad-sr" name="spch_facility[]" type="checkbox" value="Blended Facility" id="ad-three" />Blended Facility</label>
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
                    <div class="form-group col-lg-12 t-wh"><h4>Please check the boxes if your answer requires a <b><u>YES</u></b> to any of the following questions:</h4></div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[charge_above_government]">
                        <label class="form-check-label" for="gridCheck">
                            Do you accept smokers and provide a designated smoking area?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[provide_transport]">
                        <label class="form-check-label" for="gridCheck">
                            Do you provide transportation to and from medical visits?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[allow_pet]">
                        <label class="form-check-label" for="gridCheck">
                            Can a resident bring their pet to live with them?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[allow_furniture]">
                        <label class="form-check-label" for="gridCheck">
                            Do you allow residents to bring their own furniture?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[comfort_clothing_money]">
                        <label class="form-check-label" for="gridCheck">
                            Do you look after managing their comfort and clothing money?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[staf_dementia_care_train]">
                        <label class="form-check-label" for="gridCheck">
                            Do staff have training in Dementia Care?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[home_hairdressing]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have in home hairdressing?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[have_foot_care]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have in home foot care?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[staf_diabetes_insulin_train]">
                        <label class="form-check-label" for="gridCheck">
                            Do staff have training in Diabetes and insulin management?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[staf_oxygen_thrapy_train]">
                        <label class="form-check-label" for="gridCheck">
                            Do staff have training in Oxygen Therapy?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[staf_colostomy_care_train]">
                        <label class="form-check-label" for="gridCheck">
                            Do staff have training in Colostomy Care?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[accessible_shower_wheelchair_person]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have an accessible shower or tub for persons in a wheelchair?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[staf_wound_care_train]">
                        <label class="form-check-label" for="gridCheck">
                            Do staff have training in Wound Care?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[accept_incontinent_urine]">
                        <label class="form-check-label" for="gridCheck">
                            Do you accept residents that are incontinent of urine and/or bowels?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[monitoring_sys_door]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have a monitoring system on the doors?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[accept_mrsa_positve_client]">
                        <label class="form-check-label" for="gridCheck">
                            Do you accept clients that are MRSA positive?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[have_experience_client_suffering_addictions]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have experience with clients suffering from addictions?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[client_keep_physicians]">
                        <label class="form-check-label" for="gridCheck">
                            Can clients keep their own family physicians?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[have_outdoor_area]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have an outdoor area for sitting, walking, gardening, etc.?
                        </label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[provide_adaptive_equipment]">
                        <label class="form-check-label" for="gridCheck">
                            Do you provide adaptive equipment for your residents?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[provide_house_excursions]">
                        <label class="form-check-label" for="gridCheck">
                            Do you provide excursions for your residents?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[provide_house_excursions]">
                        <label class="form-check-label" for="gridCheck">
                            Do you provide in house and excursions for your residents?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[resident_outreach_attend_program]">
                        <label class="form-check-label" for="gridCheck">
                            Do any of your residents attend outreach programs?
                        </label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[resident_work_community]">
                        <label class="form-check-label" for="gridCheck">
                            Do any of your residents work in the community?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[staf_medication_administartion_traing]">
                        <label class="form-check-label" for="gridCheck">
                            Do all your staff have safe medication administration training?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[accommodate_special_diet]">
                        <label class="form-check-label" for="gridCheck">
                            Do you accommodate special diets i.e. gluten free, diabetic, etc.?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[provide_reference_existing_client]">
                        <label class="form-check-label" for="gridCheck">
                            Do you provide references from your existing clients and/or their families?
                        </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="checkbox[have_practitioner_doc_nurse]">
                        <label class="form-check-label" for="gridCheck">
                            Do you have a doctor/nurse practitioner assigned to all residents in your home?
                        </label>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="row btn-row" style="padding-top: 14px; ">
                        <div class="col-md-2">
                            <label></label>
                            <button type="submit" class="btn btn-primary form-control new-btn"><span>SEARCH</span></button>
                        </div>

                        <div class="col-md-2" style="padding: 0px">
                            <label></label>
                            <button type="reset" class="btn btn-primary form-control new-btn"><span>RESET</span></button>
                        </div>

                        </div>
                    </div>
                </form>
            <!--End advance Search --->

            </div>
        </div>
        </div>
    </div>
    <div class="row">
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1617623143-1606af86734e41.jpg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Victoria Villa Inc.</h4>
                <p><b>Phone:</b> 506-273-9394</p><p><b>Email:</b> victoriavillainc@outlook.com</p><p><b>Address:</b> 566 East Riverside Dr., Perth-Andover</p><p><b>Beds:</b> 21-40</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=123"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=123"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1623427068-160c387fc2fc3d.JPG">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">The Briarlea on Gorge Level 2</h4>
                <p><b>Phone:</b> 506-857-8866</p><p><b>Email:</b> thebriarlea@gmail.com</p><p><b>Address:</b> 75 Briarlea Dr, Moncton, NB E1G 2E9</p><p><b>Beds:</b> 21-40</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=169"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=169"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1626376784-160f08a5056670.jpg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Primrose Cottage Special Care ...</h4>
                <p><b>Phone:</b> 5064341869</p><p><b>Email:</b> lpearle@hotmail.com</p><p><b>Address:</b> 418 Route 880 Lower Millstream, Sussex NB E5P 3K4</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=140"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=140"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1623079980-160be3c2c6b111.jpg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Howe Hall</h4>
                <p><b>Phone:</b> 506-649-4713</p><p><b>Email:</b> krasch@shannex.com</p><p><b>Address:</b> 50  VITALITY WAY, SAINT JOHN, NB, E2K 0J5</p><p><b>Beds:</b> 21-40</p>
                <p><b>Vacancy:
                                            2
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=166"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=166"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1612981401-1602424993afd5.jpg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Goguen Residence Inc</h4>
                <p><b>Phone:</b> 506 204-8448</p><p><b>Email:</b> colleen@goguenresidences.ca</p><p><b>Address:</b> 34 Bromley Ave</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=104"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=104"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1626812988-160f7323c39b71.html">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Crescent Gardens Guest Home</h4>
                <p><b>Phone:</b> 5063759113</p><p><b>Email:</b> rdls@bellaliant.net</p><p><b>Address:</b> 1 Crescent Gardens</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=187"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=187"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1617903094-1606f3df6e9f61.jpg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Waddell Residence/hobby farm</h4>
                <p><b>Phone:</b> (506) 763-2257</p><p><b>Email:</b> waddell@levesqueonline.com</p><p><b>Address:</b> 1077 Route 845 , Kingston, NB E5N 1K7</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=126"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=126"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1606520126-15fc18d3e88b1a.jpeg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">West Side Manor</h4>
                <p><b>Phone:</b> 506-672-1534</p><p><b>Email:</b> jklm2k2@hotmail.com</p><p><b>Address:</b> 646 George Street</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=75"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=75"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1619017751-160804017c89fe.jpg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">The Cedars</h4>
                <p><b>Phone:</b> 506-939-2233</p><p><b>Email:</b> thecedarsarf@gmail.com</p><p><b>Address:</b> 28 Milton Lane, Sackville, NB E4L3B7</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            1
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=134"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=134"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1623863317-160ca301521fbe.JPG">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Swim&#039;s Adult Residential Facil...</h4>
                <p><b>Phone:</b> 506-375-6613</p><p><b>Email:</b> gdswim@xplornet.com</p><p><b>Address:</b> 448 White Rd, Avondale, NB E7K 1E5</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=173"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=173"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1618377533-160767b3d7fcf1.JPG">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Murray Street Lodge</h4>
                <p><b>Phone:</b> 5067383500</p><p><b>Email:</b> hseely86@hotmail.com</p><p><b>Address:</b> 35 Murray Street, Grand Bay-Westfield, NB E1C5C7</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            0
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=131"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=131"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                            <div class="col-sm-6 col-md-4">
            <div class="project mb-30 border-2px">
                <div class="thumb">
                <img class="img-fullwidth" alt="" src="public/memberHomeImages/1605393567-15fb05c9fbfca9.jpeg">

                </div>
            <div class="project-details p-15 pt-10 pb-10">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">Serenity Cove Special Care Hom...</h4>
                <p><b>Phone:</b> 5067578155</p><p><b>Email:</b> jennlynnpaul@hotmail.com</p><p><b>Address:</b> 9919 Rte 102, Woodmans Point, NB E5K 4P5</p><p><b>Beds:</b> 1-20</p>
                <p><b>Vacancy:
                                            1
                </b></p>
                <!-- <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn" href="listing-detail.html?a=56"><span>VIEW HOME</span> </a> -->
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="listing-detail.html?a=56"><span>VIEW HOME</span><i class="fa fa-play"></i></a>
                </div>
            </div>
            </div>
                                    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
    <nav>
        <nav>
<ul class="pagination">

                    <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
            <span class="page-link" aria-hidden="true">&lsaquo;</span>
        </li>





                                                                                <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=2">2</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=3">3</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=4">4</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=5">5</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=6">6</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=7">7</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=8">8</a></li>
                                                                                        <li class="page-item"><a class="page-link" href="residences?page=9">9</a></li>


                    <li class="page-item">
            <a class="page-link" href="residences?page=2" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
        </li>
            </ul>
</nav>

    </nav>
    </div>
</div>
</div>
</section>