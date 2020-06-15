<div class="models">
    <div class="produtos-item">
        <a href="">
            <div class="produtos-item--img"><img src="" /></div>
            <div class="produtos-item--add">+</div>
        </a>
        <div class="produtos-item--price">R$ --</div>
        <div class="produtos-item--name">--</div>
    </div>
    <div class="cart--item">
        <img src="" />
        <div class="cart--item-nome">--</div>
        <div class="cart--item--qtarea">
            <button type="button" class="cart--item-qtmenos">-</button>
            <div class="cart--item--qt">1</div>
            <button type="button" class="cart--item-qtmais">+</button>
        </div>
    </div>
</div>
<header>
    <div class="menu-openner"><span>0</span>🛒</div>
</header>
<main>
    <img class="d-block mx-auto mb-4" src="lib/img/carrinho.svg" alt="" width="72" height="72">
    <h2 class="text-center">Pagamento Online</h2>
    <div>
        <a class="btn btn-primary" href="index.php">
            <i class="fa fa-backward" aria-hidden="true"></i>
            Voltar tela inicial
        </a>
    </div>
    <hr>
    <div class="produtos-area"></div>
</main>
<aside>
    <form action="index.php?subMod=compra" method="post">
        <input type="hidden" name="valorTotal" id="valorTotal" value="">
        <div class="cart--area">
            <div class="menu-closer">❌</div>
            <h1>Suas Compras</h1>
            <div class="cart"></div>
            <div class="cart--details">
                <div class="cart--totalitem subtotal">
                    <span>Subtotal</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem desconto">
                    <span>Desconto (-10%)</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem total big">
                    <span>Total</span>
                    <span>R$ --</span>
                </div>
                <button class="cart--finalizar">Finalizar a compra</button>
            </div>
        </div>
    </form>
</aside>
<div class="produtosWindowArea">
    <div class="produtosWindowBody">
        <div class="produtosInfo--cancelMobileButton">Voltar</div>
        <div class="produtosBig">
            <img src="" />
        </div>
        <div class="produtosInfo">
            <h1>--</h1>
            <div class="produtosInfo--desc">--</div>
            <div class="produtosInfo--sizearea">
                <div class="produtosInfo--sector">Tamanho</div>
                <div class="produtosInfo--sizes">
                    <div data-key="0" class="produtosInfo--size"><span>--</span></div>
                    <div data-key="1" class="produtosInfo--size"><span>--</span></div>
                    <div data-key="2" class="produtosInfo--size selected"><span>--</span></div>
                </div>
            </div>
            <div class="produtosInfo--pricearea">
                <div class="produtosInfo--sector">Preço</div>
                <div class="produtosInfo--price">
                    <div class="produtosInfo--actualPrice">R$ --</div>
                    <div class="produtosInfo--qtarea">
                        <button class="produtosInfo--qtmenos">-</button>
                        <div class="produtosInfo--qt">1</div>
                        <button class="produtosInfo--qtmais">+</button>
                    </div>
                </div>
            </div>
            <div class="produtosInfo--addButton">Adicionar ao carrinho</div>
            <div class="produtosInfo--cancelButton">Cancelar</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="lib/js/script.js"></script>