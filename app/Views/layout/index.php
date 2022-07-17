<?= $this->include('layout/header'); ?>
<?= $this->include('layout/sidebar'); ?>
<?= $this->include('layout/topbar'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
<<<<<<< HEAD
       <!-- <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1> -->
=======
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
>>>>>>> b602367239ff619e6e1c5c41ba1080a108b7fc96
    </div>

    <div class="container-fluid">
        <?= $this->renderSection('content'); ?>
    </div>
</div>

</div>
<!-- End of Main Content -->

<?= $this->include('layout/footer'); ?>
<?= $this->include('layout/script'); ?>