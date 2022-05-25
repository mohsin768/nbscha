<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog-pull-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" style="margin-bottom:20px;" id="pills-tabContent">
                            <div class="tab-pane fade active in" id="pills-search" role="tabpanel" aria-labelledby="pills-search-tab">
                <!--- Start Simple Search Here---->
                                    <div class="form-row">

                                        <div class="form-group col-md-4">
                                            <label for="Region ">Region</label>
                                            <select class="form-control sl-op" name="region" id="residence-region">
                                                <option value="">--Select-Region--</option>
                                                <?php foreach($regions as $region): ?>
                                                <option value="<?php echo $region['rid']; ?>"><?php echo $region['region_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword4">Beds</label>
                                            <select class="form-control sl-op" name="spch_num_bed" id="residence-package">
                                                <option value="">--Select-Bed--</option>
                                                <?php foreach($packages as $package): ?>
                                                <option value="<?php echo $package['pid']; ?>"><?php echo $package['title']; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Level of care</label>
                                        <select class="form-control" name="home_level" id="residence-level">
                                            <option value="">--Select Level of Care*--</option>
                                            <?php foreach($levels as $level): ?>
                                            <option value="<?php echo $level['cid']; ?>"><?php echo $level['carelevel_title']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Language(s)</label>
                                        <select class="form-control" name="home_language" id="residence-language-id">
                                            <option value="">--Select Language(s)*--</option>
                                            <?php foreach($homeLanguages as $id => $name): ?>
                                            <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>

                                        <div class="form-group col-md-4 multiselect">
                                            <label for="Region ">Facility</label>
                                            <select class="form-control" id="residence-facilities" name="facilities[]" multiple>
                                                <?php foreach($facilities as $facility): ?>
                                                <option value="<?php echo $facility['fid']; ?>"><?php echo $facility['facility_title']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                        <label for="idss">Vacancy</label>
                                        <select class="form-control sl-op" name="residence-vacancy" id="residence-vacancy">
                                            <option value="">--Select-Vacancy--</option>
                                            <option value="is_free_vacancy">Open Vacancy</option>
                                            <option value="all_homes">All Homes</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label for="Name ">Home Name</label>
                                        <input type="text" name="spch_name" id="residence-name" placeholder="Search Home By Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">

                                            <div class="row btn-row" style="padding-top: 5px; ">
                                                <div class="col-md-4">
                                                    <label></label>
                                                    <button id="residence-search" type="submit" class="btn btn-primary form-control new-btn"><span>SEARCH</span></button>
                                                </div>
                                                <div class="col-md-4">
                                                <label></label>
                                                <button id="residence-reset" type="reset" class="btn btn-primary form-control new-btn"><span>RESET</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                <!--End Simple Search --->
                            </div>
                            <div class="tab-pane fade" id="pills-advance-search" role="tabpanel" aria-labelledby="pills-advance-search-tab">
                            </div>
                            <div class="clearfix"></div>
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
    <div class="no-residences col-sm-12 col-md-12">
                No residences to display
    </div>
</script>
<script id="residences-item-tpl" type="text/template">
    <div class="residence-item col-sm-6 col-md-4">
        <div class="project mb-30 border-2px">
            {{#main_image}}
            <div class="thumb">
                <img class="img-fullwidth" alt="{{ name }}" src="{{ main_image }}">
            </div>
            {{/main_image}}
            <div class="project-details p-15 pt-10 pb-10" style="min-height:340px">
                <h5 class="font-14 font-weight-500 mb-5"></h5>
                <h4 class="font-weight-700 text-uppercase mt-0">{{{ name }}}</h4>
                <p><b>Phone:</b> {{ phone }}</p><p><b>Email:</b> {{ email }}</p><p><b>Address:</b> {{ address }}</p><p><b>Beds:</b>{{ package_name }}</p>
                <p><b>Vacancy: {{ vacancy }} </b></p>
                <a class="btn btn-flat btn-dark btn-theme-colored btn-md pull-left font-20 ab-btn new-btn" href="{{ residence_url }}"><span>VIEW HOME</span><i style="padding-left:10px;" class="fa fa-play"></i></a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</script>
