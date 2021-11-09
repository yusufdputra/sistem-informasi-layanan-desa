<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div id="wrapper">
    <!-- Begin page -->

    <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="content-page">
        <div class="content">

            <!-- Start content -->
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <footer class="footer"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Desa Makmur
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/layouts/app.blade.php ENDPATH**/ ?>