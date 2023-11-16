<?php if ($this->session->flashdata('mensaje') && $this->session->flashdata('tipo_mensaje')) : ?>
    <div class="alert alert-<?= $this->session->flashdata('tipo_mensaje'); ?> alert-dismissible col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <small><?= $this->session->flashdata('mensaje'); ?></small>
    </div>
<?php endif; ?>