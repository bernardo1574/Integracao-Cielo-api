<?php
    $cod = $_GET['cod'];
    if ($cod == '0'){
        $css = 'success';
        $message = 'Pagamento realizado com sucesso!';
    } else {
        $css = 'danger';
        if ($cod== '1'){
            $message = 'Falha ao realizar o pagamento! '.$_GET['message'];
        } else {
            $message = 'Falha ao realizar o pagamento! Erro Integração '.$_GET['message'];
        }
    }
?>
<div id="message">
    <input type="hidden" id="cod" value="<?=$cod?>">
    <link rel="stylesheet" href="lib/css/style_messages.css">
    <div class="col-12 posicao slide-in-top">
        <div class="d-flex justify-content-center">
            <div class="tamanho">
                <div class="new-message-box-<?=$css?>">
                    <div class="info-tab tip-icon-<?=$css?>" title="error"><i></i></div>
                    <div class="tip-box-<?=$css?>">
                        <p>
                            <?php
                            echo $message;
                            if ($cod != '0'){?>
                                <i class="fa fa-times close"  style="float: right;margin-top: 7px;" aria-hidden="true"></i>
                            <?php }?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const cod = jQuery("#cod").val();
    if (cod === '0'){
        jQuery('.posicao').removeClass('slide-in-top');
        setTimeout(function() {
            jQuery('.posicao').addClass('slide-out-top');
        }, 2000);
        setTimeout(function() {
            jQuery('#message').remove();
        }, 3000);
    } else {
        jQuery('.close').on('click', function () {
            jQuery('.posicao').addClass('fade-out');
            setTimeout(function() {
                jQuery('#message').remove();
            }, 2000);
        });
    }
</script>