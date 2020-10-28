<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Calendar</h1>
        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Reports</a>-->
    </div>

    <div class="row form-group">
        <div class="col-md-12">
            <div class="card border-top-vue" id="calendar" style="padding: 15px 10px 10px 10px;"></div>
        </div>
    </div>
</div>

<?=view('includes/scripts')?>
<script src="<?= base_url('') ?>/assets/js/pages/calendar.js?v=<?= JS_VERSION ?>"></script>