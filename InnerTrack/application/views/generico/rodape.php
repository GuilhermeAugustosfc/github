</body>
<script src="<?=base_url("assets/Libs/jquery/jquery.js")?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js'></script>
<script src="<?=base_url("assets/Libs/bootstrap/js/bootstrap.min.js")?>"></script>
<script src="<?=base_url("assets/Libs/pushy-master/js/pushy.min.js")?>"></script>
<script src="<?=base_url("assets/Libs/perfect-scrollbar/js/perfect-scrollbar.min.js")?>"></script>
<script src="<?=base_url("assets/Libs/bootstrap-table-master/src/bootstrap-table.js")?>"></script>
<script src="<?=base_url("assets/js/generico/config.js")?>"></script>
<?php if(isset($js)){
    foreach($js as $value){?>
        <script src="<?= $value?>"></script>
    <?php }
}?>
</html>