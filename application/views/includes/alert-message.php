<?php if($this->session->flashdata('success_msg') != ""){ ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!!</strong> <?php echo $this->session->flashdata('success_msg');?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php } if($this->session->flashdata('error_msg') != ""){ ?>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Warning!</strong> <?php echo $this->session->flashdata('error_msg');?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>