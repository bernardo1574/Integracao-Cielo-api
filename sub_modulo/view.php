<?php
    $getDados = select_compra_cielo();
?>
<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="lib/img/carrinho.svg" alt="" width="72" height="72">
        <h2>Pagamento Online</h2>
    </div>
    <div class="mb-1">
        <a class="btn btn-primary" href="index.php?subMod=itens">
            Fazer compra
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
        </a>
    </div>
    <div class="card box">
        <div class="card-body">
            <table id="example" class="display nowrap" width="100%">
                <thead>
                    <tr>
                        <th data-priority="1">#</th>
                        <th width="80%" class="text-center">Nome</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($getDados)) {
                        foreach($getDados as $key => $value){ ?>
                        <tr>
                            <td><?=$value['id']?></td>
                            <td width="80%" class="text-center"><?=$value['nome']?></td>
                            <td class="text-right">
                                <form action="index.php?subMod=detalhes" method="post">
                                    <input type="hidden" name="id_pagamento" value="<?=$value['id_pagamento']?>">
                                    <button class="btn btn-sm" style="background-color: transparent !important;">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php }
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
