<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Reports</a>-->
    </div>

    <div class="row form-group">
        <div class="col-md-12 form-group">
            <div class="card">
                <div class="card-body">
                    <form id="ticketsFilter" class="form-inline mt-2">
                        <label for="selectMes" class="sr">Filter by: </label>
                        <div class="col-md-3 mx-sm-4 col-xs-12 mb-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-vue text-white" for="selectMonth"> <i class="fa fa-fw fa-calendar"></i> </label>
                                </div>
                                <select class="form-control form-control-sm" name="selectMonth" id="selectMonth">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mx-sm-2 mb-2">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-vue text-white" for="selectYear"><i class="fa fa-fw fa-calendar"></i></label>
                                </div>
                                <select class="form-control form-control-sm" name="selectYear" id="selectYear">
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                    <option value="2018">2018</option>
                                    <option value="2017">2017</option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                    <option value="2012">2012</option>
                                    <option value="2011">2011</option>
                                    <option value="2010">2010</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mx-sm-2 mb-2">
                            <button type="text" id="searchTicket" class="btn btn-primary shadow-sm form-control form-control-sm btn-vue btn-sm"><i class="fa fa-search"></i> Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card h-100 border-left-primary">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalTickets">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card h-100 border-left-danger">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">My open tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="openTickets">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card h-100 border-left-success">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tickets in
                                this month</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="totalTicketsMonth">0</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-1" id="lastMonthTickets">0</span>
                                <span>Last month</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card h-100 border-left-warning">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">My tickets</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="myTickets">0</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-warning mr-1" id="lastMonthMyTickets">0</span>
                                <span>Last month</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-4">
            <div class="alert alert-primary alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="text-white-800">
                    <div>Last opened ticket <span id="ticketId"></span></div>
                </h6>

                <div class="d-sm-flex mt-1 align-items-center justify-content-between">
                    <div><i class="fa fa-fw fa-building"></i> <small id="ticketClient"></small></div>    
                    <div><i class="fa fa-fw fa-calendar"></i> <small id="ticketDate"></small></div>
                </div> 

                <div class="d-sm-flex mt-1">
                    <small id="ticketDescription"></small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="alert alert-info alert-dismissible" role="alert" style="padding-right: 0 !important;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="text-white-800">
                    <span>Average by month</span>
                </h6>

                <div class="d-sm-flex mt-1 align-items-center justify-content-center">
                    <i class="fas fa-info-circle"></i> &nbsp;
                    <div class="h5 mb-0 font-weight-bold text-white-800" id="avgTickets">0</div>    
                </div> 

                <div class="d-sm-flex mt-1">
                    <small>Represents the number of open tickets per month.<br>&nbsp;</small>
                </div>
            </div>
        </div>

        <!--
        <div class="col-md-4">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6>
                    <i class="fas fa-exclamation-triangle"></i>
                    <b>Error must common <span id="errorCommon"></span></b>
                </h6>

                <div class="d-sm-flex mt-1 align-items-center justify-content-between">
                    <div><i class="fa fa-fw fa-bug"></i> <small id="totalError">23</small></div>    
                </div> 

                <div class="d-sm-flex mt-1">
                    <small id="errorDescription">RUNTIME ERROR 3022 <br> &nbsp;</small>
                </div>
            </div>
        </div>
        -->
        <div class="col-md-4">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6 class="text-white-800">
                    <div>Tickets for more than 30 days</div>
                </h6>

                <div class="d-sm-flex mt-1 align-items-center justify-content-center">
                    <i class="fa fa-fw fa-box-open"></i> &nbsp;  
                    <div class="h5 mb-0 font-weight-bold text-white-800" id="ticketsMore30Days">0</div>    
                </div> 

                <div class="d-sm-flex mt-1">
                    <small>Represents unfinished open tickets. <br> &nbsp;</small>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 col-xs-12 form-group">
            <div class="card border-left-vue" id="chartLinha" style="padding: 15px 10px 10px 10px; height: 320px"></div>
        </div>
    </div>

    <div class="row form-group">
        <div class="col-md-3 col-lg-3 form-group">
            <div class="card">
                <div class="card-header py-4 bg-secondary d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-light text-white"> <i class="fa fa-inbox"></i> Tickets by area</h6>
                </div>
                <div class="ht-300" id="cardArea"></div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 form-group">
            <div class="card">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-light text-white"> <i class="fa fa-user"></i> Tickets by client</h6>
                </div>
                <div class="ht-300" id="cardClient"></div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 form-group">
            <div class="card">
                <div class="card-header py-4 bg-success d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-light text-white"> <i class="fa fa-code-branch"></i> Tickets by type</h6>
                </div>
                <div class="ht-300" id="cardType"></div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 form-group">
            <div class="card">
                <div class="card-header py-4 bg-warning d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-light text-white"> <i class="fa fa-cog"></i> Tickets by module</h6>
                </div>
                <div class="ht-300" id="cardModule"></div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('') ?>/assets/js/pages/dashboard.js?v=<?= JS_VERSION ?>"></script>