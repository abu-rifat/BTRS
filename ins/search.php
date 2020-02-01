<div class="container-fluid">

        <div class="form" id="searchbus">



            <form action="busfind.php" method="post">
                <h2 style="text-align: center;">SEARCH BUSES</h2>
                <br>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <h4 id="formh4">WHERE</h4>
                        <div class="form-group">
                            <label for="from">LEAVING FROM</label>
                            <input type="text" class="form-control" name="Dep_Place" placeholder="city or specific distirct"
                                required="required">
                        </div>
                        <div class="form-group">
                            <label for="to">GOING TO</label>
                            <input type="text" class="form-control" name="Ari_Place" placeholder="city or specific distirct"
                                required="required">
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                        <h4 id="formh4">WHEN</h4>
                        <div class="form-group">
                            <label for="goingdate">DEPARTING DATE</label>
                            <input type="date" class="form-control" name="date1" placeholder="mm/dd/yyyy"
                                required="required">
                        </div>
                        <div class="form-group">
                            <label for="returndate">RETURNING DATE (OPTIONAL)</label>
                            <input type="date" class="form-control" name="date2" placeholder="mm/dd/yyyy">
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                        <h4 id="formh4">TIME</h4>
                        <div class="form-group">
                            <label for="time">TIME (OPTIONAL)</label>
                            <select class="form-control" name="shift1">
                                <option value="anytime">Any Time</option>
                                <option value="morning">Morning(4:01 AM to 11:59 AM)</option>
                                <option value="afternoon">After Noon(12:00 PM to 6:00 PM)</option>
                                <option value="evening">Evening(6:01 PM to 8:00 PM)</option>
                                <option value="night">Night(8:01 PM to 4:00 AM)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time">TIME (OPTIONAL)</label>
                            <select class="form-control" name="shift2">
                                <option value="anytime">Any Time</option>
                                <option value="morning">Morning(4:01 AM to 11:59 AM)</option>
                                <option value="afternoon">After Noon(12:00 PM to 6:00 PM)</option>
                                <option value="evening">Evening(6:01 PM to 8:00 PM)</option>
                                <option value="night">Night(8:01 PM to 4:00 AM)</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-1"></div>
                    <div class="col-xl-6 col-lg-6 col-md-10 col-sm-12 col-xs-12">
                        <button type="submit" class="btn btn-primary" id="searchbtn">SEARCH NOW</button>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-1"></div>
                </div>
                </br>
            </form>
        </div>
    </div>